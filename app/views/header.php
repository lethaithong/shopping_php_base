<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>EShopper - Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta content="Free HTML Templates" name="keywords" />
        <meta content="Free HTML Templates" name="description" />
        <!-- Favicon -->
        <link href="<?php echo BASE_URL ?>app/images/favicon.ico" rel="icon" />
        <!-- Google Web Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong" />
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
        <!-- Libraries Stylesheet -->
        <link href="<?php echo BASE_URL ?>app/public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?php echo BASE_URL ?>app/public/css/stylecus.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL ?>app/public/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Topbar Start -->
        <div class="container-fluid">
            <div class="row bg-secondary py-2 px-xl-5">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark" href="">FAQs</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-dark" href="">Help</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-dark" href="">Support</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-dark pl-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center py-3 px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="<?php echo BASE_URL ?>home" class="text-decoration-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                </div>
                <div class="col-lg-6 col-6 text-left">
                    <form action="<?php echo BASE_URL ?>home/search" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyword" required />
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <button type="submit" class="btn btn-sm"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-6 text-right">
                    <?php if(Session::get('login_cus') == true){ ?>

                    <a href="<?php echo BASE_URL ?>login/logout_customer" class="btn btn-info btn-round">
                        Đăng xuất
                    </a>

                    <?php }else{ ?>
                    <div class="divmodel">
                        <a href="<?php echo BASE_URL ?>login" type="button" class="btn btn-info btn-round">
                            Đăng nhập
                        </a>
                    </div>
                    <div class="divmodel">
                        <a href="<?php echo BASE_URL ?>login/register" type="button" class="btn btn-info btn-round">
                            Đăng kí
                        </a>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Topbar End -->
        <!-- Navbar Start -->
        <div class="container-fluid mb-3">
            <div class="row border-top px-xl-5">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <!-- <a href="<?php echo BASE_URL ?>home" class="nav-item nav-link active">TRANG CHỦ</a> -->
                                <?php foreach ($cat as $key => $value) { ?>

                                <div class="nav-item dropdown">
                                    <?php if($value['cat_parent'] == 2 && $value['status'] == 1){ ?>
                                        <a href="<?php echo BASE_URL ?>sanpham/productbycat/<?php echo $value['id_category'] ?>" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $value['title_category'] ?></a>
                                    <?php } ?>
                                    
                                    <div class="dropdown-menu rounded-0 m-0">
                                    <?php foreach ($cat as $key => $values){
                                            if($value['id_category'] == $values['cat_parent'] && $values['status'] == 1){ ?>
                                                <!-- <a href=""> <?php echo $values['id_category'] ?>-<?php echo $values['title_category'] ?></a> -->
                                                <a href="<?php echo BASE_URL ?>sanpham/productbycat/<?php echo $values['id_category'] ?>" class="dropdown-item"><?php echo $values['title_category'] ?></a>
                                    <?php } } ?>
                                    </div>
                                    <?php if($value['cat_parent'] == 1 && $value['status'] == 1){ ?>
                                        <a href="<?php echo BASE_URL ?>sanpham/productbycat/<?php echo $value['id_category'] ?>" class="nav-link dropdown-toggle" ><?php echo $value['title_category'] ?></a>
                                    <?php } ?>
                                </div>

                                <?php } ?>
                            </div>

                            <?php if(Session::get('login_cus')){ ?>

                            <div class="navbar-nav ml-auto py-0">
                                <a href="<?php echo BASE_URL ?>home/profile" class="btn border">
                                    <i class="far fa-user-circle fs-2"></i>
                                </a>
                                &nbsp;
                                <a href="#" class="btn border">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="badge">0</span>
                                </a>
                            </div>

                            <?php }?>

                            &nbsp;
                                <a href="<?php echo BASE_URL ?>giohang" class="btn border">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <span class="badge">
                                        <?php
                                        
                                         if(Session::get('shopping_cart')){
                                             $i = 0;
                                             foreach(Session::get('shopping_cart') as $value){
                                                if($value['id_product'])
                                                $i++;
                                             }
                                                echo $i; 
                                             }else{
                                                echo 0;
                                             }?>

                                    </span>
                                </a>
                            

                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
    </body>
</html>
