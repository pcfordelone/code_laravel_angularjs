<?php

namespace FRD\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator
{

    protected $rules = [
        'name'          => 'required|max:150',
        'description'   => 'required',
    ];

    protected $messages = [
        'required'      => 'O campo :attribute é obrigatório.',
    ];

    protected $attributes = [
        'name'          => 'Nome',
        'description'   => 'Descrição',
        'extension'     => 'Extensão do arquivo',
    ];

}