<?php
class couponmodel extends DModel{
    public function __construct() {
       parent::__construct();
    }

    public function list_coupon($table_coupon) {
         $sql = "SELECT * FROM $table_coupon ORDER BY coupon_id DESC";
         return $this->db->select($sql);
    }

    public function couponbyid_ad($table_coupon, $cond) {
        $sql = "SELECT * FROM $table_coupon WHERE $cond ORDER BY coupon_id DESC";
        return $this->db->select($sql);
   }

    public function insert_coupon($table,$data) {
        return $this->db->insert($table,$data);
    }

    public function update_coupon($table_coupon,$data,$cond)
    {
        return $this->db->update($table_coupon,$data,$cond);
    }

    public function delete_coupon($table,$cond) {
        return $this->db->delete($table,$cond);
    }
    
    public function find_coupon($table_coupon, $cond) {
        $sql = "SELECT * FROM $table_coupon WHERE $cond LIMIT 1";
        return $this->db->select($sql);
   }

}
?>