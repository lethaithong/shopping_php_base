<?php
    class sanpham extends DController{
        public function __construct(){
            Session::check_nextpage_admin();
            $data = array();
            parent::__construct();
            
        }

        public function index(){
            $this->all_product();
        }

        public function all_product(){

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

            $cond = "LIMIT $begin,$num";
            
            $table = 'tbl_category';
            $categorymodel = $this->load->model('categorymodel');
            $data['cat'] = $categorymodel->all_category($table);

            $productmodel = $this->load->model("productmodel");
            $table_product = 'tbl_product';

            $data['count_product'] = $productmodel->count_product($table_product);
            $data["product"] = $productmodel->all_product($table_product,$cond);
            
            
            $this->load->view("header",$data);
            $this->load->view("product",$data);
            $this->load->view("footer");
           
        }

        

        public function product_detail($id){

            $table_category = 'tbl_category';
            $categorymodel = $this->load->model('categorymodel');
            $data['cat'] = $categorymodel->all_category($table_category);

            $table_cat_post = 'tbl_cat_post';
            $postmodel = $this->load->model('postmodel');
            $data['cat_post'] = $postmodel->all_cat_post($table_cat_post);
            
            $cond = "tbl_category.id_category=tbl_product.id_cat_product AND tbl_product.id_product='$id'";
            $table_product = "tbl_product";
            $productmodel = $this->load->model('productmodel');
            $data["product"] = $productmodel->productbyid($table_category, $table_product, $cond);

            foreach ($data["product"] as $key => $value) {
                $id_cat = $value['id_category'];
            }

            $cond_related ="tbl_category.id_category=tbl_product.id_cat_product AND tbl_category.id_category='$id_cat' 
            AND tbl_product.id_product NOT IN('$id')";
            $data["related"] = $productmodel->related_product($table_category ,$table_product, $cond_related);

            $this->load->view("header",$data);
            $this->load->view("productbyid", $data);
            $this->load->view("footer");
           
        }


        public function productbycat($id){

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

            $table_category = 'tbl_category';
            $categorymodel = $this->load->model('categorymodel');
            $data['cat'] = $categorymodel->all_category($table_category);

            
            $cond_count = "tbl_category.id_category=tbl_product.id_cat_product AND tbl_category.id_category='$id'";
            $table_product = 'tbl_product';
            $productmodel = $this->load->model('productmodel');
            
            $data['count_productbycat'] = $productmodel->count_productbycat($table_category, $table_product, $cond_count);
           
            if(isset($_GET['price_asc'])){
                $cond = "tbl_category.id_category=tbl_product.id_cat_product AND tbl_category.id_category='$id' ORDER BY price_product ASC LIMIT $begin,$num";
                $data['productbycat'] = $productmodel->productbycat($table_category, $table_product, $cond);

                $this->load->view("header",$data);
                $this->load->view("productbycat",$data);
                $this->load->view("footer");
            }else if(isset($_GET['price_desc'])){
                $cond = "tbl_category.id_category=tbl_product.id_cat_product AND tbl_category.id_category='$id' ORDER BY price_product DESC LIMIT $begin,$num";
                $data['productbycat'] = $productmodel->productbycat($table_category, $table_product, $cond);

                $this->load->view("header",$data);
                $this->load->view("productbycat",$data);
                $this->load->view("footer");
            }else{
                $cond = "tbl_category.id_category=tbl_product.id_cat_product AND tbl_category.id_category='$id' LIMIT $begin,$num";
                $data['productbycat'] = $productmodel->productbycat($table_category, $table_product, $cond);
 
                $this->load->view("header",$data);
                $this->load->view("productbycat",$data);
                $this->load->view("footer");
    
            }
           
           
        }

        public function filter_product(){

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

                    $table = 'tbl_category';
                    $categorymodel = $this->load->model('categorymodel');
                    $data['cat'] = $categorymodel->all_category($table);

                    $productmodel = $this->load->model("productmodel");
                    $table_product = 'tbl_product';

                    $data['count_product'] = $productmodel->count_product($table_product);

            if(isset($_GET['price_asc'])){

                $cond = "ORDER BY price_product ASC LIMIT $begin,$num";
                
                $data["product"] = $productmodel->filter_product($table_product,$cond);
                
                $this->load->view("header",$data);
                $this->load->view("product",$data);
                $this->load->view("footer");

                }else if(isset($_GET['price_desc'])){
                    
                    $cond = "ORDER BY price_product DESC LIMIT $begin,$num";

                    $data["product"] = $productmodel->filter_product($table_product,$cond);
                    
                    $this->load->view("header",$data);
                    $this->load->view("product",$data);
                    $this->load->view("footer");
                    }
        }
    }

?>