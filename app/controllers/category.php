<?php
   class category extends DController{
       public function __construct(){
           Session::checkSession_admin();
           Session::check_role_admin();

           $data = array();
           $message = array();
           parent::__construct();
       }
   
   
       public function index(){
           $this->list_category();
       }
   
       public function add_category(){
            
            $table_category = 'tbl_category';
            $category = $this->load->model('categorymodel');
            $data['category'] = $category->category($table_category);

           $this->load->view("cpanal/header");
           $this->load->view("cpanal/category/add_category", $data);
           $this->load->view("cpanal/footer");
   }
   
       public function insert_category(){
    
           $title = $_POST['title_category'];
           $description = $_POST['desc_category'];
           $cat_parent = $_POST['cat_parent'];
           //$type = $_POST['type'];
           $table = 'tbl_category';

           if(empty($title) || empty($description) || empty($cat_parent)){
            $message['error'] = "Thông tin không được để trống";
            header('Location:'.BASE_URL.'category/add_category?error='.urlencode(serialize($message)));
           }else{                    
                    $data = array(
                        'title_category'=> $title,
                        'desc_category'=> $description,
                        'cat_parent' => $cat_parent
                        //'type' => $type
                    );
                    $categorymodel = $this->load->model('categorymodel');
                    $result = $categorymodel->insertcategory($table,$data);
                    if($result == 1){
                        $message['cucsess'] = "Thêm danh mục thành công";
                        header('Location:'.BASE_URL.'category?cucsess='.urlencode(serialize($message))); 
                    }else{
                        $message['error'] = "Thêm danh mục thất bại";
                        header('Location:'.BASE_URL.'category?error='.urlencode(serialize($message))); 
                    }
                }
        
       }
   
       public function list_category(){

           $categorymodel = $this->load->model("categorymodel");
           $table = 'tbl_category';
           $data["category"] = $categorymodel->all_category($table);

           $this->load->view("cpanal/header");
           $this->load->view("cpanal/category/list_category", $data);
           $this->load->view("cpanal/footer");
          }
   
       public function edit_category($id){
               
               $table = 'tbl_category';
               $cond = "tbl_category.id_category='$id'";
               $categorymodel = $this->load->model("categorymodel");
               $data["categorybyid"] = $categorymodel->categorybyid($table,$cond);
               $data["category"] = $categorymodel->category($table,$cond);
   
               $this->load->view("cpanal/header");
               $this->load->view("cpanal/category/edit_category", $data);
               $this->load->view("cpanal/footer");
       }
   
       public function update_category($id) {
    
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $update_at = new DateTime();
            $update_at = $update_at->format('Y-m-d H:i:s');
            //echo $update_at;

           $table = 'tbl_category';
           $title = $_POST['title_category'];
           $desc = $_POST['desc_category'];
           $status =$_POST['status'];
           $cat_parent = $_POST['cat_parent'];
           //$type = $_POST['type'];
           $cond = "tbl_category.id_category='$id'";
           
          if(empty($title) || empty($desc) || empty($cat_parent) ){
            $message['error'] = "Thông tin không được để trống";
            header('Location:'.BASE_URL.'category/edit_category/'.$id.'?error='.urlencode(serialize($message)));
           }else{                  
                    $data = array(
                        'title_category'=> $title,
                        'desc_category'=> $desc,
                        'update_at' => $update_at,
                        'status' => $status,
                        'cat_parent' => $cat_parent
                        //'type' => $type
                    );
                    $categorymodel = $this->load->model('categorymodel');
                    $result = $categorymodel->updatecategory($table,$data,$cond);
                    if($result == 1){
                        $message['cucsess'] = "Cập nhật danh mục thành công";
                        header('Location:'.BASE_URL.'category/?cucsess='.urlencode(serialize($message))); 
                    }else{
                        $message['error'] = "Cập nhật danh mục thất bại";
                        header('Location:'.BASE_URL.'category/edit_category?error='.urlencode(serialize($message))); 
                    }
                }
       }
   
       public function delete_category($id){
   
           $table = "tbl_category";
           $cond = "tbl_category.id_category='$id' OR tbl_category.cat_parent='$id'";
   
           $categorymodel = $this->load->model('categorymodel');
           $result = $categorymodel->deletecategory($table,$cond);
   
           if($result){
            $message['cucsess'] = "Xoá danh mục thành công";
            header('Location:'.BASE_URL.'category?cucsess='.urlencode(serialize($message))); 
        }else{
            $message['error'] = "Xoá danh mục thất bại";
            header('Location:'.BASE_URL.'category?error='.urlencode(serialize($message))); 
        }
       }

       public function active_category($id){

        $table = 'tbl_category';
        $cond = "tbl_category.id_category='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $result["data"] = $categorymodel->categorybyid($table,$cond);
        
        if($result["data"]){
            foreach ($result["data"] as $key => $value) {
                if($value['status'] == 1){

                    $data = array(
                        'status' => 2
                    );

                     $result = $categorymodel->updatecategory($table,$data,$cond);
                    if($result == 1){
                        $message['cucsess'] = "Đã tắt danh mục thành công";
                        header('Location:'.BASE_URL.'category/?cucsess='.urlencode(serialize($message))); 
                    }else{
                        $message['error'] = "Đã tắt danh mục thất bại";
                        header('Location:'.BASE_URL.'category?error='.urlencode(serialize($message))); 
                    }

                }else{
                    $data = array(
                        'status' => 1
                    );

                     $result = $categorymodel->updatecategory($table,$data,$cond);
                    if($result == 1){
                        $message['cucsess'] = "Đã mở danh mục thành công";
                        header('Location:'.BASE_URL.'category/?cucsess='.urlencode(serialize($message))); 
                    }else{
                        $message['error'] = "Đã mở danh mục thất bại";
                        header('Location:'.BASE_URL.'category?error='.urlencode(serialize($message))); 
                    }

                }
            }
    }

       }
   }
   
   ?>