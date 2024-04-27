<?php
    class DModel{
        protected $db = array();
        public function __construct(){
            $connect = 'mysql:dbname=php_mvc_pdo;host=localhost';
            $user = 'root';
            $pass = '';
            $this->db = new Database($connect,$user,$pass);
        }
    }
    
?>