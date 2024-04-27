<?php
    class order extends DController{
        public function __construct(){
            Session::checkSession_admin();
            
            parent::__construct();
        }

        public function index(){
            $this->order();
        }

        public function order(){

            $table_order = "tbl_order";
            $ordermodel = $this->load->model('ordermodel');
            $data['order'] = $ordermodel->list_order($table_order);

            $this->load->view("cpanal/header");
            $this->load->view("cpanal/order/order", $data);
            $this->load->view("cpanal/footer");
        }

        
        public function order_detail($code_order){

                    $table_order = "tbl_order";
                    $table_order_detail = "tbl_order_detail";
                    $table_product = "tbl_product";
                    $ordermodel = $this->load->model('ordermodel');
                    
                    $cond = "$table_order.code_order = $code_order AND $table_product.id_product = $table_order_detail.id_product AND $table_order_detail.code_order = '$code_order'";
                    $cond_info = "$table_order_detail.code_order = '$code_order'";
                    $data['order_detail'] = $ordermodel->list_order_detail($table_order_detail,$table_order,$table_product,$cond);
                    $data['order_info'] = $ordermodel->order_info($table_order_detail,$cond_info);

                    $this->load->view("cpanal/header");
                    $this->load->view("cpanal/order/order_detail", $data);
                    $this->load->view("cpanal/footer");

        }


        public function order_confirm($code_order){

            if(isset($_POST['cancel_order'])){
                $table_order = "tbl_order";
                $ordermodel = $this->load->model('ordermodel');
                $cond = "$table_order.code_order = '$code_order'";
                $data = array(
                    'status_order' => 2
                );
                $result = $ordermodel->order_confirm($table_order,$data,$cond);

                if( $result == 1 ) {
                    $message['msg'] = "Xử lý đơn hàng thành công";
                    header('Location:'.BASE_URL.'order?msg='.urlencode(serialize($message))); 
                }else{
                    $message['msg'] = "Xử lý đơn hàng thất bại";
                    header('Location:'.BASE_URL.'order?msg='.urlencode(serialize($message))); 
                }
            }else if(isset($_POST['agree_order'])){
                
                $table_order = "tbl_order";
                $ordermodel = $this->load->model('ordermodel');
                $cond = "$table_order.code_order = '$code_order'";
                $data = array(
                    'status_order' => 1
                );
                $result = $ordermodel->order_confirm($table_order,$data,$cond);

                if( $result == 1 ) {
                    $message['msg'] = "Xử lý đơn hàng thành công";
                    header('Location:'.BASE_URL.'order/order_detail/'.$code_order.'?msg='.urlencode(serialize($message))); 
            }else{
                    $message['msg'] = "Xử lý đơn hàng thất bại";
                    header('Location:'.BASE_URL.'order/order_detail/'.$code_order.'?msg='.urlencode(serialize($message))); 
                }
            }
        }
    }
    
?>