{!! Form::open(['route'=>'contact.store', 'id' => 'fContact', 'class'=> 'w-550-px form-contact', 'files'=> true]) !!}
    {!! Form::label('name', 'Entre em contato', ['class' => 'w-100', 'for' => 'name']) !!}
    <fieldset class="w-100">
        {!! Form::text('name', null, ['class'=> 'w-100', 'required' => true, 'maxlength' => 255, 'placeholder' => 'Seu nome *']) !!}
    </fieldset>
    <fieldset class="w-100">
        {!! Form::email('email', null, ['class'=> 'w-100', 'required' => true, 'maxlength' => 255, 'placeholder' => 'Seu e-mail *']) !!}
    </fieldset>
    <fieldset class="w-100">
        {!! Form::text('phone', null, ['class'=> 'w-100 masked-phone', 'required' => true, 'maxlength' => 255, 'minlength' => 15, 'placeholder' => 'Seu telefone *']) !!}
    </fieldset>
    <fieldset class="w-100">
        {!! Form::textarea('message', null, ['class'=>'w-100', 'required' => true, 'placeholder' => 'Mensagem *']) !!}
    </fieldset>
    <fieldset class="w-100 file-false">
        <div class="w-100 d_flex wrap">
            <span class="self-center">Anexar arquivo *</span>
            <i class="fas fa-file-upload self-center"></i>
        </div>
        {!! Form::file('file', null, ['class'=> 'w-100', 'required' => true, 'maxlength' => 255]) !!}
    </fieldset>
    {!! Form::submit('Enviar Mensagem', ['class' => 'pointer smooth btn m-top-25 t-align-c w-600-100', 'id' => 'send-contact']) !!}
    <div class="w-100 m-top-20 def-msg display-none"></div>
{!! Form::close() !!}
