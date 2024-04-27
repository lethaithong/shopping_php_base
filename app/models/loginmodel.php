<?php
class loginmodel extends DModel{
    public function __construct() {
       parent::__construct();
    }

    public function login($table_admin, $email, $password) {
         $sql = "SELECT * FROM $table_admin WHERE email=? AND password=? ";
         return $this->db->affectedRows($sql, $email, $password);
    }

     public function getlogin($table_admin, $email, $password){
        $sql = "SELECT * FROM $table_admin WHERE email=? AND password=? ";
         return $this->db->selectUser($sql, $email, $password);
     }

     public function check_customer($table,$cond){
      $sql = "SELECT * FROM $table WHERE $cond ";
       return $this->db->select($sql);
   }
     
   public function insert_customer($table,$data) {
      return $this->db->insert($table,$data);
      
  }
}
?>