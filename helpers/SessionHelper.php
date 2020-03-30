<?php
    namespace Helpers;
    use Models\SessionModel;
    class SessionHelper{
        public static function setSession($session){
            SessionModel::save($session);
        }

        public static function closeSession($session_hash){
            if(isset(SessionModel::where('session_hash', $session_hash)->get()->first()->session_hash)){
                SessionModel::where('session_hash', $session_hash)->update(['login_flag' => false]);
            }
        }
    }