<?php
namespace Controllers;
use Slim\Views\Twig;
use Illuminate\Database\Query\Builder;
use Slim\Http\Request;
use Slim\Http\Response;
use Models\SessionModel;

class ProfileController extends Controller{
    private $cookie_val;
    private $session;

    public function __construct($di){
        parent::__construct($di);
    }

    public function renderProfile(Request $request, Response $response, $args){
        $this->cookie_val = $request->getCookieParams()['ID'];
        $this->session = SessionModel::where('session_id', $this->cookie_val)->get()->first();
        $user = array('username' => $this->session->user, 'session_id' => $this->session->session_id);
        $this->view->render($response, 'profile.html', [
            'username' => $user['username'],
            'session_id' => $user['session_id']
        ]);
        return $response;
    }
}