<?php

namespace MacPrata\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class PersonValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required|min|8'	=>'	name=>required|min|8',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required|min|8'	=>'	name=>required|min|8',
	],
    ];
}
