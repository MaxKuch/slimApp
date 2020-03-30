<?php
    namespace Helpers;
    use Models\UserModel;
    use \Illuminate\Database\Capsule\Manager;
    class UserHelper{
        public static function isUserHave($field, $param){
            return Manager::table('users')->where($field, $param)->exists();
        }
        public static function getPasswordHash($password){
            return md5($password);
        }
        public static function checkPassword($email, $password){
            if(Manager::table('users')->where('email', $email)->get()->first()->password === $password)
                return true;
            return false;
        }
    }