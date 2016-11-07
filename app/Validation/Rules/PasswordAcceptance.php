<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class PasswordAcceptance extends AbstractRule
{
    public function validate($password)
    {
    	$result = preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\.\[\]\$\(\)\*\+\?\|\{\}\\\!\<\>\=\:\@])(?=\S*[\d])\S*$/i", $password);
        return $result;
    }
}
