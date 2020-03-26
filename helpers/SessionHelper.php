<?php
    namespace Helpers;
    use Models\SessionModel;
    class SessionHelper{
        public static function setSession($username){
            $session = new SessionModel();
            $session->session_id = md5(mt_rand().$username);
            $session->user  = $username;
            $session->ip_addr  = $_SERVER['REMOTE_ADDR']; ;
            $session->isLogin  = true;
            $session->save(); 
            return $session;
        }

        public static function closeSession($session_id){
            if(isset(SessionModel::where('session_id', $session_id)->get()->first()->session_id)){
                SessionModel::where('session_id', $session_id)->update(['isLogin' => false]);
            }
        }
    }