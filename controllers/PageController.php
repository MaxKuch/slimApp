<?php
    namespace Controllers;
    use Models\UserModel;
    use Controllers\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;
    use Helpers\SessionHelper;
    use Helpers\UserHelper;
    use Helpers\CookieHelper;
    use Illuminate\Database\Capsule\Manager;

class PageController extends Controller{
    public function __construct($di){
        parent::__construct($di);
    }

    /**
     * Метод отображает главную страницу и передает информацию о пользователе и сессии
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response $response
     */

    public function renderPage(Request $request, Response $response, $args){
        $user_data = $request->getAttribute('user_data');
        $session = $request->getAttribute('session');
        $login_flag = $request->getAttribute('login_flag');
        $this->view->render($response, 'index.html', ['user_data' => json_encode($user_data), 'session' => json_encode($session), 'login_flag' => json_encode($login_flag)]);
        return $response;
    }
}