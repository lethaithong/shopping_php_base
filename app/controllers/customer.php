<?php
    class customer extends DController{
        public function __construct(){
            //Session::check_nextpage_admin();
            Session::checkSession_customer();
            $message = "array()";
            $data = array();
            parent::__construct();
        }


        public function order(){

            $table = 'tbl_category';
            $categorymodel = $this->load->model('categorymodel');
            $data['cat'] = $categorymodel->all_category($table);

            $table_order = "tbl_order";
            $ordermodel = $this->load->model('ordermodel');
            $data['order'] = $ordermodel->list_order($table_order);

            $this->load->view("header", $data);
            $this->load->view("myorder", $data);
            $this->load->view("footer");
        }

    public function update_customer() {
    
       $table = 'tbl_admin';
       $username = $_POST['username'];
       $email = $_POST['email'];
       $address =$_POST['address'];
       $phone = $_POST['phone'];
       $id = $_POST['admin_id'];

       $cond = "admin_id='$id'";
       
      if(empty($username) || empty($email) || empty($address) || empty($phone)){
        $message['error'] = "Thông tin không được để trống";
        header('Location:'.BASE_URL.'home/profile?error='.urlencode(serialize($message)));
       }else{                  
                $data = array(
                    'username'=> $username,
                    'email'=> $email,
                    'address' => $address,
                    'phone' => $phone
                );
                $customermodel = $this->load->model('customermodel');
                $result = $customermodel->updatecustomer($table,$data,$cond);
                if($result == 1){
                    $message['cucsess'] = "Cập nhật tài khoản thành công";
                    header('Location:'.BASE_URL.'home/profile?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Cập nhật tài khoản thất bại";
                    header('Location:'.BASE_URL.'home/profile?error='.urlencode(serialize($message))); 
                }
            }
        }

        public function order_detail($code_order){

            $table = 'tbl_category';
            $categorymodel = $this->load->model('categorymodel');
            $data['cat'] = $categorymodel->all_category($table);

            $table_order_detail = "tbl_order_detail";
            $table_order = "tbl_order";
            $table_product = "tbl_product";
            $ordermodel = $this->load->model('ordermodel');
            $cond = "$table_order.code_order = $code_order AND $table_product.id_product = $table_order_detail.id_product AND $table_order_detail.code_order = '$code_order'";
            $cond_info = "$table_order_detail.code_order = '$code_order'";
            $data['order_detail'] = $ordermodel->list_order_detail($table_order,$table_order_detail,$table_product,$cond);
            $data['order_info'] = $ordermodel->order_info($table_order_detail,$cond_info);

            $this->load->view("header", $data);
            $this->load->view("myorder_detail", $data);
            $this->load->view("footer");
        }

        public function cancel_order($code_order){
            if(isset($_POST['cancel_order'])){
                $table_order = "tbl_order";
                $ordermodel = $this->load->model('ordermodel');
                $cond = "$table_order.code_order = '$code_order'";
                $data = array(
                    'status_order' => 2
                );
                $result = $ordermodel->order_confirm($table_order,$data,$cond);

                if( $result == 1 ) {
                    $message['cucsess'] = "Đã hủy đơn hàng thành công";
                    header('Location:'.BASE_URL.'home/myorder?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Đã hủy đơn hàng thất bại";
                    header('Location:'.BASE_URL.'home/myorder?error='.urlencode(serialize($message))); 
                }
            }
        }

        public function change_password(){
            
            $table = "tbl_category";
            $categorymodel = $this->load->model('categorymodel');
            $data["cat"] = $categorymodel->all_category($table);

            $this->load->view("header", $data);
            $this->load->view("change_password", $data);
            $this->load->view("footer");
        }

        public function update_password() {
    
            $table = 'tbl_admin';
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $renew_password = $_POST['renew_password'];

            $id = $_POST['admin_id'];
            $cond = "admin_id='$id'";
            
           if(empty($old_password) || empty($new_password) || empty($renew_password)){
             $message['error'] = "Thông tin không được để trống";
             header('Location:'.BASE_URL.'customer/change_password?error='.urlencode(serialize($message)));
            }else{
                $user = $this->load->model('usermodel');
                $resuilt = $user->userbyid($table, $cond);  
                foreach ($resuilt as $value) {
                    if($value['password'] == md5($old_password)){
                        $data = array(
                                'password' => md5($new_password)
                     );
                     $customermodel = $this->load->model('customermodel');
                     $result = $customermodel->updatecustomer($table,$data,$cond);
                     if($result == 1){
                         $message['cucsess'] = "Cập nhật tài khoản thành công";
                         header('Location:'.BASE_URL.'customer/change_password?cucsess='.urlencode(serialize($message))); 
                     }else{
                         $message['error'] = "Cập nhật tài khoản thất bại";
                         header('Location:'.BASE_URL.'customer/change_password?error='.urlencode(serialize($message))); 
                     }
                    }else{
                        $message['error'] = "Mật khẩu cũ không chính xác";
                        header('Location:'.BASE_URL.'customer/change_password?error='.urlencode(serialize($message)));
                    }
                }   
            }
        }

    }

?>