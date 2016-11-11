<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use App\Models\Kebab as Kebab;

class JsonHelpers extends Controller
{
    public function user($request, $response){
        echo json_encode($this->auth->user());
    }
}
