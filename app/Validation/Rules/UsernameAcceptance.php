<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class UsernameAcceptance extends AbstractRule
{
 	public function validate($username){
    	$result = preg_match("/^[a-zA-Z0-9_éèà]*$/i", $username);
        return $result;
    }
}
