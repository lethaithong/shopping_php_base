<?php
    class login extends DController{
        public function __construct(){
            
            $message = "array()";
            $data = array();
            parent::__construct();
        }
        
        public function index(){
            $this->login();
        }

        public function login(){
            $this->load->view("login");
       }


        public function dashboard(){
            Session::checkSession_admin();
            $this->load->view("cpanal/header");
            $this->load->view("cpanal/dashboard");
            $this->load->view("cpanal/footer");
        }
        public function login_user(){
            $email= $_POST['email'];
            $password= md5($_POST['password']);
            $table_admin ='tbl_admin';
            $loginmodel = $this->load->model('loginmodel');

            $count = $loginmodel->login($table_admin, $email, $password);
            if($count == 0){
                $message['error']= "Tài khoản hặc mật khẩu không đúng!";
                header('Location:'.BASE_URL.'login?error='.urlencode(serialize($message)));
            }else{

                $result = $loginmodel->getlogin($table_admin, $email, $password);
                
                Session::init();
                $level =  $result[0]['level'];    
                $status =  $result[0]['status'];  
                if($status == 1)  {
                    if($level == 0 || $level == 1){
                        Session::set('login_admin', true);
                        Session::set('email', $result[0]['email']);
                        Session::set('username', $result[0]['username']);
                        Session::set('level', $result[0]['level']);
                        Session::set('admin_id', $result[0]['admin_id']);
                        Session::set('phone', $result[0]['phone']);
                        Session::set('address', $result[0]['address']);
                        Session::set('status', $result[0]['status']);
                        
                        header('Location:'.BASE_URL.'login/dashboard');
                    }else if($level == 2){
                        Session::set('login_cus', true);
                        Session::set('email', $result[0]['email']);
                        Session::set('username', $result[0]['username']);
                        Session::set('level', $result[0]['level']);
                        Session::set('admin_id', $result[0]['admin_id']);
                        Session::set('phone', $result[0]['phone']);
                        Session::set('address', $result[0]['address']);
                        Session::set('status', $result[0]['status']);
                        header('Location:'.BASE_URL.'home');
                    }    
                }else if($status == 2){
                    $message['error']= "Tài khoản của bạn đang bị khóa";
                    header('Location:'.BASE_URL.'login?error='.urlencode(serialize($message)));
                }     
                
                
            }
        }

        public function logout_admin(){
            Session::init();
            if(session::get('login_admin')){
                session::unset('login_admin');
                header('Location:'.BASE_URL.'login');
            }
        }

        public function logout_customer(){
            Session::init();
            if(session::get('login_cus')){
                session::unset('login_cus');
                //session_unset();
                header('Location:'.BASE_URL.'home');
            }
        }

        public function register(){
            $this->load->view("register");
        }

        public function register_user(){

            $table = 'tbl_admin';
            $email = $_POST['email'];
            $username = $_POST['username'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $password = md5($_POST['password']);
            $cond = "tbl_admin.email='$email'";

            if(empty($email) || empty($username) || empty($password) || empty($address) || empty($phone)){
                $message['error'] = "Thông tin không được để trống";
                header('Location:'.BASE_URL.'login/register?error='.urlencode(serialize($message)));
            }else{
                $loginmodel = $this->load->model('loginmodel');
                $check = $loginmodel->check_customer($table,$cond);
                if($check){
                    $message['error'] = "Email này đã tồn tại!";
                    header('Location:'.BASE_URL.'login/register?error='.urlencode(serialize($message))); 
                    
                }else{

                    $data = array(
                        'email'=> $email,
                        'username'=> $username,
                        'address'=> $address,
                        'phone'=> $phone,
                        'password' => $password
                    );
                         
                        $result = $loginmodel->insert_customer($table,$data);
                        if($result == 1){
                            $message['cucsess'] = "đăng kí tài khoản thành công mời bạn đăng nhập";
                            header('Location:'.BASE_URL.'login?cucsess='.urlencode(serialize($message))); 
                        }else{
                            $message['cucsess'] = "Đăng kí tài khoản thất bại";
                            header('Location:'.BASE_URL.'login/register?cucsess='.urlencode(serialize($message))); 
                        }

                }
            }
        }
        
        public function forget_password(){
            $this->load->view("forget_password");
        }

        public function update_forget_password(){

            $email = $_POST['email'];
            if(empty($email)){
                $message['error'] = "Vui lòng điền Email";
                header('Location:'.BASE_URL.'login/forget_password?error='.urlencode(serialize($message)));
            }else{
                $table = 'tbl_admin';
                $cond = "tbl_admin.email='$email'";
                $loginmodel = $this->load->model('loginmodel');
                $check = $loginmodel->check_customer($table,$cond);
                if($check){ 
                    $string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $new_pass = substr((str_shuffle($string)),0,20);
                    
                    $data = array(
                        'password' => md5($new_pass)
                    );

                    $customermodel = $this->load->model('customermodel');
                    $customermodel->updatecustomer($table,$data,$cond);

                    $tieude = 'Đặt Lại Mật Khẩu';
                    $noidung = '<b>E-SHOPPER</b> vừa nhận được yêu cầu đặt lại mật khẩu của bạn.'.'<br>';
                    $noidung .= 'Sau khi nhận được mật khẩu mới, vui lòng đổi lại mật khẩu cho lần đăng nhập tiếp theo
                    để đảm bảo an toàn cho tài khoản của bạn'.'<br>';
                    $noidung .= 'Mật khẩu mới của bạn là : <b>'.$new_pass.'</b><br>';

                                        $send_email = $email;           
                                        $mailer = $this->load->model('Mailer');
                                        $mailer->sendmail_dathang($tieude, $noidung, $send_email);
                                        $message['cucsess'] = "Vui Lòng Kiểm tra email để đăng nhập";
                                        header('Location:'.BASE_URL.'login/?cucsess='.urlencode(serialize($message)));

                }else{
                    $message['error'] = "Email Không Tồn Tại";
                    header('Location:'.BASE_URL.'login/forget_password?error='.urlencode(serialize($message)));
            }
        }
    }
}

?>
