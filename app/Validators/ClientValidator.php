<?php

namespace FRD\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

    protected $rules = [
        'name'          => 'required|max:255',
        'responsible'   => 'required|max:255',
        'email'         => 'required|email',
        'phone'         => 'required',
        'adress'        => 'required'
    ];

    protected $messages = [
        'required'      => 'O campo :attribute é obrigatório.',
        'email'         => 'É necessário inserir um e-mail válido',
        'max'           => 'O campo :attribute permite até :max caracteres',
    ];

    protected $attributes = [
        'name'          => 'Nome',
        'responsible'   => 'Descrição',
        'email'         => 'E-mail',
        'phone'         => 'Teleone',
        'adress'        => 'Endereço'
    ];

}