<?php

class Session{
    public static function init(){
        session_start();
    }

    public static function set($key, $value){
       $_SESSION[$key] = $value;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    public static function destroy(){
        session_destroy();
    }

    public static function unset($key){
        unset($_SESSION[$key]);
    }

    public static function checkSession_admin(){
        self::init();
        if(self::get('login_admin') == false ){
                header('Location:'.BASE_URL.'login');
        }
        
    }

    public static function checkSession_customer(){
        self::init();
        if(self::get('login_cus') == false){
            header('Location:'.BASE_URL.'home');
        }
    }

    public static function check_role_admin(){
        
        if (self::get('login_admin') == false) {
            header('Location:'.BASE_URL.'login');
        }else {
            if (Session::get('login_admin') == true) {
                $permission = Session::get('level');
                if ($permission == 1) {
                    header('Location:'.BASE_URL.'home/role_admin');
                }
            }
        }

    }

    public static function check_nextpage_admin(){
        self::init();

            if(Session::get('login_admin') == true){
                header('Location:'.BASE_URL.'home/role_admin');
                
            }
    }
}

?>