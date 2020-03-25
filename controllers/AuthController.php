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

        public function login(Request $request, Response $response, $args){
            $post = $request->getParsedBody();
            $username = $post['username'];
            $password = UserHelper::getPasswordHash($username, $post['password']);
            if(!UserHelper::isUserHave('username',$username))
                $errors = array('errorMessage' => 'wrong username or password', 'errorTarget' => 'login-errors');
            if(!UserHelper::checkPassword($username, $password))
                $errors = array('errorMessage' => 'wrong username or password', 'errorTarget' => 'login-errors');
            if(isset($errors))
                return json_encode($errors);
            //return $response->withRedirect('/auth');
        }

        public function registration(Request $request, Response $response, $args){
            $post = $request->getParsedBody();
            $username = $post['username'];
            $email    = $post['email'];
            $password = UserHelper::getPasswordHash($username, $post['password']);
            if(UserHelper::isUserHave('username',$username)){
                $errors = array('errorMessage' => 'such username already exists', 'errorTarget' => 'registration-username-error');
            }
            if(UserHelper::isUserHave('email',$email)){
                $errors = array('errorMessage' => 'user with such email already exists', 'errorTarget' => 'registration-email-error');
            }
            if(isset($errors)){
                return json_encode($errors);
            }
            $newUser = new UserModel();
            $newUser->username = $username;
            $newUser->email    = $email;
            $newUser->password = $password;
            $newUser->save();
            $session      = SessionHelper::setSession($username);
           // $response = CookieHelper::addCookie($response, $this->cookieName, $session->session_id);
            //return $response->withRedirect('/auth');
        }
    }