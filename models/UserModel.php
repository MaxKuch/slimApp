<?php
    namespace Models;
    use Illuminate\Database\Capsule\Manager;
    class UserModel{

        /**
         * Добавление информации о пользователе в базу данных
         * @param array $session
         * @return void
         */

        public static function save($user_data){
            Manager::table('users')->insertGetId($user_data);
        } 

        /**
         * Поиск пользователя с указанным значением в указанном поле 
         * @param string $field
         * @param string $param
         * @return void
         */

        public static function where($field, $param){
            return Manager::table('users')->where($field, $param);
        }
    }