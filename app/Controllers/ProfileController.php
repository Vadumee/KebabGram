<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Kebab;
use Slim\Views\Twig as View;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class ProfileController extends Controller
{
	/**
	* Render the users profile.
    * Have a look at [Laravel Eloquent Ignore Casing](http://stackoverflow.com/q/21213490/4892914)
	*
	* @param $args['user_name']
	*
	* @return mixed
	*/
    public function getIndex($request, $response, $args)
    {
        if(User::where('user_name', 'like', $args['user_name'])->first()){
            $user_id=User::select('user_id')
            ->where('user_name', 'like', $args['user_name'])
            ->get();
            
            $kebabs = Kebab::where('user_id','like',$user_id[0]['user_id'])->get();
    
            $data = ['kebabs' => $kebabs, 'user_name' => $args['user_name']];
            return $this->view->render($response, 'profiles/index.twig', $data);
        }else{
            // If no user found, throw and show 404
            // return $response->withStatus(404)->withHeader('Content-Type', 'text/html')->write('Page not found');
            throw new \Slim\Exception\NotFoundException($request, $response);
        }
    }


}
