<?php
namespace App\Controllers\Kebab;

use App\Models\Kebab as Kebab;
use App\Models\Adress as Adress;
use App\Models\Vote as Vote;
use App\Models\Tag as Tag;
use App\Models\User as User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class VoteController extends Controller {

  public function like($request, $response) {
    $vote = Vote::where('user_id',$this->auth->user()->user_id)->first();
    $kebab = Kebab::where('kebab_id',$_GET["idKebab"])->first();

    if ($vote==null || $vote->kebab_id!=$_GET["idKebab"]) {
      $vote = new Vote();
      $vote->id=uniqid();
      $vote->user_id= $this->auth->user()->user_id;
      $vote->kebab_id= $_GET["idKebab"];
      $vote->save();

      $kebab->kebab_tasty_points++;
      $kebab->save();
    }

    echo json_encode(array('tasty_point' => $kebab->kebab_tasty_points));
  }

  public function hate($request, $response) {
    $vote = Vote::where('user_id',$this->auth->user()->user_id)->first();
    $kebab = Kebab::where('kebab_id',$_GET["idKebab"])->first();
    if ($vote==null || $vote->kebab_id!=$_GET["idKebab"]) {
      $vote = new Vote();
      $vote->id=uniqid();
      $vote->user_id= $this->auth->user()->user_id;
      $vote->kebab_id= $_GET["idKebab"];
      $vote->save();

      $kebab->kebab_tasty_points--;
      $kebab->save();
    }


    echo json_encode(array('tasty_point' => $kebab->kebab_tasty_points));
  }

  public function postSearchKebab($request, $response) {

  	v::with('App\\Validation\\Rules\\');
  	$validation = $this->validator->validate($request, [
  			'word_search' => v::notEmpty()->noWhitespace()->SearchFormat(),
  			'op' => v::equals('reg'),
  	]);

  	if ($validation->failed()) {
  		return $response->withRedirect($this->router->pathFor('kebab.search'));
  	}

    $word = $request->getParam('word_search');
    $words = explode("#", $word);
    $kebabs_id = array();
    $kebabs = array();
    //le cas ou l'on recherche les kebabs selon les tags
    if($word[0] == "#") {
      $word = "Résultats de recherche pour le tag : ".$word;
      $kebabs_id = Tag::select('kebab_id')
        ->where('tag_text','like',$words[1])
        ->orderBy('created_at', 'desc')
        ->get();

      for ($i=0; $i < sizeof($kebabs_id); $i++) {
        array_push($kebabs,Kebab::where('kebab_id', 'like', $kebabs_id[$i]['kebab_id'])->get());
      }
    }
    else {
      $word = "Résultats de recherche pour l'utilisateur : ".$words[0];
      $kebabs_id = User::where('user_name','like',$words[0])
        ->orderBy('created_at', 'desc')
        ->get();

      for ($i=0; $i < sizeof($kebabs_id); $i++) {
        array_push($kebabs,Kebab::where('user_id', 'like', $kebabs_id[$i]['user_id'])->get());
      }
    }
  	return $this->view->render($response, 'kebab/search.twig', compact("kebabs_id","kebabs","word"));

  }

}


 ?>
