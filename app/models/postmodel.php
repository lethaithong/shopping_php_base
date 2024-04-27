<?php
class postmodel extends DModel{
    public function __construct() {
       parent::__construct();
    }

    public function list_cat_post($table) {
         $sql = "SELECT * FROM $table ORDER BY id_cat_post DESC";
         return $this->db->select($sql);
    }

    public function cat_postbyid($table, $cond) {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
   }

    public function insert_cat_post($table,$data) {
        return $this->db->insert($table,$data);
        
    }

    public function update_cat_post($table_post,$data,$cond)
    {
        return $this->db->update($table_post,$data,$cond);
    }

    public function deletecat_post($table,$cond) {
        return $this->db->delete($table,$cond);
    }

    //----------------------------------------//

    public function list_post($table_post, $table_cat_post, $cond) {

        $sql = "SELECT * FROM $table_post,$table_cat_post WHERE $cond
        ORDER BY $table_post.id_cat_post DESC";
        return $this->db->select($sql);
   }

   public function postbyid($table, $cond) {
       $sql = "SELECT * FROM $table WHERE $cond";
       return $this->db->select($sql);
  }

   public function insert_post($table,$data) {
       return $this->db->insert($table,$data);
   }

   public function updatepost($table_post,$data,$cond)
   {
       return $this->db->update($table_post,$data,$cond);
   }

   public function deletepost($table,$cond) {
       return $this->db->delete($table,$cond);
   }

   //-------------------------------------------//

public function category_post($table) {
    $sql = "SELECT * FROM $table ORDER BY id_cat_post DESC";
    return $this->db->select($sql);
}

public function all_cat_post($table) {
    $sql = "SELECT * FROM $table ORDER BY id_cat_post DESC";
    return $this->db->select($sql);
}

public function all_post($table_cat_post, $table_post, $cond) {
    $sql = "SELECT * FROM $table_cat_post, $table_post WHERE $cond";
    return $this->db->select($sql);
}

public function all_list_post($table_post) {
    $sql = "SELECT * FROM $table_post ORDER BY id_post DESC";
    return $this->db->select($sql);
}
   
public function postbycat($table_cat_post, $table_post, $cond) {
    $sql = "SELECT * FROM $table_cat_post, $table_post WHERE $cond
    ORDER BY $table_post.id_post DESC";
    return $this->db->select($sql);
    }

    public function related_post($table_cat_post ,$table_post, $cond_related) {
        $sql = "SELECT * FROM $table_cat_post, $table_post WHERE $cond_related";
        return $this->db->select($sql);
   }
}
?>