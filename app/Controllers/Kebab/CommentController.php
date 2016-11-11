<?php
namespace App\Controllers\Kebab;

use App\Models\Kebab as Kebab;
use App\Models\Comment as Comment;
use App\Models\Adress as Adress;
use App\Models\Tag as Tag;
use App\Models\User as User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class CommentController extends Controller {

  public function getCommentKebab($request, $response) {
  	return $this->view->render($response, 'kebab/search.twig');
  }

  public function postCommentKebab($request, $response, $args) {

    /*echo "<pre>";
    print_r($args);
    exit();*/

  	v::with('App\\Validation\\Rules\\');
  	$validation = $this->validator->validate($request, [
  			'comment' => v::notEmpty(),
  			'op' => v::equals('reg'),
  	]);

  	if ($validation->failed()) {
  		return $response->withRedirect($this->router->pathFor('view.kebab'),['kebab_id' => $args['kebab_id']]);
  	}

    //on ajoute le commentaire s'il est valide
    $comment = new Comment();
    $comment->comment_id=uniqid();
    $id = $args['kebab_id'];
    $comment->kebab_id=$id;
    $user_id=$this->auth->user()['user_id'];
    $comment->user_id=$user_id;
    $comment->texte=$request->getParam('comment');
    $comment->save();

  	return $response->withRedirect($this->router->pathFor('view.kebab'),['kebab_id' => $args['kebab_id']]);
    
  }

}


 ?>
