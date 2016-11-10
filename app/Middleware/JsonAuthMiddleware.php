<?php

namespace App\Middleware;

class JsonAuthMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        if (!$this->container->auth->check()) {
            $this->container->flash->addMessage('error', 'Please sign in before doing that.');
            echo json_encode(array('redirection' => $this->container->router->pathFor('auth.signin') ));
        }

        $response = $next($request, $response);
        return $response;
    }
}
