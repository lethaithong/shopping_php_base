<?php
class categorymodel extends DModel{
    public function __construct() {
       parent::__construct();
    }


    public function category($table) {
        $sql = "SELECT * FROM $table ORDER BY id_category DESC";
        return $this->db->select($sql);
   }

    public function list_category($table) {
         $sql = "SELECT * FROM $table ORDER BY id_category DESC limit 6";
         return $this->db->select($sql);
    }

    public function categorybyid($table, $cond) {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
   }

    public function insertcategory($table,$data) {
        return $this->db->insert($table,$data);
        
    }

    public function updatecategory($table_category_product,$data,$cond)
    {
        return $this->db->update($table_category_product,$data,$cond);
    }

    public function deletecategory($table,$cond) {
        return $this->db->delete1($table,$cond);
    }

    //----------------------------------------------------------------------------------------------------------------------//

    public function all_category($table) {
        $sql = "SELECT * FROM $table ORDER BY id_category DESC";
        return $this->db->select($sql);
    }

    public function list_category_edit($table, $cond) {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
   }
   
}
?>