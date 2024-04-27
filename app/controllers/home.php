<?php
    class home extends DController{
        public function __construct(){
            
            $data = array();
            parent::__construct();
            
        }

        public function index(){
            $this->homepage();
        }

        public function homepage(){
            Session::check_nextpage_admin();
            
            $table = "tbl_category";
            $categorymodel = $this->load->model('categorymodel');
            $data["cat"] = $categorymodel->category($table);

            // $table = 'tbl_cat_post';
            // $postmodel = $this->load->model('postmodel');
            // $data['cat_post'] = $postmodel->all_cat_post($table);

            $productmodel = $this->load->model("productmodel");
            $table_product = 'tbl_product';
            $data["product"] = $productmodel->all_product_home($table_product);
            $data["product_new"] = $productmodel->product_new($table_product);
            $data["product_hot"] = $productmodel->product_hot($table_product);

            $this->load->view("header", $data);
            $this->load->view("slider");
            $this->load->view("home", $data);
            $this->load->view("footer");
           
        }

        public function notfound(){
            session::init();
            $this->load->view("404");
        }

        public function profile(){
            //Session::check_nextpage_admin();
            Session::checkSession_customer();
            
            $table = "tbl_category";
            $categorymodel = $this->load->model('categorymodel');
            $data["cat"] = $categorymodel->all_category($table);

            $customermodel = $this->load->model("customermodel");
            $table_admin = 'tbl_admin';
            $email = Session::get("email");
            $cond = "email='$email'";
            $data["customer"] = $customermodel->check_customer($table_admin,$cond);

            $this->load->view("header", $data);
            $this->load->view("profile", $data);
            $this->load->view("footer");
        }

        public function myorder(){
            //Session::check_nextpage_admin();
            Session::checkSession_customer();
            $admin_id = Session::get('admin_id');
            $table = "tbl_category";
            $categorymodel = $this->load->model('categorymodel');
            $data["cat"] = $categorymodel->all_category($table);

            $table_order = "tbl_order";
            $cond = "admin_id= $admin_id";
            $ordermodel = $this->load->model('ordermodel');
            $data['order'] = $ordermodel->list_order_customer($table_order, $cond);

            $this->load->view("header", $data);
            $this->load->view("myorder", $data);
            $this->load->view("footer");
        }

        public function role_admin(){
            session::init();
            $this->load->view("cpanal/header");
            $this->load->view("cpanal/role_admin");
            $this->load->view("cpanal/footer");
        }

        

        public function lienhe(){
            Session::check_nextpage_admin();
            $table = "tbl_category";
            $categorymodel = $this->load->model('categorymodel');
            $data["cat"] = $categorymodel->all_category($table);

            $table_cat_post = 'tbl_cat_post';
            $postmodel = $this->load->model('postmodel');
            $data['cat_post'] = $postmodel->all_cat_post($table_cat_post);

            $this->load->view("header", $data);
            $this->load->view("contact");
            $this->load->view("footer");
           
        }

        public function search(){
            //Session::check_nextpage_admin();
            //Session::checkSession_customer();
            
            if(isset($_GET['keyword']) && !empty($_GET['keyword'])){
                $search = $_GET['keyword'];
            }

            $num = 6;
            if(isset($_GET['trang'])){
                $page = $_GET['trang'];
            }else{
                $page = "";
            }
            if($page == "" || $page == 1){
                $begin =0;
            }else{
                $begin = ($page  * $num) - $num;
            }

                $cond_count_product = "title_product LIKE '%$search%' ORDER BY id_product DESC";
                
                $table = 'tbl_category';
                $categorymodel = $this->load->model('categorymodel');
                $data['cat'] = $categorymodel->all_category($table);

                $productmodel = $this->load->model("productmodel");
                $table_product = 'tbl_product';

                $data['count_product_search'] = $productmodel->count_product_search($table_product,$cond_count_product);

                if(isset($_GET['price_asc'])){
                    $cond = "title_product LIKE '%$search%' ORDER BY price_product ASC LIMIT $begin,$num";
                    $data['product_search'] = $productmodel->all_product_search($table_product, $cond);
        
                    $this->load->view("header",$data);
                    $this->load->view("search",$data);
                    $this->load->view("footer");
                }else if(isset($_GET['price_desc'])){
                    $cond = "title_product LIKE '%$search%' ORDER BY price_product DESC LIMIT $begin,$num";
                    $data['product_search'] = $productmodel->all_product_search($table_product, $cond);
        
                    $this->load->view("header",$data);
                    $this->load->view("search",$data);
                    $this->load->view("footer");
                }else{
                    $cond = "title_product LIKE '%$search%' ORDER BY id_product DESC LIMIT $begin,$num";
                    $data['product_search'] = $productmodel->all_product_search($table_product,$cond);
        
                    $this->load->view("header",$data);
                    $this->load->view("search",$data);
                    $this->load->view("footer");
        
                }
        }

        public function order_cucsess(){
            Session::check_nextpage_admin();
            session::init();

            $table = "tbl_category";
            $categorymodel = $this->load->model('categorymodel');
            $data["cat"] = $categorymodel->all_category($table);

            $this->load->view("header", $data);
            $this->load->view("order_cucsess");
            $this->load->view("footer");
        }

        public function test(){
            
            
   
            $categorymodel = $this->load->model("categorymodel");
    
            $table = 'tbl_category';
            $data["category"] = $categorymodel->all_category($table);
            $this->load->view("text", $data);
            
            
        }

    }
?>