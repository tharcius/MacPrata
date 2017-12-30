<?php

namespace MacPrata\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProductValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'required'	=>'	value=>required',
		''	=>'	type:required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'required'	=>'	value=>required',
		''	=>'	type:required',
	],
    ];
}
