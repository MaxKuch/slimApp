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

        public function login(Request $request, Response $response, $args){
            $this->view->render($response, 'admin-main.html');
        }

        public function usersAccounts(Request $request, Response $response, $args){
            $users = UserModel::getTable();
            $this->view->render($response, 'admin-users.html', ['users' => $users]);
        }
        public function sessions(Request $request, Response $response, $args){
            $sessions = SessionModel::getTable();
            $this->view->render($response, 'admin-sessions.html', ['sessions' => $sessions]);
        }
    }
