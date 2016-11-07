<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use App\Models\Kebab as Kebab;

class HomeController extends Controller
{
    public function index($request, $response)
    {
    	$kebabs = Kebab::select('kebab_image_path','kebab_image_extension')
    		->orderBy('created_at', 'desc')
    		->take(9)
    		->get();

        $kebabs_p = Kebab::select('kebab_image_path','kebab_image_extension')
            ->orderBy('kebab_tasty_points', 'desc')
            ->take(9)
            ->get();

    	$images_link_by_date;
        $images_link_by_points;
    	for ($i=0; $i <9 ; $i++) {
    		if($i < sizeof($kebabs)) {
    			$images_link_by_date[$i] = $kebabs[$i]['kebab_image_path'].".".$kebabs[$i]['kebab_image_extension']; 
    		    $images_link_by_points[$i] = $kebabs_p[$i]['kebab_image_path'].".".$kebabs_p[$i]['kebab_image_extension'];   
            }
    		//$images_link[$i] = $kebabs[$i].kebab_image_path;
    	}
        $data=['images' => $images_link_by_date, 'images_points' => $images_link_by_points];

        return $this->view->render($response, 'home.twig', $data);
    }
}
