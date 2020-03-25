<?php
    namespace Models;
    use Illuminate\Database\Capsule\Manager;
    class SessionModel{
        public $session_id;
        public $user;
        public $ip_addr;
        public $isLogin = false;
        public function save(){
            // $this->session_id = $session_id;
            // $this->user = $user;
            // $this->ip_addr = $ip_addr;
            $this->isLogin = true;
            Manager::table('sessions')->insertGetId(['session_id' => $this->session_id, 'user' => $this->user, 'ip__addr' => $this->ip_addr, 'isLogin' => $this->isLogin]);
            return Manager::table('sessions')->where('session_id', $this->session_id)->get();
        }
        public static function where($field, $param){
            return Manager::table('sessions')->where($field, $param);
        }
    }