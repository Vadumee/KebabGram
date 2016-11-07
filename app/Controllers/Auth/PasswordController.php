<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class PasswordController extends Controller
{
    public function getChangePassword($request, $response)
    {
        return $this->view->render($response, 'auth/password/change.twig');
    }

    /**
    * Change the password for the user.
    *
    * @param string $user_password_old (the current password)
    * @param string $user_password (the new password of choice)
    *
    * @return bool
    */
    public function postChangePassword($request, $response){

    	v::with('App\\Validation\\Rules\\');
    	if (!empty($request->getParam('user_email'))) {
    		$validation = $this->validator->validate($request, [
    				'user_email' => v::noWhitespace()->notEmpty()->email()->emailExist(),
    		]);
    	}
    	else{
	        $validation = $this->validator->validate($request, [
                'user_password' => v::noWhitespace()->notEmpty()->passwordAcceptance(),
                'user_password_confirm' => v::noWhitespace()->notEmpty()->matchesPassword($_POST['user_password']),
	        ]);
    	}


        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.password.change'));
        }
        $auth = $this->auth->attempt(
                $this->auth->user()->user_name,
                $request->getParam('user_password_old')
        );
        if (!empty($request->getParam('user_email'))) {

        	$chaine='azertyuiopqsdfghjklmwxcvbn123456789';
        	$nb_lettres = strlen($chaine) - 1;
        	$generation = '';
        	for($i=0; $i < 12; $i++){
        		$pos = mt_rand(0, $nb_lettres);
        		$car = $chaine[$pos];
        		$generation .= $car;
        	}
        	$user=User::where("user_email",$request->getParam('user_email'))->first();
        	$user->user_password_hash= password_hash($generation, PASSWORD_DEFAULT);
       		$this->flash->addMessage('info', "Le mot de passe temporaire est envoyé sur l'adresse mail utilisateur:".$generation);
        }
       	else {
       		$user=$this->auth->user();
        	$user->user_password_hash= password_hash($request->getParam('user_password'), PASSWORD_DEFAULT);
        	$this->flash->addMessage('info', 'Your password was changed!');
       	}


       	$user->save();
        return $response->withRedirect($this->router->pathFor('home'));

    }
}
