<?php
class productmodel extends DModel{
    public function __construct() {
       parent::__construct();
    }

    public function list_product($table_category, $table_product, $cond) {
         $sql = "SELECT * FROM $table_category,$table_product WHERE $cond
         ORDER BY $table_product.id_product DESC";
         return $this->db->select($sql);
    }

    public function productbyid_ad($table_product, $cond) {
        $sql = "SELECT * FROM $table_product WHERE $cond ORDER BY tbl_product.id_product DESC";
        return $this->db->select($sql);
   }

    public function insertproduct($table,$data) {
        return $this->db->insert($table,$data);
        
    }

    public function update_product($table_product_product,$data,$cond)
    {
        return $this->db->update($table_product_product,$data,$cond);
    }

    public function deleteproduct($table,$cond) {
        return $this->db->delete($table,$cond);
    }

    //-----------------------USER--------------------------//

    public function all_product_home($table) {
        $sql = "SELECT * FROM $table ORDER BY id_product DESC LIMIT 8";
        return $this->db->select($sql);
   }
   public function all_product($table,$cond) {
    $sql = "SELECT * FROM $table ORDER BY id_product DESC $cond";
    return $this->db->select($sql);
}

public function filter_product($table,$cond) {
    $sql = "SELECT * FROM $table $cond";
    return $this->db->select($sql);
}

public function all_product_search($table,$cond) {
    $sql = "SELECT * FROM $table WHERE $cond";
    
    return $this->db->select($sql);
}

   public function productbyid($table_category, $table_product, $cond) {
    $sql = "SELECT * FROM $table_category, $table_product WHERE $cond";
    return $this->db->select($sql);
}

   public function productbycat($table_category, $table_product,$cond) {
    $sql = "SELECT * FROM $table_category,$table_product WHERE $cond";
    return $this->db->select($sql);
    }
   
    public function count_productbycat($table_category, $table_product,$cond) {
        $sql = "SELECT * FROM $table_category,$table_product WHERE $cond";
        return $this->db->select($sql);
        }

        public function count_product($table_product) {
            $sql = "SELECT * FROM $table_product";
            return $this->db->select($sql);
        }
        public function count_product_search($table_product,$cond_count_product) {
            $sql = "SELECT * FROM $table_product WHERE $cond_count_product";
            
            return $this->db->select($sql);
        }
    
    public function related_product($table_category, $table_product, $cond_related) {
        $sql = "SELECT * FROM $table_category,$table_product WHERE $cond_related
        ORDER BY $table_product.id_product ASC LIMIT 4";
        return $this->db->select($sql);
        }

        
        public function product_new($table_product) {
            $sql = "SELECT * FROM $table_product ORDER BY id_product DESC LIMIT 4";
            return $this->db->select($sql);
       }

       public function product_hot($table_product){
        $sql = "SELECT * FROM $table_product WHERE tbl_product.product_hot = 2 ORDER BY id_product DESC LIMIT 4";
        return $this->db->select($sql);
   }
}
?>