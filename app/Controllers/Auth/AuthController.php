<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{

    /**
    * Render sign-in page
    */
    public function getSignIn($request, $response){
        return $this->view->render($response, 'signin.twig');
    }

    /**
    * Log out
    */
    public function getSignOut($request, $response){
        $this->auth->logout();

        return $response->withRedirect($this->router->pathFor('home'));
    }

    /**
    * Sign the user in with the provided credentials.
    *
    * @param string $user_email
    * @param string $user_password
    * @param string reg
    *
    * @return bool
    */
    public function postSignIn($request, $response){
        /**
        * Check if the fields are valied. op is a hidden field. To prevent bots
        */
        $validation = $this->validator->validate($request, [
            'op' => v::equals('reg'),
        ]);

        /**postSignUp
        * If the fields fail, then redirect back to signup
        */
        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        $auth = $this->auth->attempt(
            $request->getParam('user_name'),
            $request->getParam('user_password')
        );

        if (!$auth) {
            $this->flash->addMessage('error', 'Wrong username/password.');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        // If Auth successfull, then redirect to choosen location
        return $response->withRedirect($this->router->pathFor('dashboard'));
    }

    /**
    * Render sign-up page
    */
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'signup.twig');
    }

    /**
    * Register a new user
    *
    * @param string $user_name
    * @param string $user_email
    * @param string $user_password
    * @param string reg
    *
    * @return bool
    */
    public function postSignUp($request, $response)
    {
        /**
        * Check if the fields are valied. op is a hidden field, to prevent bots
        */
        v::with('App\\Validation\\Rules\\');

        $validation = $this->validator->validate($request, [
            'user_email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'user_name' => v::noWhitespace()->notEmpty()->usernameAvailable()->usernameAcceptance(),
            'user_password' => v::noWhitespace()->notEmpty()->passwordAcceptance(),
            'user_password_confirm' => v::noWhitespace()->notEmpty()->matchesPassword($_POST['user_password']),
            'op' => v::equals('reg'),
        ]);

        /**
        * If the fields fail, then redirect back to signup
        */
        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }
        /**
        * If validation is OK, then continue with registration.
        */
        $user=new User();
        $user->user_id=uniqid();
        $user->user_email=$request->getParam('user_email');
        $user->user_name=$request->getParam('user_name');
        $user->user_password_hash= password_hash($request->getParam('user_password'), PASSWORD_DEFAULT);
		$user->user_account_type=0;
		$user->user_age=$request->getParam('user_age');
		$user->user_gender=$request->getParam('user_gender');
		$user->save();




        $auth = $this->auth->attempt(
            $request->getParam('user_name'),
            $request->getParam('user_password')
        );

        if ($auth) {
            $this->flash->addMessage('success', 'You have been signed up!');
            return $response->withRedirect($this->router->pathFor('home'));
        }

        return false;
    }

    /**
    * Render dashboard
    */
    public function dashboard($request, $response){
        return $this->view->render($response, 'auth/dashboard/dashboard.twig');
    }
}
