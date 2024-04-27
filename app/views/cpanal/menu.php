<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="<?php echo BASE_URL ?>login/dashboard">Admin</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a class="nav-link" href="<?php echo BASE_URL ?>login/dashboard">Trang chủ <span
               class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
            Danh mục
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="<?php echo BASE_URL ?>category/add_category">Thêm</a>
               <a class="dropdown-item" href="<?php echo BASE_URL ?>category/list_category">Liệt kê</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
            Danh mục bài viết
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="<?php echo BASE_URL ?>post/add_cat_post">Thêm</a>
               <a class="dropdown-item" href="<?php echo BASE_URL ?>post/list_cat_post">Liệt kê</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
            Bài viết
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="<?php echo BASE_URL ?>post/add_post">Thêm</a>
               <a class="dropdown-item" href="<?php echo BASE_URL ?>post/list_post">Liệt kê</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
            Sản Phẩm
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="<?php echo BASE_URL ?>product/add_product">Thêm</a>
               <a class="dropdown-item" href="<?php echo BASE_URL ?>product/list_product">Liệt kê</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
            Đơn hàng
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="<?php echo BASE_URL ?>order/add_order">Thêm</a>
               <a class="dropdown-item" href="<?php echo BASE_URL ?>order">Liệt kê</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>login/logout">Đăng xuất</a>
         </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
   </div>
</nav>