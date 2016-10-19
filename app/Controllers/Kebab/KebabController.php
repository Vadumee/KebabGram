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

  }
  
}


 ?>
