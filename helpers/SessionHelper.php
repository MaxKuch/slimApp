<?php
    namespace Helpers;
    use Models\SessionModel;
    class SessionHelper{
        static $session;
        public static function setSession($username){
            $session = new SessionModel();
            $session->session_id = md5(mt_rand().$username);
            $session->user  = $username;
            $session->ip_addr  = $_SERVER['REMOTE_ADDR']; ;
            $session->isLogin  = true;
            $session->save(); 
            return $session;
        }

        public static function closeSessions($sessionId){
            $session = SessionModel::where('session_id', $sessionId)->get();
            if(isset($session)){
                $session::update('isLogin', false);
            }
        }
    }