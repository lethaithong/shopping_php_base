<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Skydash Admin</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="<?php echo BASE_URL ?>/app/public/template_be/vendors/feather/feather.css">
      <link rel="stylesheet" href="<?php echo BASE_URL ?>/app/public/template_be/vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet" href="<?php echo BASE_URL ?>/app/public/template_be/vendors/css/vendor.bundle.base.css">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="<?php echo BASE_URL ?>/app/public/template_be/css/vertical-layout-light/style.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <!-- endinject -->
      <link rel="shortcut icon" href="<?php echo BASE_URL ?>/app/public/template_be/images/favicon.png" />
      <style>
         .field-icon {
    float: right;
    margin-left: -25px;
    margin-top: -35px;
    position: relative;
    z-index: 2;
    margin-right: 13px;
}
      </style>
   </head>
   <body>
   
      <div class="container-scroller">
         <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
               <div class="row w-100 mx-0">
                  <div class="col-lg-4 mx-auto">
                     <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                           <a href="<?php echo BASE_URL ?>home"><img src="<?php echo BASE_URL ?>/app/public/template_be/images/logo.svg" alt="logo">
                           </a></div>
                           <div class="text-center mt-4 font-weight-light">
                              bạn đã có tài khoản? <a href="<?php echo BASE_URL ?>login" class="text-primary">đăng nhập</a>
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
                        <form autocomplete="on" action="<?php echo BASE_URL ?>login/register_user"
                           method="POST" class="pt-3">
                           <div class="form-group">
                              <input class="form-control form-control-lg" 
                                 placeholder="Email..." required type="email" name="email" maxlength="30">
                           </div>
                           <div class="form-group">
                              <input class="form-control form-control-lg" 
                                 placeholder="Tên người dùng..." required type="text" name="username" maxlength="30">
                           </div>
                           
                           <div class="form-group">
                              <input class="form-control form-control-lg" 
                                 placeholder="Địa chỉ..." required type="text" name="address" maxlength="100">
                                 
                           </div>
                           <div class="form-group">
                              <input class="form-control form-control-lg" 
                                 placeholder="Số điện thoại..." type="text"  name="phone" 
                                 pattern="[0-9]{10}" title="Nội dung nhập vào phải là số và đủ 10 kí tự!" required>
                                 
                           </div>
                           <div class="form-group">
                              <input class="form-control form-control-lg" id="password-field"
                                 placeholder="Mật khẩu..." required type="password" name="password" maxlength="30">
                                 <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                           </div>
                           <div class="mt-3">
                              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                 type="submit">ĐĂNG KÍ</button>
                           </div>
                           <div class="my-2 d-flex justify-content-between align-items-center">
                              <div class="form-check">
                                 <label class="form-check-label text-muted">
                                 <input type="checkbox" class="form-check-input">
                                 Lưu đăng nhập
                                 </label>
                              </div>
                              <a href="<?php echo BASE_URL ?>login/forget_password" class="auth-link text-black">Quên mật khẩu?</a>
                           </div>
                           <div class="mb-2">
                              <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                              <i class="ti-facebook mr-2"></i>Đăng nhập bằng facebook
                              </button>
                           </div>
                           
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- content-wrapper ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="<?php echo BASE_URL ?>/app/public/template_be/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="<?php echo BASE_URL ?>/app/public/template_be/js/off-canvas.js"></script>
      <script src="<?php echo BASE_URL ?>/app/public/template_be/js/hoverable-collapse.js"></script>
      <script src="<?php echo BASE_URL ?>/app/public/template_be/js/template.js"></script>
      <script src="<?php echo BASE_URL ?>/app/public/template_be/js/settings.js"></script>
      <script src="<?php echo BASE_URL ?>/app/public/template_be/js/todolist.js"></script>
      <script src="<?php echo BASE_URL ?>/app/public/js/cus.js"></script>
      
      <!-- endinject -->
   </body>
</html>