<?php
    namespace Models;
    use Illuminate\Database\Capsule\Manager;
    class SessionModel{

        /**
         * Добавление информации о сессии в базу данных
         * @param array $session
         * @return void
         */

        public static function save($session){
            Manager::table('sessions')->insertGetId($session);
        }

        /**
         * Поиск сессии с указанным значением в указанном поле 
         * @param string $field
         * @param string $param
         * @return void
         */

        public static function where($field, $param){
            return Manager::table('sessions')->where($field, $param);
        }
    }