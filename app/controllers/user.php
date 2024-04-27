<?php
   class user extends DController{
       public function __construct(){
           Session::checkSession_admin();
           
           $data = array();
           $message = array();
           parent::__construct();
       }
   
   
       public function list_admin(){

           Session::check_role_admin();
           $table_admin = "tbl_admin";
           $cond = "level=1 OR level=0";
           $user = $this->load->model('usermodel');
           $data['user'] = $user->all_admin($table_admin, $cond);

           $this->load->view("cpanal/header");
           $this->load->view("cpanal/user/list_admin", $data);
           $this->load->view("cpanal/footer");
       }

       public function add_admin(){

       Session::check_role_admin();
       $this->load->view("cpanal/header");
       $this->load->view("cpanal/user/add_admin");
       $this->load->view("cpanal/footer");
}

       public function active_admin($id){

        Session::check_role_admin();
        $table = 'tbl_admin';
        $cond = "admin_id='$id'";
        $usermodel = $this->load->model('usermodel');
        $result["data"] = $usermodel->userbyid($table,$cond);
        
        if($result["data"]){
            foreach ($result["data"] as $key => $value) {
                if($value['status'] == 1){

                    $data = array(
                        'status' => 2
                    );

                    $result = $usermodel->update_admin($table,$data,$cond);
                    if($result == 1){
                        $message['cucsess'] = "Đã khóa trạng thái thành công";
                        header('Location:'.BASE_URL.'user/list_admin?cucsess='.urlencode(serialize($message))); 
                    }else{
                        $message['error'] = "Đã khóa trạng thất bại";
                        header('Location:'.BASE_URL.'user/list_admin?error='.urlencode(serialize($message))); 
                    }

                }else{
                    $data = array(
                        'status' => 1
                    );

                    $result = $usermodel->update_admin($table,$data,$cond);
                    if($result == 1){
                        $message['cucsess'] = "Đã mở trạng thái thành công";
                        header('Location:'.BASE_URL.'user/list_admin?cucsess='.urlencode(serialize($message))); 
                    }else{
                        $message['error'] = "Đã mở trạng thái thất bại";
                        header('Location:'.BASE_URL.'user/list_admin?error='.urlencode(serialize($message))); 
                    }

                }
            }
        }
    }

    public function insert_admin(){
            
        Session::check_role_admin();
        $table = 'tbl_admin';
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $address =$_POST['address'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];
        $level = $_POST['level'];

        if(empty($username) || empty($email) || empty($address) || empty($phone) || empty($status) || empty($password)){
            $message['error'] = "Thông tin không được để trống";
            header('Location:'.BASE_URL.'user/add_admin?error='.urlencode(serialize($message)));
           }else{                  
                    $data = array(
                        'username'=> $username,
                        'password' => $password,
                        'email'=> $email,
                        'address' => $address,
                        'status' => $status,
                        'phone' => $phone,
                        'level' => $level
                    );
                    $usermodel = $this->load->model('usermodel');
                    $result = $usermodel->insert_admin($table,$data);
                    if($result == 1){
                        $message['cucsess'] = "Tạo tài khoản thành công";
                        header('Location:'.BASE_URL.'user/list_admin?cucsess='.urlencode(serialize($message))); 
                    }else{
                        $message['error'] = "Tạo tài khoản thất bại";
                        header('Location:'.BASE_URL.'user/edit_admin?error='.urlencode(serialize($message))); 
                    }
                }
     
    }
    public function delete_admin($id){
   
        Session::check_role_admin();
        $table = "tbl_admin";
        $cond = "admin_id='$id'";

        $usermodel = $this->load->model('usermodel');
        $result = $usermodel->delete_admin($table,$cond);

        if($result){
         $message['cucsess'] = "Xoá nhân viên thành công";
         header('Location:'.BASE_URL.'user/list_admin?cucsess='.urlencode(serialize($message))); 
     }else{
         $message['error'] = "Xoá nhân viên thất bại";
         header('Location:'.BASE_URL.'user/list_admin?error='.urlencode(serialize($message))); 
        }
    }

    public function edit_admin($id){

        Session::check_role_admin();
        $table = 'tbl_admin';
        $cond = "admin_id='$id'";
        $usermodel = $this->load->model("usermodel");
        $data["userbyid"] = $usermodel->userbyid($table,$cond);

        $this->load->view("cpanal/header");
        $this->load->view("cpanal/user/edit_admin", $data);
        $this->load->view("cpanal/footer");
}

public function update_admin($id) {
    
   Session::check_role_admin();
   $table = 'tbl_admin';
   $username = $_POST['username'];
   $email = $_POST['email'];
   $address =$_POST['address'];
   $phone = $_POST['phone'];
   $status = $_POST['status'];

   $cond = "admin_id='$id'";
   
  if(empty($username) || empty($email) || empty($address) || empty($phone)){
    $message['error'] = "Thông tin không được để trống";
    header('Location:'.BASE_URL.'user/edit_admin/'.$id.'?error='.urlencode(serialize($message)));
   }else{                  
            $data = array(
                'username'=> $username,
                'email'=> $email,
                'address' => $address,
                'status' => $status,
                'phone' => $phone
            );
            $usermodel = $this->load->model('usermodel');
            $result = $usermodel->update_admin($table,$data,$cond);
            if($result == 1){
                $message['cucsess'] = "Cập nhật thông tin thành công";
                header('Location:'.BASE_URL.'user/list_admin?cucsess='.urlencode(serialize($message))); 
            }else{
                $message['error'] = "Cập nhật thông tin thất bại";
                header('Location:'.BASE_URL.'user/edit_admin?error='.urlencode(serialize($message))); 
            }
        }
}

public function list_customer(){

    Session::check_role_admin();
    $table_admin = "tbl_admin";
    $cond = "level=2";
    $user = $this->load->model('usermodel');
    $data['user'] = $user->all_admin($table_admin, $cond);

    $this->load->view("cpanal/header");
    $this->load->view("cpanal/user/list_customer", $data);
    $this->load->view("cpanal/footer");
}
    
public function active_customer($id){

    Session::check_role_admin();
    $table = 'tbl_admin';
    $cond = "admin_id='$id'";
    $usermodel = $this->load->model('usermodel');
    $result["data"] = $usermodel->userbyid($table,$cond);
    
    if($result["data"]){
        foreach ($result["data"] as $key => $value) {
            if($value['status'] == 1){

                $data = array(
                    'status' => 2
                );

                $result = $usermodel->update_admin($table,$data,$cond);
                if($result == 1){
                    $message['cucsess'] = "Đã khóa trạng thái thành công";
                    header('Location:'.BASE_URL.'user/list_customer?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Đã khóa trạng thất bại";
                    header('Location:'.BASE_URL.'user/list_customer?error='.urlencode(serialize($message))); 
                }

            }else{
                $data = array(
                    'status' => 1
                );

                $result = $usermodel->update_admin($table,$data,$cond);
                if($result == 1){
                    $message['cucsess'] = "Đã mở trạng thái thành công";
                    header('Location:'.BASE_URL.'user/list_customer?cucsess='.urlencode(serialize($message))); 
                }else{
                    $message['error'] = "Đã mở trạng thái thất bại";
                    header('Location:'.BASE_URL.'user/list_customer?error='.urlencode(serialize($message))); 
                }

            }
        }
    }
}

public function profile_admin(){

$this->load->view("cpanal/header");
$this->load->view("cpanal/user/profile_admin");
$this->load->view("cpanal/footer");
}
}