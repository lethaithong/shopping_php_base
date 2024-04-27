<?php
class customermodel extends DModel{
    public function __construct() {
       parent::__construct();
    }


    public function check_customer($table_admin, $cond) {
        $sql = "SELECT * FROM $table_admin WHERE $cond ORDER BY admin_id LIMIT 1";
        return $this->db->select($sql);
   }

   public function updatecustomer($table_admin,$data,$cond)
   {
       return $this->db->update($table_admin,$data,$cond);
   }

public function insert_customer($table_customer,$data) {
    return $this->db->insert($table_customer,$data);
}
}
?>