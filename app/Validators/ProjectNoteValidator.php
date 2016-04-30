<?php

namespace FRD\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{

    protected $rules = [
        'title'          => 'required',
        'note'           => 'required',
        'project_id'     => 'required',

    ];

    protected $messages = [
        'required'      => 'O campo :attribute é obrigatório.',
        'max'           => 'O campo :attribute permite até :max caracteres',
    ];

    protected $attributes = [
        'title'             => 'Título',
        'note'              => 'Nota',
        'project_id'        => 'ID do projeto',
    ];

}