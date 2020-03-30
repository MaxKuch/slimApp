<?php
    namespace Models;
    use Illuminate\Database\Capsule\Manager;
    class SessionModel{
        public static function save($session){
            Manager::table('sessions')->insertGetId($session);
        }
        public static function where($field, $param){
            return Manager::table('sessions')->where($field, $param);
        }
        public static function getTable(){
            return Manager::table('sessions')->get();
        }
    }