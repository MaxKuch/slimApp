<?php
    namespace Helpers;
    use Models\UserModel;
    use \Illuminate\Database\Capsule\Manager;
    class UserHelper{

         /**
         * Проверка существования в базе пользователя с указанным значением в указанном поле
         *
         * @param String $field
         * @param String $param
         * @return bool
         */

        public static function isUserHave($field, $param){
            return UserModel::where($field, $param)->exists();
        }

        /**
         * Хэширование пароля
         *
         * @param string $username
         * @param string $password
         * @return string
         */

        public static function getPasswordHash($password){
            return md5($password);
        }

        /**
         * Проверка на совпадение указанного пароля с паролем пользователя с указанным email
         *
         * @param string $email
         * @param string $password
         * @return bool
         */

        public static function checkPassword($email, $password){
            if(UserModel::where('email', $email)->get()->first()->password === $password)
                return true;
            return false;
        }
    }