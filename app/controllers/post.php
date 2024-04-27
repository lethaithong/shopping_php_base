<?php
    class post extends DController{
        public function __construct(){
            parent::__construct();
            //Session::checkSession_customer();
        }

        //--------------ADMIN: CAT_POST------------------//
        public function index(){
            
            $this->list_cat_post();
        }

        public function add_cat_post(){
            Session::checkSession_admin();

            $this->load->view("cpanal/header");
            $this->load->view("cpanal/post/add_cat_post");
            $this->load->view("cpanal/footer");
    }

        public function insert_cat_post(){
            Session::checkSession_admin();
            $title = $_POST['title_cat_post'];
            $description = $_POST['desc_cat_post'];
            $table = 'tbl_cat_post';
        
            if(empty($title) || empty($description)){
                $message['error'] = "Thông tin không được để trống";
                header('Location:'.BASE_URL.'post/add_cat_post?error='.urlencode(serialize($message)));
               }else{                    
                    $data = array(
                        'title_cat_post'=> $title,
                        'desc_cat_post'=> $description
                    );
                    $postmodel = $this->load->model('postmodel');
                    $result = $postmodel->insert_cat_post($table,$data);
                        if($result == 1){
                            $message['cucsess'] = "Thêm danh mục bài viết thành công";
                            header('Location:'.BASE_URL.'post?cucsess='.urlencode(serialize($message))); 
                        }else{
                            $message['error'] = "Thêm danh mục bài viết thất bại";
                            header('Location:'.BASE_URL.'post?error='.urlencode(serialize($message))); 
                        }
                    }
        }

        public function list_cat_post(){

            Session::checkSession_admin();
            $table_cat_post = 'tbl_cat_post';
            $postmodel = $this->load->model("postmodel");
            $data["cat_post"] = $postmodel->list_cat_post($table_cat_post);

            $this->load->view("cpanal/header");
           
            $this->load->view("cpanal/post/list_cat_post", $data);
            $this->load->view("cpanal/footer");
           }
 
        public function edit_cat_post($id){

                Session::checkSession_admin();
                $cond = "tbl_cat_post.id_cat_post='$id'";
                $table = 'tbl_cat_post';
                $postmodel = $this->load->model("postmodel");
                $data["cat_postbyid"] = $postmodel->cat_postbyid($table,$cond);

                $this->load->view("cpanal/header");
                
                $this->load->view("cpanal/post/edit_cat_post", $data);
                $this->load->view("cpanal/footer");
        }

        public function update_cat_post($id) {

            Session::checkSession_admin();
            $table_cat_post = 'tbl_cat_post';
            $cond = "tbl_cat_post.id_cat_post='$id'";
            $title = $_POST['title_cat_post'];
            $desc = $_POST['desc_cat_post'];

            if(empty($title) || empty($desc)){
                $message['error'] = "Thông tin không được để trống";
                header('Location:'.BASE_URL.'post/edit_cat_post/'.$id.'?error='.urlencode(serialize($message)));
               }else{                  
                        $data = array(
                            'title_cat_post'=> $title,
                            'desc_cat_post'=> $desc
                        );
                        $postmodel = $this->load->model('postmodel');
                        $result = $postmodel->update_cat_post($table_cat_post,$data,$cond);
                        if($result == 1){
                            $message['cucsess'] = "Cập nhật danh mục thành công";
                            header('Location:'.BASE_URL.'post/list_cat_post?cucsess='.urlencode(serialize($message))); 
                        }else{
                            $message['error'] = "Cập nhật danh mục thất bại";
                            header('Location:'.BASE_URL.'category/add_cat_post?error='.urlencode(serialize($message))); 
                        }
                    }
        }

        public function delete_cat_post($id){

            Session::checkSession_admin();
            $cond = "tbl_cat_post.id_cat_post='$id'";
            $table = "tbl_cat_post";
            $postmodel = $this->load->model('postmodel');

            $result = $postmodel->deletecat_post($table,$cond);
    
            if($result == 1){
                $message['cucsess'] = "Xoá bài viết thành công";
                header('Location:'.BASE_URL.'post/list_cat_post?cucsess='.urlencode(serialize($message))); 
            }else{
                $message['error'] = "Xoá bài viết thất bại";
                header('Location:'.BASE_URL.'post/list_cat_post?error='.urlencode(serialize($message))); 
            }
        }
        //-----------------------ADMIN: POST-----------------------//

        public function add_post(){

            Session::checkSession_admin();
            $table_post = 'tbl_cat_post';
            $postmodel = $this->load->model("postmodel");
            $data["cat_post"] = $postmodel->list_cat_post($table_post);

            $this->load->view("cpanal/header");
            
            $this->load->view("cpanal/post/add_post", $data);
            $this->load->view("cpanal/footer");
    }

        public function insert_post(){

            Session::checkSession_admin();
            $table = 'tbl_post';
            $title = $_POST['title_post'];
            $content_post = $_POST['content_post'];
            $cat_post = $_POST['cat_post'];

            $image = $_FILES['image_post']['name']; // lấy trường name
            $tmp_image = $_FILES['image_post']['tmp_name']; // tạo biến tạm $tmp phải giống trường ['name']
            $div = explode('.', $image); // tách tên ra đuôi mở rộng tại vị trí dấu .
            $file_ext = strtolower(end($div)); // strtolower đổi tất cả thành chữ thường, end($div): lấy phần duôi mở rộng
            $unique_image = $div[0].time().'.'.$file_ext; // div[0] là tên nối tg lấy ảnh nối đuôi mở rộng
            $path_upload = "app/public/upload/post/".$unique_image; // lưu ảnh tại đg dẫn cố định

            if(empty($title) || empty($content_post) || empty($cat_post)){
                $message['error'] = "Thông tin không được để trống";
                header('Location:'.BASE_URL.'post/add_post?error='.urlencode(serialize($message)));
            }else{
                if($image){

                    $data = array(
                        'title_post'=> $title,
                        'content_post'=> $content_post,
                        'image_post'=> $unique_image,
                        'id_cat_post'=> $cat_post,
                        
                    );
        
                }else{
                    $data = array(
                        'title_post'=> $title,
                        'content_post'=> $content_post,
                        'image_post'=> "",
                        'id_cat_post'=> $cat_post,
                        
                    );
                }
    
                $postmodel = $this->load->model('postmodel');
                $result = $postmodel->insert_post($table,$data);
    
                if($result == 1){
                    move_uploaded_file($tmp_image, $path_upload);
                    $message['cucsess'] = "Thêm bài viết thành công";
                    header('Location:'.BASE_URL.'post/list_post?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Thêm bài viết thất bại";
                    header('Location:'.BASE_URL.'post/add_post?error='.urlencode(serialize($message))); 
                }
            }
        }

        public function list_post(){
           
            Session::checkSession_admin();
            $cond = "tbl_post.id_cat_post=tbl_cat_post.id_cat_post ";
            $table_post = 'tbl_post';
            $table_cat_post = 'tbl_cat_post';
            $postmodel = $this->load->model("postmodel");
            $data["post"] = $postmodel->list_post($table_post, $table_cat_post,$cond);

            $this->load->view("cpanal/header");
           
            $this->load->view("cpanal/post/list_post", $data);
            $this->load->view("cpanal/footer");
           }
 
        public function edit_post($id){

                Session::checkSession_admin();
                $cond = "tbl_post.id_post='$id'";
                $table_post = 'tbl_post';
                $table_cat_post = 'tbl_cat_post';

                $postmodel = $this->load->model("postmodel");
                $data["postbyid"] = $postmodel->postbyid($table_post,$cond);
                $data["cat_post"] = $postmodel->list_cat_post($table_cat_post);

                $this->load->view("cpanal/header");
               
                $this->load->view("cpanal/post/edit_post", $data);
                $this->load->view("cpanal/footer");
        }

        public function update_post($id) {

            Session::checkSession_admin();
            $cond = "tbl_post.id_post='$id'";
            $table_post = 'tbl_post';
            $title = $_POST['title_post'];
            $content_post = $_POST['content_post'];
            $cat_post = $_POST['cat_post'];

            $image = $_FILES['image_post']['name']; // lấy trường name
            $tmp_image = $_FILES['image_post']['tmp_name']; // tạo biến tạm $tmp phải giống trường ['name']
            $div = explode('.', $image); // tách tên ra đuôi mở rộng tại vị trí dấu .
            $file_ext = strtolower(end($div)); // strtolower đổi tất cả thành chữ thường, end($div): lấy phần duôi mở rộng
            $unique_image = $div[0].time().'.'.$file_ext; // div[0] là tên nối tg lấy ảnh nối đuôi mở rộng
            $path_upload = "app/public/upload/post/".$unique_image; // lưu ảnh tại đg dẫn cố định

            $postmodel = $this->load->model("postmodel");

            if(empty($title) || empty($content_post) || empty($cat_post)){
                $message['error'] = "Thông tin không được để trống";
                header('Location:'.BASE_URL.'post/edit_post/'.$id.'?error='.urlencode(serialize($message)));
            }else{

            if($image){
                $data["post"] = $postmodel->postbyid($table_post, $cond);
                    foreach($data["post"] as $key => $value){
                        if($value['image_post']){
                            $path_unlink = "app/public/upload/post/";
                            unlink($path_unlink.$value['image_post']);
                        }
                }
                $data = array(
                    'title_post' => $title,
                    'content_post' => $content_post,
                    'id_cat_post' => $cat_post,
                    'image_post' => $unique_image
                );
                move_uploaded_file($tmp_image, $path_upload);
            }else{
                $data = array(
                    'title_post' => $title,
                    'content_post' => $content_post,
                    'id_cat_post' => $cat_post
                );
            }
            
            $result = $postmodel->updatepost($table_post,$data,$cond);
             if( $result == 1 ) {
                $message['cucsess'] = "Cập nhật bài viết thành công";
                header('Location:'.BASE_URL.'post/list_post?cucsess='.urlencode(serialize($message))); 
           }else{
                $message['msg'] = "Cập nhật bài viết thất bại";
                header('Location:'.BASE_URL.'post/list_post?msg='.urlencode(serialize($message))); 
           }
        }
    }

        public function delete_post($id){

            Session::checkSession_admin();
            $table = "tbl_post";
            $cond = "tbl_post.id_post='$id'";
    
            $postmodel = $this->load->model('postmodel');
            $data["post"] = $postmodel->postbyid($table, $cond);

            foreach($data["post"] as $key => $value){
                if($value['image_post']){
                    $path_unlink = "app/public/upload/post/";
                    unlink($path_unlink.$value['image_post']);
            }
            
            $result = $postmodel->deletepost($table,$cond);
    
            if($result == 1){
                $message['msg'] = "Xoá bài viết thành công";
                header('Location:'.BASE_URL.'post/list_post?msg='.urlencode(serialize($message))); 
            }else{
                $message['msg'] = "Xoá bài viết thất bại";
                header('Location:'.BASE_URL.'post/list_post?msg='.urlencode(serialize($message))); 
            }
        }
    } 

//-------------------------------USER: CAT_POST------------------------------//
    public function all_cat_post(){

        Session::check_nextpage_admin();
        
        $table_category = 'tbl_category';
        $categorymodel = $this->load->model('categorymodel');
        $data['cat'] = $categorymodel->all_category($table_category);

        $table_cat_post = 'tbl_cat_post';
        $postmodel = $this->load->model('postmodel');
        $data['cat_post'] = $postmodel->all_cat_post($table_cat_post);

        $table_product = 'tbl_product';
        $productmodel = $this->load->model("productmodel");
        $data["product"] = $productmodel->all_product($table_product);
        
        $this->load->view("header",$data);
        $this->load->view("post",$data);
        $this->load->view("footer");
       
    }

    //-------------------------------USER: POST------------------------------//
    public function all_post(){

        Session::check_nextpage_admin();
        
        $table_category = 'tbl_category';
        $categorymodel = $this->load->model('categorymodel');
        $data['cat'] = $categorymodel->all_category($table_category);

        $table_post = 'tbl_post';
        $table_cat_post = 'tbl_cat_post';
        $postmodel = $this->load->model('postmodel');
        $data['post'] = $postmodel->all_post($table_post);
        $data['cat_post'] = $postmodel->all_cat_post($table_cat_post);

        $productmodel = $this->load->model("productmodel");
        $table_product = 'tbl_product';
        $data["product"] = $productmodel->all_product($table_product);
        
        $this->load->view("header",$data);
        $this->load->view("post",$data);
        $this->load->view("footer");
       
    }

    public function all_list_post(){

        Session::check_nextpage_admin();
        
        $table_category = 'tbl_category';
        $categorymodel = $this->load->model('categorymodel');
        $data['cat'] = $categorymodel->all_category($table_category);

        $table_post = 'tbl_post';
        $table_cat_post = 'tbl_cat_post';
        $postmodel = $this->load->model('postmodel');
        $data['post'] = $postmodel->all_list_post($table_post);
        $data['cat_post'] = $postmodel->all_cat_post($table_cat_post);

        $productmodel = $this->load->model("productmodel");
        $table_product = 'tbl_product';
        $data["product"] = $productmodel->all_product($table_product);
        
        $this->load->view("header",$data);
        $this->load->view("post",$data);
        $this->load->view("footer");
       
    }

    public function postbycat($id){

        Session::check_nextpage_admin();
               
        $table_category = 'tbl_category';
        $categorymodel = $this->load->model('categorymodel');
        $data['cat'] = $categorymodel->all_category($table_category);

        $table_product = 'tbl_product';
        $productmodel = $this->load->model('productmodel');
        $data['product'] = $productmodel->all_product($table_product);

        $table_cat_post = 'tbl_cat_post';
        $table_post = 'tbl_post';
        $cond = "tbl_cat_post.id_cat_post=tbl_post.id_cat_post AND tbl_post.id_cat_post='$id'";
        $postmodel = $this->load->model('postmodel');
        $data['cat_post'] = $postmodel->all_cat_post($table_cat_post);
        $data['postbycat'] = $postmodel->postbycat($table_cat_post, $table_post, $cond);

       
        $this->load->view("header",$data);
        $this->load->view("postbycat",$data);
        $this->load->view("footer");
       
    }

    public function post_detail($id){

        Session::check_nextpage_admin();
        
        $table_category = 'tbl_category';
        $categorymodel = $this->load->model('categorymodel');
        $data['cat'] = $categorymodel->all_category($table_category);

        $table_cat_post = 'tbl_cat_post';
        $table_post = 'tbl_post';
        $postmodel = $this->load->model('postmodel');
        
        $cond = "tbl_cat_post.id_cat_post=tbl_post.id_cat_post AND tbl_post.id_post='$id'";
        $data['cat_post'] = $postmodel->all_cat_post($table_cat_post);
        $data['post'] = $postmodel->all_post($table_cat_post, $table_post, $cond);

        foreach ($data["post"] as $key => $value) {
            $id_post = $value['id_cat_post'];
        }
        
        $cond_related ="tbl_cat_post.id_cat_post=tbl_post.id_cat_post AND tbl_cat_post.id_cat_post='$id_post'
        AND tbl_post.id_post NOT IN('$id')";
        $data["related"] = $postmodel->related_post($table_cat_post ,$table_post, $cond_related);

        $this->load->view("header",$data);
        $this->load->view("post_detail", $data);
        $this->load->view("footer");
       
    }
}
    
?>