<?php
   class coupon extends DController{
       public function __construct(){
           Session::checkSession_admin();
           Session::check_role_admin();
           $data = array();
           $message = array();
           parent::__construct();
       }
   
   
       public function index(){
           $this->list_coupon();
       }
   
       public function list_coupon(){
   
           $table_coupon = 'tbl_coupon';
           $couponmodel = $this->load->model("couponmodel");
           $data["coupon"] = $couponmodel->list_coupon( $table_coupon);
   
           $this->load->view("cpanal/header");
           $this->load->view("cpanal/coupon/list_coupon", $data);
           $this->load->view("cpanal/footer");
          }
   
          public function add_coupon(){
            

           $this->load->view("cpanal/header");
           $this->load->view("cpanal/coupon/add_coupon");
           $this->load->view("cpanal/footer");
   }
          public function insert_coupon(){
    
            $coupon_name = $_POST['coupon_name'];
            $coupon_code = $_POST['coupon_code'];
            $coupon_quantity = $_POST['coupon_quantity'];
            $coupon_condition = $_POST['coupon_condition'];
            $coupon_number = $_POST['coupon_number'];
            $table = 'tbl_coupon';
 
            if(empty($coupon_name) || empty($coupon_code) || empty($coupon_quantity)|| empty($coupon_condition)|| empty($coupon_number)){
             $message['error'] = "Thông tin không được để trống";
             header('Location:'.BASE_URL.'coupon/add_coupon?error='.urlencode(serialize($message)));
            }else{                    
                     $data = array(
                         'coupon_name'=> $coupon_name,
                         'coupon_code'=> $coupon_code,
                         'coupon_quantity' => $coupon_quantity,
                         'coupon_condition' => $coupon_condition,
                         'coupon_number' => $coupon_number,
                     );
                     $couponmodel = $this->load->model('couponmodel');
                     $result = $couponmodel->insert_coupon($table,$data);
                     if($result == 1){
                         $message['cucsess'] = "Thêm mã giảm giá thành công";
                         header('Location:'.BASE_URL.'coupon?cucsess='.urlencode(serialize($message))); 
                     }else{
                         $message['error'] = "Thêm mã giảm giá thất bại";
                         header('Location:'.BASE_URL.'coupon?error='.urlencode(serialize($message))); 
                     }
                 }
         
        }
       public function edit_coupon($id){
   
               
               $cond = "coupon_id='$id'";
               $table_coupon = 'tbl_coupon';
               $couponmodel = $this->load->model("couponmodel");

               $data["couponbyid"] = $couponmodel->couponbyid_ad($table_coupon, $cond);
               
               $this->load->view("cpanal/header");
               
               $this->load->view("cpanal/coupon/edit_coupon", $data);
               $this->load->view("cpanal/footer");
       }
   
       public function update_coupon($id) {
           
       $table = 'tbl_coupon';
       $coupon_name = $_POST['coupon_name'];
       $coupon_code = $_POST['coupon_code'];
       $coupon_quantity =$_POST['coupon_quantity'];
       $coupon_condition = $_POST['coupon_condition'];
       $coupon_number = $_POST['coupon_number'];
       $cond = "coupon_id='$id'";
       
       if(empty($coupon_name) || empty($coupon_code) || empty($coupon_quantity)|| empty($coupon_condition)|| empty($coupon_number)){
        $message['error'] = "Thông tin không được để trống";
        header('Location:'.BASE_URL.'coupon/edit_coupon?error='.urlencode(serialize($message)));
       }else{                    
                $data = array(
                    'coupon_name'=> $coupon_name,
                    'coupon_code'=> $coupon_code,
                    'coupon_quantity' => $coupon_quantity,
                    'coupon_condition' => $coupon_condition,
                    'coupon_number' => $coupon_number,
                );
                $couponmodel = $this->load->model('couponmodel');
                $result = $couponmodel->update_coupon($table,$data,$cond);
                if($result == 1){
                    $message['cucsess'] = "Cập nhật mã giảm giá thành công";
                    header('Location:'.BASE_URL.'coupon?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Cập nhật mã giảm giá thất bại";
                    header('Location:'.BASE_URL.'coupon/edit_coupon?error='.urlencode(serialize($message))); 
                }
            }
    }
       public function delete_coupon($id){
   
           $table = "tbl_coupon";
           $cond = "coupon_id='$id'";
           $couponmodel = $this->load->model('couponmodel');
   
           $result = $couponmodel->delete_coupon($table,$cond);
           if($result == 1){
               $message['cucsess'] = "Xoá mã giảm giá thành công";
               header('Location:'.BASE_URL.'coupon/list_coupon?cucsess='.urlencode(serialize($message))); 
           }else{
               $message['error'] = "Xoá mã giamr giá thất bại";
               header('Location:'.BASE_URL.'coupon/list_coupon?error='.urlencode(serialize($message))); 
           }
       }

   
   }
   ?>