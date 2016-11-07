<?php

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class TagFormat extends AbstractRule
{
    public function validate($input)
    {
        $tags=explode(" ",$input);
        $tag_verified=true;
        for ($i=0; $i < sizeof($tags); $i++) {
            if( ($tags[$i][0] != "#") || (strlen($tags[$i]) < 2) ) {
                $tag_verified=false;
            }
        }
        return $tag_verified;
    }
}
