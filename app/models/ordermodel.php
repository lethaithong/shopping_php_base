<?php
class ordermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_order($table_order, $data_order){
        return $this->db->insert($table_order,$data_order);
    }
    
    public function orderbyid($table_order,$cond_orderbyid){
        $sql = "SELECT * FROM $table_order WHERE $cond_orderbyid LIMIT 1";
        return $this->db->select($sql);
    }
    
    public function insert_order_detail($table_order_detail, $data_order_detail){
        return $this->db->insert($table_order_detail,$data_order_detail);
    }

    public function 
    list_order($table_order){
        $sql = "SELECT * FROM $table_order ORDER BY id_order DESC";
        return $this->db->select($sql);
    }

    public function list_order_customer($table_order, $cond){
        $sql = "SELECT * FROM $table_order WHERE $cond ORDER BY id_order DESC";
        return $this->db->select($sql);
    }

    
    public function list_order_detail($table_order_detail,$table_order,$table_product,$cond){
        $sql = "SELECT * FROM $table_order_detail,$table_order,$table_product WHERE $cond ORDER BY id_order_detail DESC";
        return $this->db->select($sql);
    }

    public function order_info($table_order_detail,$cond_info){
        $sql = "SELECT * FROM $table_order_detail WHERE $cond_info LIMIT 1";
        return $this->db->select($sql);
    }
    
    public function order_confirm($table_order,$data,$cond){
        return $this->db->update($table_order,$data,$cond);
    }
}
?>