<?php
    namespace Controllers;
    use Controllers\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;
    use Models\UserModel;
    use Models\SessionModel;
    class AdminController extends Controller{

        public function __constructor($di) {
            parent::__constructor($di);
        }

        /**
         * Вход в админку
         * @param Request $request
         * @param Response $response
         * @param array $args
         * @return void
         */

        public function login(Request $request, Response $response, $args){
            $this->view->render($response, 'admin-main.html');
        }

        /**
         * Просмотр зарегистрированных пользователей
         * @param Request $request
         * @param Response $response
         * @param array $args
         * @return void
         */

        public function usersAccounts(Request $request, Response $response, $args){
            $users = UserModel::getTable();
            $this->view->render($response, 'admin-users.html', ['users' => $users]);
        }

        /**
         * Просмотр сессий
         * @param Request $request
         * @param Response $response
         * @param array $args
         * @return void
         */

        public function sessions(Request $request, Response $response, $args){
            $sessions = SessionModel::getTable();
            $this->view->render($response, 'admin-sessions.html', ['sessions' => $sessions]);
        }
    }
