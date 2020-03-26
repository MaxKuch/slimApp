<?php
namespace Middlewares;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Models\SessionModel;
use Models\UserModel;
use Helpers\CookieHelper;

class AuthMiddleware{
    public function __invoke(Request $request, Response $response, $next){
        $cookie = $request->getCookieParams()["ID"];
        if(!isset($cookie)){
            return $response->withRedirect('/');
        }
        $session = SessionModel::where('session_id', $cookie)->get()->first();

        $response = CookieHelper::addCookie($response, "ID", $session->session_id, 60*60);
        $response = $next($request, $response);
        return $response;
    }
}