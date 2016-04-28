<?php

namespace FRD\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{

    protected $rules = [
        'name'          => 'required|max:150',
        'progress'      => 'max:50',
        'status'        => 'max:50',
        'duo_date'      => 'date',

    ];

    protected $messages = [
        'required'      => 'O campo :attribute é obrigatório.',
        'email'         => 'É necessário inserir um e-mail válido',
        'max'           => 'O campo :attribute permite até :max caracteres',
    ];

    protected $attributes = [
        'name'          => 'Nome',
        'progress'      => 'Progresso',
        'status'        => 'Status',
        'duo_date'      => 'Data de Conclusão',
    ];

}