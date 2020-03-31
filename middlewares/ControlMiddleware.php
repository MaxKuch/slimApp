<?php 
namespace Middlewares;
use Slim\Http\Request;
use Slim\Http\Response;
use Models\UserModel;
use Models\SessionModel;
use Helpers\SessionHelper;
use Helpers\CookieHelper;
class ControlMiddleware{

  /**
 * Посредник не пускает залогиненых пользователей, на страницу авторизации и т.п.
 *
 * @param Request $request
 * @param Response $response
 * @param [type] $next
 * @return Response $response
 */

  public function __invoke(Request $request, Response $response, $next)
  {
    $cookie = $request->getCookieParams()["HASH"];

    if($cookie){
      $session = SessionModel::where('session_hash', $cookie)->get()->first();
      $user_data = UserModel::where('email', $session->email)->get()->first();
    }
    else{
      $session = ['session_hash' => md5(mt_rand()), 'user_ip' => $_SERVER['REMOTE_ADDR'], 'email' => null, 'login_flag' => false];
      SessionHelper::setSession($session); 
      $response = CookieHelper::addCookie($response, 'HASH', $session['session_hash'], 60*60*3);
      $user_data['login_flag'] = false; 
    }

    $request = $request->withAttribute('user_data', $user_data);
    $request = $request->withAttribute('session', $session);
    $request = $request->withAttribute('login_flag', $login_flag);
    $response = $next($request, $response);
    return $response;
  }
}