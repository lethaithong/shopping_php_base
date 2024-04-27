<?php
class usermodel extends DModel{
    public function __construct() {
       parent::__construct();
    }

    public function all_admin($table_admin, $cond) {
        $sql = "SELECT * FROM $table_admin WHERE $cond ORDER BY admin_id DESC";
        return $this->db->select($sql);
   }

   public function insert_admin($table,$data) {
    return $this->db->insert($table,$data);
    
}

   public function userbyid($table, $cond) {
    $sql = "SELECT * FROM $table WHERE $cond";
    return $this->db->select($sql);
}

public function update_admin($table,$data,$cond)
    {
        return $this->db->update($table,$data,$cond);
    }

    public function delete_admin($table,$cond) {
        return $this->db->delete($table,$cond);
    }
}