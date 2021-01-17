const APP_URL = "http://localhost:8000/";

function masked() {
    var masks = ['(00) 00000-0000', '(00) 0000-00009'];
    $(".masked-phone").mask(masks[1], {
        onKeyPress: function (val, e, field, options) {
            field.mask(val.length > 14 ? masks[0] : masks[1], options);
        }
    });
}
$(document).ready(function () {
    masked()
    contact()
    setTimeout(function (){
        $('body').addClass('loaded')
    },500)
    $('input[type=file]').on('change', function(){
        let el = $(this)
        if(el.val()){
            el.parent().find('span').text(getNameFile(el.val()))
        }else{
            el.parent().find('span').text('Anexar arquivo *')
        }
    })
});

function getNameFile(file){
    let returName = file.toString().split(/[\\"]/)
    return returName[returName.length - 1]
}

function contact() {
    $("#fContact").submit(function () {
        $('#fContact .def-msg').fadeIn();
        $('#fContact #send-contact').hide();

        $.ajax({
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            url: APP_URL + "contato/store",
            beforeSend: function () {
                $('#fContact .def-msg').html("<div class='alert alert-info f-size-14'>Enviando...</div>");
            },
            success: function (result) {
                if (result.status === 200) {
                    $('#fContact .def-msg').html("<div class='alert alert-success f-size-14'>" + result.message + "</div>");
                    $('input[type=text],input[type=file],input[type=email], textarea, select').val('');
                    $('.file-false span').text('Anexar arquivo *')
                } else {
                    var arr = result.message;
                    var msgError = '';
                    $.each(arr, function (index, value) {
                        if (value.length !== 0) {
                            msgError = msgError + value + '<br />';
                        }
                    });
                    $('#fContact .def-msg').html("<div class='alert alert-danger f-size-14'>" + msgError + "</div>");
                }

                $('#fContact #send-contact').fadeIn();
            }
        });
        return false;
    });
}
