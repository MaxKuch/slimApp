<?php
    namespace Helpers;
    use Models\UserModel;
    use \Illuminate\Database\Capsule\Manager;
    class UserHelper{
        public static function isUserHave($field, $param){
            return Manager::table('users')->where($field, $param)->exists();
        }
        public static function getPasswordHash($username, $password){
            return md5('pass'.md5($username.md5($password)));
        }
        public static function checkPassword($username, $password){
            if(Manager::table('users')->where('username', $username)->get()->first()->password === $password)
                return true;
            return false;
        }
    }