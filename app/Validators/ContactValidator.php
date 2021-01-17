<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ContactValidator.
 *
 * @package namespace App\Validators;
 */
class ContactValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:15|max:255',
            //'validFile' => 'max:500|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document, ',
            'validFile' => 'max:500|mimes:docx,txt,doc,pdf,odt',
            'file' => 'required',
            'ip' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
    protected $messages = [
        'phone.min' => 'Telefone inválido.',
        'validFile.max' => 'Tamanho máximo do arquivo de 500kb.',
        'validFile.mimes' => "Aceitamos apenas arquivos com as seguintes extensões: pdf, docx, doc e txt"
    ];
}
