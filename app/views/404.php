<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>app/public/template_be/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>app/public/template_be/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>app/public/template_be/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>app/public/template_be/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo BASE_URL ?>app/public/template_be/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>Uhmmm....!</h2>
                <h3 class="font-weight-light">Trang mà bạn tìm kiếm có vẻ không tồn tại.</h3>
              </div>
            </div>
            
            <?php
              if(isset($_SESSION['login_admin'])){
            ?>

              <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="<?php echo BASE_URL ?>login/dashboard" >Quay về trang chủ</a>
              </div>
            </div>
            <?php }else{?>

              <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="<?php echo BASE_URL ?>home" >Quay về trang chủ</a>
              </div>
            </div>
            <?php } ?>

            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white font-weight-medium text-center">Copyright &copy; 2021  All rights reserved.</p>
              </div>
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
  <script src="<?php echo BASE_URL ?>app/public/template_be/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo BASE_URL ?>app/public/template_be/js/off-canvas.js"></script>
  <script src="<?php echo BASE_URL ?>app/public/template_be/js/hoverable-collapse.js"></script>
  <script src="<?php echo BASE_URL ?>app/public/template_be/js/template.js"></script>
  <script src="<?php echo BASE_URL ?>app/public/template_be/js/settings.js"></script>
  <script src="<?php echo BASE_URL ?>app/public/template_be/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
