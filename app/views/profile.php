<!-- Page Header Start -->

<!-- Page Header End -->
<div class="container-fluid">
            <div class=" py-1 mx-5 rounded">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="badge">
                        <a class="text-dark" href="<?php echo BASE_URL ?>/home">Trang Chủ</a>
                        <span class="text-muted px-2">|</span>
                        <span class="text-muted px-2">Thông Tin Tài Khoản</span>
                    </div>
                </div>
                
            </div>
        </div>

<!-- Shop Start -->
<div class="container-fluid mt-5">
   <div class="row px-xl-5">
      <!-- Shop Sidebar Start -->
      <div class="col-lg-3 col-md-12">
         <!-- Price Start -->
         <div class="border-bottom mb-4 pb-4">
         <a href="<?php echo BASE_URL ?>home/profile"><button type="button" class="btn btn-light btn-lg mb-3 rounded active w">Thông tin cá nhân</button></a>
         <a href="<?php echo BASE_URL ?>home/myorder"><button type="button" class="btn btn-light btn-lg mb-3 rounded w">Lịch sử đơn hàng</button></a>
         <a href="<?php echo BASE_URL ?>customer/change_password"><button type="button" class="btn btn-light btn-lg mb-3 rounded w">Đổi mật khẩu</button></a>
         </div>
         <!-- Price End -->
      </div>
      <!-- Shop Sidebar End -->
      <!-- Shop Product Start -->
   
   <div class="col-lg-9 col-md-12">
      <form action="<?php echo BASE_URL ?>customer/update_customer" method="post">
         <div class="row pb-3">
            <div class="col-lg-12">
                <h3 class="text-center mb-5">Thông Tin Tài Khoản</h3>
            </div>
      
<?php 
   if(!empty($_GET['error'])){
      $msg = unserialize(urldecode($_GET['error']));
      foreach($msg as $key => $value){
         //echo '<span style="color:red; font-weight:both">'.$value.'</span>';
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
            
            <?php foreach ($customer as $key => $value) { ?>
            <div class="col-lg-8 my-3">
                <label for="">Tên người dùng:</label>
                <input type="text" class="form-control" value="<?php echo $value['username'] ?>" name="username">
            </div>
            <div class="col-lg-8 mb-3">
                <label for="">Email:</label>
                <input type="email" class="form-control" value="<?php echo $value['email'] ?>" name="email">
            </div>
            <div class="col-lg-8 mb-3">
                <label for="">Địa chỉ:</label>
                <input type="text" class="form-control" value="<?php echo $value['address'] ?>" name="address">
            </div>
            <div class="col-lg-8 mb-3">
                <label for="">Số điện thoại:</label>
                <input type="text" class="form-control" value="<?php echo $value['phone'] ?>" name="phone">
            </div>
            <input type="hidden" value="<?php echo $value['admin_id'] ?>" name="admin_id">
            <div class="col-lg-8 my-2">
               <button type="submit" class="btn btn-info btn-SM rounded">LƯU THÔNG TIN</button>
            </div>
            <?php } ?>
         </div>
      </form>
   </div>
      
   
      <!-- Shop Product End -->
   </div>
</div>
<!-- Shop End -->