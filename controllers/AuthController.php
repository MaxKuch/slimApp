<?php
    namespace Controllers;
    use Models\UserModel;
    use Models\SessionModel;
    use Controllers\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;
    use Helpers\SessionHelper;
    use Helpers\UserHelper;
    use Helpers\CookieHelper;
    use Illuminate\Database\Capsule\Manager;
    class AuthController extends Controller{
        private $userModel;
        private $cookieName = "HASH";

        public function __construct($di){
            parent::__construct($di);
            $this->userModel = new UserModel();
        }

        /**
         * Вход в аккаунт
         * @param Request $request
         * @param Response $response
         * @param array $args
         * @return Response $response
         */

        public function login(Request $request, Response $response, $args){
            $post = $request->getParsedBody();
            $email = $post['email'];
            $password = UserHelper::getPasswordHash($post['password']);
            $session_hash = $post['session_hash'];
            if(!UserHelper::isUserHave('email',$email))
                $errors = array('errorMessage' => 'wrong email or password', 'errorTarget' => 'login-errors');
            if(!UserHelper::checkPassword($email, $password)){
                $errors = array('errorMessage' => "wrong email or password", 'errorTarget' => 'login-errors');
            }
            if(isset($errors)){
                throw new \Exception(json_encode($errors));
                die();
            }
            SessionModel::where('session_hash', $session_hash)->update(['login_flag' => true, 'email' => $email]);
            return $response->withRedirect('/');
        }

        /**
         * Регистрация аккаунта
         * @param Request $request
         * @param Response $response
         * @param array $args
         * @return Response $response
         */

        public function registration(Request $request, Response $response, $args){
            $post = $request->getParsedBody();
            $name = $post['name'];
            $phone = $post['phone'];
            $email    = $post['email'];
            $session_hash = $post['session_hash'];
            $password = UserHelper::getPasswordHash($post['password']);
            if(UserHelper::isUserHave('name',$name)){
                $errors = array('errorMessage' => 'such username already exists', 'errorTarget' => 'registration-username-error');
            }
            if(UserHelper::isUserHave('email',$email)){
                $errors = array('errorMessage' => 'user with such email already exists', 'errorTarget' => 'registration-email-error');
            }
            if(UserHelper::isUserHave('phone',$phone)){
                $errors = array('errorMessage' => 'user with such phone already exists', 'errorTarget' => 'registration-phone-error');
            }
            if(isset($errors)){
                throw new \Exception(json_encode($errors));
                die();
            }
            $user_data = ['name' => $name, 'email' => $email, 'phone' => $phone, 'password' => $password];
            UserModel::save($user_data);
            SessionModel::where('session_hash', $session_hash)->update(['login_flag' => true, 'email' => $email]);
            return $response->withRedirect('/');
        }

        /**
         * Выход из аккаунта
         * @param Request $request
         * @param Response $response
         * @param array $args
         * @return Response $response
         */

        public function logout(Request $request, Response $response, $args){
            $cookie = $request->getCookieParams()[$this->cookieName];
            CookieHelper::deleteCookie($response, $this->cookieName, '', -60*60*3);
            SessionHelper::closeSession($cookie);
            return $response->withRedirect('/');
        }
    }
