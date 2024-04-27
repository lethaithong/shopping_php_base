<?php
   class giohang extends DController{
       public function __construct(){
        Session::check_nextpage_admin();
           $data = array();
           parent::__construct();
       }
   
       public function index(){
           $this->homepage();
       }
       public function homepage(){
           
           $table = "tbl_category";
           $categorymodel = $this->load->model('categorymodel');
           $data["cat"] = $categorymodel->all_category($table);
   
           $this->load->view("header", $data);
           $this->load->view("cart");
           $this->load->view("footer");
          
       }
   
       public function themgiohang(){
        
            if(isset($_POST['btn_addcart'])){
                if(isset($_SESSION["shopping_cart"])){
                    $avaiable = 0;
                    foreach ($_SESSION["shopping_cart"] as $key => $value) {
                         if($_SESSION["shopping_cart"][$key]['id_product'] == $_POST['id_product']){
                            $avaiable++;
                            $_SESSION["shopping_cart"][$key]['quantity_product'] = 
                            $_SESSION["shopping_cart"][$key]['quantity_product'] + $_POST['quantity_product'];
                    
                         }
                    }
                    if($avaiable == 0){
                        $item = array(
                            'id_product' => $_POST["id_product"],
                            'title_product' => $_POST["title_product"],
                            'price_product' => $_POST["price_product"],
                            'image_product' => $_POST["image_product"],
                            'quantity_product' => $_POST["quantity_product"],
                            'desc_product' => $_POST["desc_product"]
                        );
                        $_SESSION["shopping_cart"][] = $item;
                    }
                }else{
                    $item = array(
                        'id_product' => $_POST["id_product"],
                        'title_product' => $_POST["title_product"],
                        'price_product' => $_POST["price_product"],
                        'image_product' => $_POST["image_product"],
                        'quantity_product' => $_POST["quantity_product"],
                        'desc_product' => $_POST["desc_product"]
                    );
                    $_SESSION["shopping_cart"][] = $item;
                }
                header("Location:".BASE_URL."giohang");
            }else{
                $message['message'] = "Thêm sản phẩm vào giỏ hàng thất bại!";
                header('Location:'.BASE_URL.'giohang?message='.urlencode(serialize($message)));
            }

        }
       
   
        public function capnhatgiohang(){
           
           if(isset($_POST['delete_cart'])){
               if(isset($_SESSION['shopping_cart'])){
                foreach($_SESSION['shopping_cart'] as $key => $value) {
                    if($_SESSION['shopping_cart'][$key]['id_product'] == $_POST['delete_cart']){
                        unset($_SESSION["shopping_cart"][$key]); 
                        }
                    }
                    header("Location:".BASE_URL."giohang");
             }  
           }else{
               foreach($_POST['quantity'] as $key => $value) {
                
                   foreach($_SESSION['shopping_cart'] as $keys => $values) {
                       if($values['id_product'] == $key && $value >= 1){
                           $_SESSION['shopping_cart'][$keys]['quantity_product'] = $value;
                           header("Location:".BASE_URL."giohang");
                       }elseif($values['id_product'] == $key && $value <= 0){
                           unset($_SESSION["shopping_cart"][$keys]);
                           header("Location:".BASE_URL."giohang");
                       }
                   }
               }
           }
       } 
   
       public function dathang(){

                date_default_timezone_set('asia/ho_chi_minh');
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $address = $_POST["address"];   
                $email = $_POST["email"];
                $note = $_POST["note"];
                $date = date("d/m/Y");
                $hour = date("h/i/sa");
                $code_order = Rand(0,9999);
                $total_order = $_POST['total_order'];
                if(Session::get('coupon') == true){
                    $coupon_code = Session::get('coupon_code');
                    $coupon_condition = Session::get('coupon_condition');
                    $coupon_number = Session::get('coupon_number');
                }else{
                    if(isset($_POST['coupon_code'])){
                        $coupon_code = $_POST['coupon_code'];
                        $coupon_condition = "";
                        $coupon_number = "";
                    }else{
                        $coupon_code = "";
                        $coupon_condition = "";
                        $coupon_number = "";
                    }
                    
                }
                

                $table_order = "tbl_order"; 
                $table_order_detail = "tbl_order_detail";
                $ordermodel = $this->load->model('ordermodel');

                if(isset($_POST['btn_coupon'])){
                    $this->check_coupon($coupon_code);
                }

                if(isset($_POST['btn_delete_coupon'])){
                    $this->delete_coupon();
                }

                if(empty($name) || empty($phone) || empty($address)){
                    $message['message'] = "Thông tin không được để trống!";
                    header('Location:'.BASE_URL.'giohang?message='.urlencode(serialize($message)));
                }else{
                    if(isset($_POST['btn_thanhtoan'])){
                        
                        if(Session::get('login_cus')==true){
                                $admin_id = Session::get('admin_id');
                        }else{
                            $admin_id = "";
                        }
                        $data_order = array(
                            'status_order' => '0',
                            'code_order' => $code_order,
                            'date_order' => $date.' '.$hour,
                            'admin_id' => $admin_id,
                            'coupon_code' => $coupon_code,
                            'coupon_condition' => $coupon_condition,
                            'coupon_number' => $coupon_number,
                            'total_order' => $total_order
                        );

                        $resuilt_order = $ordermodel->insert_order($table_order, $data_order);
                        if($resuilt_order == 1){

                            if(Session::get("shopping_cart") == true){
                                foreach (Session::get("shopping_cart") as $key => $value){
                                    $data_order_detail = array(
                                        'code_order' => $code_order,
                                        'id_product' => $value['id_product'],
                                        'quantity' => $value['quantity_product'],
                                        'name' => $name,
                                        'phone' => $phone,
                                        'address' => $address,
                                        'email' => $email,
                                        'note' => $note 
                                    );
                                    $resuilt_order_detail = $ordermodel->insert_order_detail($table_order_detail, $data_order_detail);   
                                }     
                                    }
                                if($resuilt_order_detail){

                                    if(isset($email)){
                                        $tongtien = 0;
                                        $tieude = 'Đặt Hàng Thành Công';
                                        $noidung = 'Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng:' .$code_order.'<br>';
                                        $noidung .= 'Thông Tin Đơn Hàng:<br>';
    
                                        foreach($_SESSION["shopping_cart"] as $key => $value){
                                        $dongia = $value['price_product']*$value['quantity_product'];
    
                                        $noidung .= '<ul style="border: ridge">
                                                        <li>Tên Sản Phẩm:' .$value['title_product'].'</li>
                                                        <li>Mã Sản Phẩm:' .$value['id_product'].'</li>
                                                        <li>Số Lượng:' .$value['quantity_product'].'</li>
                                                        <li>Đơn Giá:' .number_format($value['price_product']). 'VND</li>
                                                        <li>Thành Tiền:' .number_format($dongia). 'VND</li>
                                                    </ul>';
                                        $tongtien+=$dongia;}
                                        
                                        $noidung .= '<ul>
                                                        <li>Tổng Tiền Thanh Toán:' .number_format($tongtien). 'VND</li>
                                                    </ul>';
    
                                        $send_email = $email;           
                                        $mailer = $this->load->model('Mailer');
                                        $mailer->sendmail_dathang($tieude, $noidung, $send_email);
                                        unset($_SESSION["shopping_cart"]);
                                        unset($_SESSION["coupon"]);
                                        header('Location:'.BASE_URL.'home/order_cucsess');
                                        
                                    }else{
                                        header('Location:'.BASE_URL.'home/order_cucsess');
                                    } 
                            }else{
                                $message['message'] = "Đặt hàng thất bại!";
                                header('Location:'.BASE_URL.'giohang?message='.urlencode(serialize($message)));
                        }
                    }
                }
            }
        }

        public function check_coupon($coupon_code){
            if(!empty($coupon_code)){
                $table = "tbl_coupon";
                $cond = "coupon_code='$coupon_code'";
                $couponmodel = $this->load->model('couponmodel');

                $result = $couponmodel->find_coupon($table,$cond);
                
                if($result){
                    Session::set('coupon', true);
                    Session::set('coupon_code', $result[0]['coupon_code']);
                    Session::set('coupon_condition', $result[0]['coupon_condition']);
                    Session::set('coupon_number', $result[0]['coupon_number']);
                    
                    $table = "tbl_category";
                    $categorymodel = $this->load->model('categorymodel');
                    $data["cat"] = $categorymodel->all_category($table);
            
                    $this->load->view("header",$data);
                    $this->load->view("cart");
                    $this->load->view("footer");
                }else{
                    
                    $message['error'] = "Mã giảm giá không tồn tại";
                    header('Location:'.BASE_URL.'giohang?error='.urlencode(serialize($message))); 
                }
            }else{
                $message['error'] = "Vui lòng nhập mã giảm giá";
                header('Location:'.BASE_URL.'giohang?error='.urlencode(serialize($message))); 
            }
            
         }

         public function delete_coupon(){
            if(Session::get('coupon') == true){
                Session::unset('coupon');
                header('Location:'.BASE_URL.'giohang');
            }
         }

   }
   
   ?>