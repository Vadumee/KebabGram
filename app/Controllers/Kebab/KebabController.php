<?php
namespace App\Controllers\Kebab;

use App\Models\Kebab as Kebab;
use App\Models\Adress as Adress;
use App\Models\Vote as Vote;
use App\Models\Tag as Tag;
use App\Models\User as User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class KebabController extends Controller {



  public function getViewKebab($request, $response,$args) {
    /*if(!(isset($_SESSION["user_email"])) {
      return $this->view->render($response, 'home.twig');
    }*/
      $kebab = Kebab::find($args['kebab_id'])->toArray();
      $seller= Adress::where('kebab_id', $args['kebab_id'])->first()->toArray();
      $tags= Tag::where('kebab_id', $args['kebab_id'])->get()->toArray();
      $user  = User::find($kebab['user_id']);

      $has_voted=true;
      if($this->auth->check()){
        $vote = Vote::where('user_id',$this->auth->user()->user_id)->where('kebab_id',$args['kebab_id'])->first();
        if ($vote==null) $has_voted=false;
      }
      else {
        $has_voted=false;
      }

  	return $this->view->render($response, 'kebab/edit.twig',compact('kebab','seller','user', 'tags', "has_voted"));
  }


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
  			'kebab_description' => v::notEmpty(),
  			'tag_text' => v::notEmpty()->TagFormat(),
  			'shop_name' => v::alnum(),
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
    /*
  	 * If validation is OK, then add a kebab into the database
  	 */
  	$kebab=new Kebab();
  	$id=uniqid();
    $id_image_path=uniqid();
  	$kebab->kebab_id=$id;
    $kebab->kebab_image_path=$id_image_path;
  	$kebab->kebab_description=$request->getParam('kebab_description');
    $kebab->kebab_tasty_points=0;
    //pour l'instant on fait un utilisateur fictif
    $kebab->user_id=$this->auth->user()->user_id;
    //
    $tmp_name = $_FILES["kebab_pic_link"]["tmp_name"];
    // basename() may prevent filesystem traversal attacks;
    // further validation/sanitation of the filename may be appropriate
    $extension = explode(".",$_FILES["kebab_pic_link"]["name"]);
    move_uploaded_file($tmp_name, "images/kebabs/".$id_image_path.".".$extension[1]);
    $kebab->kebab_image_extension=$extension[1];
    $kebab->save();

    //on créer une association en faisant une row Tag pour chaque tag
    $tags=explode(" ",$request->getParam('tag_text'));
    for ($i=0; $i < sizeof($tags); $i++) {
      $tag_to_add=new Tag();
      $tag_id = uniqid();
      $tag_to_add->tag_id=$tag_id;
      $tag_to_add->kebab_id=$id;
      $tag_to_add->tag_text=substr($tags[$i],1);
      $tag_to_add->save();
    }

    //on récupère maintenant toutes les infos pour créer l'adresse du kebab
    $adresse=new Adress();
    $adress_id = uniqid();
    $adresse->adresse_id=$adress_id;
    $adresse->shop_name=$request->getParam('shop_name');
    $adresse->country=$request->getParam('country');
    $adresse->city=$request->getParam('city');
    $adresse->street_number=$request->getParam('street_number');
    $adresse->kebab_id=$id;
    $adresse->street=$request->getParam('street');
    $adresse->save();

  	return $response->withRedirect($this->router->pathFor('home'));

  }

}


 ?>
