<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class SearchFormat extends AbstractRule
{
    public function validate($input)
    {
        $word_verified=true;
         //on fait juste une vérification pour les tags
        if(($input[0] == "#") && (strlen($input) < 2)) {
           $word_verified=false;
        }
        return $word_verified;
    }
}
