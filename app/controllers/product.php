<?php
   class product extends DController{
       public function __construct(){
           Session::checkSession_admin();
           Session::check_role_admin();
           
           $data = array();
           $message = array();
           parent::__construct();
       }
   
   
       public function index(){
           $this->list_product();
       }
   
       public function add_product(){
            $table_category = 'tbl_category';
            $categorymodel = $this->load->model("categorymodel");
            $data["category"] = $categorymodel->category($table_category);
   
           $this->load->view("cpanal/header");
           $this->load->view("cpanal/product/add_product", $data);
           $this->load->view("cpanal/footer");
   }
   
   public function insert_product(){
    
    $table = 'tbl_product';
    $title = $_POST['title_product'];
    $price = $_POST['price_product'];
    $desc = $_POST['desc_product'];
    $quantity = $_POST['quantity_product'];
    $category = $_POST['category_product'];
    $product_hot = $_POST['product_hot'];

    $image = $_FILES['image_product']['name']; // lấy trường name
    $tmp_image = $_FILES['image_product']['tmp_name']; // tạo biến tạm $tmp phải giống trường ['name']
    $div = explode('.', $image); // tách tên ra đuôi mở rộng tại vị trí dấu .
    $file_ext = strtolower(end($div)); // strtolower đổi tất cả thành chữ thường, end($div): lấy phần duôi mở rộng
    $unique_image = $div[0].time().'.'.$file_ext; // div[0] là tên nối tg lấy ảnh nối đuôi mở rộng
    $path_upload = "app/public/upload/product/".$unique_image; // lưu ảnh tại đg dẫn cố định

    if(empty($title) || empty($price) || empty($desc) || empty($quantity) || empty($category) || empty($product_hot)){
        $message['error'] = "Thông tin không được để trống";
        header('Location:'.BASE_URL.'product/add_product?error='.urlencode(serialize($message)));
    }else if(is_numeric($price) == 0 || is_numeric($quantity) == 0){
            $message['error'] = "Giá bán và số lượng phải là số";
            header('Location:'.BASE_URL.'product/add_product?error='.urlencode(serialize($message)));
                }
        else{
            if($image){
                $data = array(
                'title_product'=> $title,
                'price_product'=> $price,
                'image_product'=> $unique_image,
                'desc_product'=> $desc,
                'quantity_product'=> $quantity,
                'id_cat_product'=> $category,
                'product_hot' => $product_hot
                );
            }else{
                $data = array(
                'title_product'=> $title,
                'price_product'=> $price,
                'image_product'=> "",
                'desc_product'=> $desc,
                'quantity_product'=> $quantity,
                'id_cat_product'=> $category,
                'product_hot' => $product_hot
                );
            }
                $productmodel = $this->load->model('productmodel');
                $result = $productmodel->insertproduct($table,$data);
                if($result == 1){
                    move_uploaded_file($tmp_image, $path_upload);
                    $message['cucsess'] = "Thêm sản phẩm thành công";
                    header('Location:'.BASE_URL.'product?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Thêm sản phẩm thất bại";
                    header('Location:'.BASE_URL.'product?error='.urlencode(serialize($message))); 
                }
            }
    }
   
       public function list_product(){
   
           $cond = "tbl_category.id_category=tbl_product.id_cat_product ";
           $table_product = 'tbl_product';
           $table_category = 'tbl_category';
           $productmodel = $this->load->model("productmodel");
           $data["product"] = $productmodel->list_product( $table_category, $table_product, $cond);
   
           $this->load->view("cpanal/header");
           
           $this->load->view("cpanal/product/list_product", $data);
           $this->load->view("cpanal/footer");
          }
   
       public function edit_product($id){
   
               
               $cond = "tbl_product.id_product='$id'";
               $table_category = 'tbl_category';
               $categorymodel = $this->load->model("categorymodel");
               $data["category"] = $categorymodel->category($table_category);
   
               $table_product = 'tbl_product';
               $productmodel = $this->load->model("productmodel");
               $data["productbyid"] = $productmodel->productbyid_ad($table_product, $cond);
               
               $this->load->view("cpanal/header");
               
               $this->load->view("cpanal/product/edit_product", $data);
               $this->load->view("cpanal/footer");
       }
   
       public function update_product($id) {
           
           $table = 'tbl_product';
           $cond = "tbl_product.id_product='$id'";
           $productmodel = $this->load->model('productmodel');
   
           $title = $_POST['title_product'];
           $price = $_POST['price_product'];
           $desc = $_POST['desc_product'];
           $quantity = $_POST['quantity_product'];
           $category = $_POST['category_product'];
           $product_hot = $_POST['product_hot'];
   
           $image = $_FILES['image_product']['name']; // lấy trường name
           $tmp_image = $_FILES['image_product']['tmp_name']; // tạo biến tạm $tmp phải giống trường ['name']
           $div = explode('.', $image); // tách tên ra đuôi mở rộng tại vị trí dấu .
           $file_ext = strtolower(end($div)); // strtolower đổi tất cả thành chữ thường, end($div): lấy phần duôi mở rộng
           $unique_image = $div[0].time().'.'.$file_ext; // div[0] là tên nối tg lấy ảnh nối đuôi mở rộng
           $path_upload = "app/public/upload/product/".$unique_image; // lưu ảnh tại đg dẫn cố định

            if(empty($title) || empty($price) || empty($desc) || empty($quantity) || empty($category) || empty($product_hot)){
                $message['error'] = "Thông tin không được để trống";
                header('Location:'.BASE_URL.'product/edit_product/'.$id.'?error='.urlencode(serialize($message)));
            }else if(is_numeric($price) == 0 || is_numeric($quantity) == 0){
                $message['error'] = "Giá bán và số lượng phải là số";
                header('Location:'.BASE_URL.'product/edit_product/'.$id.'?error='.urlencode(serialize($message)));
                }
            else{
                if($image){
                    $data["productbyid"] = $productmodel->productbyid_ad($table, $cond);
                    foreach($data["productbyid"] as $key => $value){
                        if($value['image_product']){
                            $path_unlink = "app/public/upload/product/";
                            unlink($path_unlink.$value['image_product']);
                        }
                    }
                    $data = array(
                        'title_product'=> $title,
                        'price_product'=> $price,
                        'image_product'=> $unique_image,
                        'desc_product'=> $desc,
                        'quantity_product'=> $quantity,
                        'id_cat_product'=> $category,
                        'product_hot' => $product_hot
                    );
                    move_uploaded_file($tmp_image, $path_upload);
                }else{
                    $data = array(
                        'title_product'=> $title,
                        'price_product'=> $price,
                        'desc_product'=> $desc,
                        'quantity_product'=> $quantity,
                        'id_cat_product'=> $category,
                        'product_hot' => $product_hot
                    );
                }
                
                $result = $productmodel->update_product($table,$data,$cond);
                if($result == 1){
                    $message['cucsess'] = "Cập nhật sản phẩm thành công";
                    header('Location:'.BASE_URL.'product/list_product?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Cập nhật sản phẩm thất bại";
                    header('Location:'.BASE_URL.'product?error='.urlencode(serialize($message))); 
                }
            }
    }
       public function delete_product($id){
   
           $table = "tbl_product";
           $cond = "tbl_product.id_product='$id'";
           $productmodel = $this->load->model('productmodel');
           $data["productbyid"] = $productmodel->productbyid_ad($table, $cond);
   
           foreach($data["productbyid"] as $key => $value){
               if($value['image_product']){
                   $path_unlink = "app/public/upload/product/";
                   unlink($path_unlink.$value['image_product']);
           }
       }
           $result = $productmodel->deleteproduct($table,$cond);
           if($result == 1){
               $message['cucsess'] = "Xoá danh mục thành công";
               header('Location:'.BASE_URL.'product/list_product?cucsess='.urlencode(serialize($message))); 
           }else{
               $message['error'] = "Xoá danh mục thất bại";
               header('Location:'.BASE_URL.'product/list_product?error='.urlencode(serialize($message))); 
           }
       }
   
   }
   ?>