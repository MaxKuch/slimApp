<?php
    namespace Helpers;
    use Models\SessionModel;
    class SessionHelper{

        /**
         * Установка сессии
         * @param array $session
         * @return void
         */

        public static function setSession($session){
            SessionModel::save($session);
        }

        /**
         * Закрытие сессии
         * @param string $session_hash
         * @return void
         */

        public static function closeSession($session_hash){
            if(isset(SessionModel::where('session_hash', $session_hash)->get()->first()->session_hash)){
                SessionModel::where('session_hash', $session_hash)->update(['login_flag' => false]);
            }
        }
    }