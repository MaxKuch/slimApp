<?php
    namespace Controllers;
    use Models\UserModel;
    use Controllers\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;
    use Helpers\SessionHelper;
    use Helpers\UserHelper;
    use Illuminate\Database\Capsule\Manager;
    class AuthController extends Controller{
        private $userModel;
        public function __construct($di){
            parent::__construct($di);
            $this->userModel = new UserModel();
        }

        public function registration(Request $request, Response $response, $args){
            $post = $request->getParsedBody();
            $username = $post['username'];
            $email    = $post['email'];
            $password = UserHelper::getPasswordHash($username, $post['password']);
            if(UserHelper::isUserHave('username',$username)){
                $errors[] = "Пользователь с таким именем уже существует";
            }
            if(UserHelper::isUserHave('email',$email)){
                $errors[] = "Пользователь с таким email уже существует";
            }
            if(count($errors)>0){
                return $response->withRedirect($this->router->pathFor('auth', [], $errors));
            }
            $newUser = new UserModel();
            $newUser->username = $username;
            $newUser->email    = $email;
            $newUser->password = $password;
            $newUser->save();
            $session_id = md5(mt_rand().$username);
            $user  = $username;
            $ip_addr  = $_SERVER['REMOTE_ADDR']; 
            $isLogin  = true;
            $session      = SessionHelper::setSession($username);
            //$response = CookieHelper::addCookie($response, $this->cookieName, $session->session_id);
            return $response->withRedirect('/auth');
        }
    }