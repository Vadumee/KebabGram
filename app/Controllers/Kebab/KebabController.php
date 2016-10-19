<?php
namespace App\Controllers\Kebab;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class KebabController extends Controller {

  public function getAddKebab($request, $response) {
  	return $this->view->render($response, 'kebab/index.twig');
  }

  public function postAddKebab($request, $response) {
	
  	/**
  	 * Check if the fields are valied. op is a hidden field, to prevent bots
  	 */
  	v::with('App\\Validation\\Rules\\');

  	$validation = $this->validator->validate($request, [
  			'kebab_pic_link' => v::ImageFormat()->ImageSize(),
  			'kebab_description' => v::noWhitespace()->notEmpty(),
  			'tag_text' => v::notEmpty(),
  			'kebab_name' => v::alnum(),
  			'country' => v::alnum(),
  			'city' => v::alnum(),
  			'street_number' => v::noWhitespace()->numeric(),
  			'street' => v::alnum(),
  			'op' => v::equals('reg'),
  	]);
  	
  	/**
  	 * If the fields fail, then redirect back to signup
  	 */
  	if ($validation->failed()) {
  		return $response->withRedirect($this->router->pathFor('kebab.add'));
  	}
  	
  }
  
}


 ?>
