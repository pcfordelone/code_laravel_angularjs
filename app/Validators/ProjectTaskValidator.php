<?php

namespace FRD\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator
{

    protected $rules = [
        'name'          => 'required|max:100',
        'description'   => 'max:255',
        'start_date'    => 'date',
        'duo_date'      => 'date',
        'project_id'    => 'required',

    ];

    protected $messages = [
        'required'      => 'O campo :attribute é obrigatório.',
        'max'           => 'O campo :attribute permite até :max caracteres',
        'date'          => 'O campo :attribute deve ser uma data válida',
    ];

    protected $attributes = [
        'name'          => 'Nome',
        'description'   => 'Descrição',
        'start_date'    => 'Data de início',
        'duo_date'      => 'Data de finalização',
        'project_id'    => 'ID do projeto',
    ];

}