<?php
    namespace Models;
    use Illuminate\Database\Capsule\Manager;
    class UserModel{
        public $username;
        public $email;
        public $password;
        public function save(){
            $username = $this->username;
            $email = $this->email;
            $password = $this->password;
            Manager::table('users')->insertGetId(['username' => $username, 'email' => $email, 'password' => $password]);
        } 
        public function where($field, $param){
            return Manager::table('users')->where($field, $param)->get();
        }
    }