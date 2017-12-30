<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EquipmentValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required|min|8'	=>'	name=>required|min|8',
		'required'	=>'	manufacture=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required|min|8'	=>'	name=>required|min|8',
		'required'	=>'	manufacture=>required',
	],
    ];
}