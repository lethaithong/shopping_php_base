
<?php if(!isset($_SESSION['shopping_cart']) || empty($_SESSION['shopping_cart'])){ ?>
<img src="<?php echo BASE_URL ?>eshopper-1.0.0/img/img-cart-empty " alt="" class="mx-auto d-block" width="260" height="215">

<!-- Page Header Start -->
<div class="container-fluid pt-5">
   <div class="text-center mb-4">
      <h4 class="section-title "><span class="px-2">Hiện giỏ hàng của bạn không có sản phẩm nào!</span></h4>
      <p class="font-weight-bold my-auto"><span class="px-2">Về trang cửa hàng để chọn mua sản phẩm bạn nhé!!</span></p>
      <a href="<?php echo BASE_URL ?>sanpham"><button type="button" class="btn btn-outline-dark mt-2 rounded">Mua sắm ngay</button></a>
      
   </div>
</div>
<!-- Page Header End -->
<?php }else{ ?>

<!-- Cart Start -->
<div class="container-fluid pt-5">
   <div class="row px-xl-5">
      <div class="col-lg-12 table-responsive mb-5">
         <table class="table table-bordered text-center mb-0">
            <thead class="bg-secondary text-dark">
               <tr>
                  <th>Hình ảnh</th>
                  <th>Tên</th>
                  <th>Giá</th>
                  <th>Số Lượng</th>
                  <th>Thành tiền</th>
                  <th></th>
               </tr>
            </thead>
            <form action="<?php echo BASE_URL ?>giohang/capnhatgiohang" method="post">
               <?php 
                  $dongia = 0;
                  $tongtien = 0;
                  if(isset($_SESSION["shopping_cart"])){
                      foreach ($_SESSION["shopping_cart"] as $key => $value) {
                          $dongia = $value['price_product'] * $value['quantity_product'];
                          $tongtien += $dongia;
                  ?>
               <tbody class="align-middle">
                  <tr>
                     <td><img class="" style="height:120px; width: 120px;"
                        src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>"
                        alt=""></td>
                     <td class="align-middle"><img src="img/product-1.jpg" alt=""
                        style="width: 50px;"><?php echo $value['title_product'] ?></td>
                     <td class="align-middle"><?php echo number_format($value['price_product']) ?> VNĐ</td>
                     <td class="align-middle">
                        <div class="input-group mx-auto" style="width: 80%;">
                           <input type="number" min="1"
                              class="form-control form-control-sm bg-secondary text-center"
                              value="<?php echo $value['quantity_product'] ?>"
                              name="quantity[<?php echo $value['id_product'] ?>]">
                           <div class="input-group-btn">
                              <button class="btn btn-sm btn-primary" type="submit"
                                 value="<?php echo $value['id_product'] ?>" name="update_cart">
                              Cập nhật
                              </button>
                           </div>
                        </div>
                     </td>
                     <td class="align-middle"><?php echo number_format($dongia) ?>VNĐ</td>
                     <td class="align-middle">
                        <button type="submit" value="<?php echo $value['id_product'] ?>"
                           class="btn btn-sm btn-primary" name="delete_cart">
                        <i class="fa fa-times"></i></button>
                     </td>
                  </tr>
               </tbody>
               <?php
                  }
                  }   
                  ?>
            </form>
         </table>
      </div>
   </div>
   <form action="<?php echo BASE_URL ?>giohang/dathang" method="POST" autocomplete="off">
      <div class="row px-xl-5">
         <div class="col-lg-8 table-responsive mb-5">
            <h4>THÔNG TIN GIAO HÀNG</h4>

            <?php if(!isset($_SESSION['login_cus'])){ ?>
            <div class="col-md-12">
               <p>Bạn đã có tài khoảng?<a href="<?php echo BASE_URL ?>login">Đăng kí</a> </p>
            </div>
            <?php } ?>

            <div class="col-md-12 form-group">
               <?php 
                  if(!empty($_GET['message'])){
                        $message = unserialize(urldecode($_GET['message']));
                           foreach($message as $key => $value){
                              echo '<span style="color:red; font-weight:both">'.$value.'</span>';
                     }
                  }
               ?>
            </div>

            <?php if(isset($_SESSION['login_cus'])){ ?>
            <div class="col-md-12 form-group">
               <input class="form-control" type="text" name="name" placeholder="Họ và tên" required value="<?php echo SESSION::get('username') ?>">
            </div>
            <div class="col-md-12 form-group">
               <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" required value="<?php echo SESSION::get('phone') ?>" pattern="[0-9]{10}" title="nhập đúng định dạng 10 số điện thoại">
            </div>
            <div class="col-md-12 form-group">
               <input class="form-control" type="text" name="address" placeholder="Dịa chỉ" required value="<?php echo SESSION::get('address') ?>">
            </div>
            <div class="col-md-12 form-group">
               <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo SESSION::get('email') ?>">
            </div>
            <div class="col-md-12 form-group">
               <textarea class="form-control" name="note" id="" cols="30" rows="5" placeholder="Ghi chú đơn hàng"></textarea>
            </div>
            <?php }else{ ?>

            <div class="col-md-12 form-group">
               <input class="form-control" type="text" name="name" placeholder="Họ và tên" required>
            </div>
            <div class="col-md-12 form-group">
               <input class="form-control" type="text" name="phone" required placeholder="Số điện thoại" pattern="[0-9]{10}" title="nhập đúng định dạng 10 số điện thoại" required>
            </div>
            <div class="col-md-12 form-group">
               <input class="form-control" type="text" name="address" placeholder="Dịa chỉ" required>
            </div>
            <div class="col-md-12 form-group">
               <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="col-md-12 form-group">
               <textarea class="form-control" name="note" id="" cols="30" rows="5" placeholder="Ghi chú đơn hàng"></textarea>
            </div>
            <?php }?>

         </div>
         <div class="col-lg-4 table-responsive mb-5">
            
            <div class="card border-secondary mb-5">
               <div class="card-header bg-secondary border-0">
                  <h4 class="font-weight-semi-bold m-0 text-center">Thông Tin Hóa Đơn</h4>
               </div>
               <div class="card-body">
                  <div class="d-flex justify-content-between mb-3 pt-1">
                     <h6 class="font-weight-medium">Tạm tính:</h6>
                     <h6 class="font-weight-medium"><?php echo number_format($tongtien) ?> VNĐ</h6>
                  </div>

                  <?php if(Session::get('coupon') == true){
                     if(Session::get('coupon_condition') == 1){ ?>
                     <div class="d-flex justify-content-between mb-3 pt-1">
                     <h6 class="font-weight-medium my-auto">Mã Giảm: <?php echo Session::get('coupon_number') ?>% <button type="submit" class="btn btn-outline-light fas fa-trash-alt btn-trash text-danger" name="btn_delete_coupon"></button></h6>
                     <h6 class="font-weight-medium py-2 my-auto"><?php echo number_format(($tongtien*Session::get('coupon_number'))/100) ?> VNĐ</h6>
                  </div>
                  <?php }else if(Session::get('coupon_condition') == 2){ 
                     $coupon_number = substr(Session::get('coupon_number'),0,3)
                      ?> 
                     <div class="d-flex justify-content-between mb-3 pt-1">
                     <h6 class="font-weight-medium my-auto">Mã Giảm: <?php echo number_format($coupon_number) ?>k <button type="submit" class="btn btn-outline-light fas fa-trash-alt btn-trash text-danger" name="btn_delete_coupon"></button></h6>
                     <h6 class="font-weight-medium py-2 my-auto"><?php echo number_format(Session::get('coupon_number') )?> VNĐ</h6>
                     </div>
                     <?php } } ?>
                  

                  <div class="d-flex justify-content-between mb-3">
                     <h6 class="font-weight-medium">Phí vận chuyển:</h6>
                     <h6 class="font-weight-medium">---</h6>
                  </div>

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

                  <?php if(Session::get('login_cus')){ ?>
                     <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Nhập mã..." name="coupon_code">
                           <div class="input-group-append">
                              <button class="btn btn-primary" name="btn_coupon">Sử dụng</button>
                           </div>
                        </div>
                     <?php } ?>

               </div>
               <div class="card-footer border-secondary bg-transparent">
                  <div class="d-flex justify-content-between mt-2">
                     <h5 class="font-weight-bold">Tổng Cộng</h5>
                     <?php if(Session::get('coupon') == true){
                              if(Session::get('coupon_condition') == 1){ ?>
                              <input type="hidden" name="total_order" value="<?php echo $tongtien-($tongtien*Session::get('coupon_number'))/100 ?>">
                              <h5 class="font-weight-bold" ><?php echo number_format($tongtien-($tongtien*Session::get('coupon_number'))/100) ?> VNĐ</h5>
                              <?php }else if(Session::get('coupon_condition') == 2){ ?> 
                                 <input type="hidden" name="total_order" value="<?php echo $tongtien-Session::get('coupon_number') ?>">
                                 <h5 class="font-weight-bold"><?php echo number_format($tongtien-Session::get('coupon_number')) ?> VNĐ</h5>             
                     <?php } } else{ ?>
                              <input type="hidden" name="total_order" value="<?php echo $tongtien ?>">
                              <h5 class="font-weight-bold" ><?php echo number_format($tongtien) ?> VNĐ</h5>
                              <?php } ?>
                              </div>
                  <button class="btn btn-block btn-primary my-3 py-3" name="btn_thanhtoan">Thanh toán</button>
               </div>
            </div>
         </div>
         
      </div>
   </form>
</div>
<!-- Cart End -->

<?php } ?>