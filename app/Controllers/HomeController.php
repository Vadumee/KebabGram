<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use App\Models\Kebab as Kebab;

class HomeController extends Controller
{
    public function index($request, $response)
    {
    	$kebabs_most_recent = Kebab::
            orderBy('created_at', 'desc')
    		->take(9)
    		->get()->toArray();
        $kebabs_best = Kebab::
            orderBy('kebab_tasty_points', 'desc')
            ->take(9)
            ->get()->toArray();

        return $this->view->render($response, 'home.twig', compact("kebabs_most_recent", "kebabs_best"));
    }
}
