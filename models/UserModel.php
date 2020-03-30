<?php
    namespace Models;
    use Illuminate\Database\Capsule\Manager;
    class UserModel{
        public static function save($user_data){
            Manager::table('users')->insertGetId($user_data);
        } 
        public static function where($field, $param){
            return Manager::table('users')->where($field, $param);
        }
        public static function getTable(){
            return Manager::table('users')->get();
        }
    }