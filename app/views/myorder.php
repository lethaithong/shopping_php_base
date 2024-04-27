<!-- Page Header Start -->

<div class="container-fluid">
            <div class=" py-1 mx-5 rounded">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="badge">
                        <a class="text-dark" href="<?php echo BASE_URL ?>/home">Trang Chủ</a>
                        <span class="text-muted px-2">|</span>
                        <span class="text-muted px-2">Lịch Sử Đơn Hàng</span>
                    </div>
                </div>
                
            </div>
        </div>
<!-- Page Header End -->
<!-- Shop Start -->
<div class="container-fluid pt-5">
   <div class="row px-xl-5">
      <!-- Shop Sidebar Start -->
      <div class="col-lg-3 col-md-12">
         <!-- Price Start -->
         <div class="border-bottom mb-4 pb-4">
         <a href="<?php echo BASE_URL ?>home/profile"><button type="button" class="btn btn-light btn-lg mb-3 rounded w">Thông tin cá nhân</button></a>
         <a href="<?php echo BASE_URL ?>home/myorder"><button type="button" class="btn btn-light btn-lg mb-3 rounded w active">Lịch sử đơn hàng</button></a>
         <a href="<?php echo BASE_URL ?>customer/change_password"><button type="button" class="btn btn-light btn-lg mb-3 rounded w">Đổi mật khẩu</button></a> 
        </div>
         <!-- Price End -->
      </div>
      <!-- Shop Sidebar End -->
      <!-- Shop Product Start -->

      <div class="col-lg-9 col-md-12">
         <div class="row pb-3">
            
            <div class="container">
                 <?php if($order){ ?>       
                <table class="table table-bordered table-hover text-center">
                    
      <?php 
        if(!empty($_GET['error'])){
            $msg = unserialize(urldecode($_GET['error']));
            foreach($msg as $key => $value){
                echo '<div class="alert alert-danger col-lg-12 text-center rounded alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>'.$value.'</strong>
                    </div>';
            }
        }else if(!empty($_GET['cucsess'])){
            $msg = unserialize(urldecode($_GET['cucsess']));
            foreach($msg as $key => $value){
                //echo '<span style="color:red; font-weight:both">'.$value.'</span>';
                echo '<div class="alert alert-success col-lg-12 text-center rounded alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>'.$value.'</strong>
                    </div>';
            }
        }
        ?>

                    <thead>
                        <tr>
                            <th>Ngày Đặt Đơn</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Tổng Tiền</th>
                            <th>Chi Tiết</th>
                            <th>Trạng Thái</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <?php
                     foreach ($order as $key => $value) {
                     ?>
                    <tbody>
                        <tr>
                            <td><?php echo $value['date_order'] ?></td>
                            <td><?php echo $value['code_order'] ?></td>
                            <td><?php echo number_format($value['total_order'] )?> VNĐ</td>
                            <td>
                                <a href="<?php echo BASE_URL ?>customer/order_detail/<?php echo $value['code_order'] ?>"><input type="button" class="btn btn-info btn-sm rounded" value="Chi Tiết" name="ct"></a>
                            </td>
                                <?php if($value['status_order'] == 0){ ?>
                                    <td> Chờ Xác Nhận! </td>
                                <?php }else if($value['status_order'] == 1){ ?> 
                                    <td> Đã Xác Nhận! </td>
                                <?php }else{ ?>
                                    <td> Đã hủy! </td>
                                <?php } ?>
                                <form action="<?php echo BASE_URL ?>customer/cancel_order/<?php echo $value['code_order'] ?>" method="post">
                                    <td><input type="submit" class="btn btn-danger btn-sm rounded"  <?php if($value['status_order'] == 2 || $value['status_order'] == 1) {echo 'disabled';} ?> value="Hủy đơn" name="cancel_order"></td>
                                </form>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <?php }else{ ?>
                    <div class="col-lg-12">
                    <img src="<?php echo BASE_URL ?>app\public\images\cart-empty.png" alt="" class="mx-auto d-block a" width="260" height="155">
                    <div class="text-center mb-4">
                        <h4 class="section-title "><span class="px-2">Hiện bạn chưa có đơn hàng nào!</span></h4><br>
                        <a href="<?php echo BASE_URL ?>sanpham"><button type="button" class="btn btn-outline-dark mt-2 rounded my-auto">Mua sắm ngay</button></a>
                    </div>
                </div>
                <?php } ?>
                </div>

            </div>
        
         </div>
      </div>
      <!-- Shop Product End -->
   </div>
</div>
<!-- Shop End -->