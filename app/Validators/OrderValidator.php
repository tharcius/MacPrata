<?php

namespace MacPrata\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class OrderValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	equipment_id=>required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	equipment_id=>required',
	],
    ];
}
