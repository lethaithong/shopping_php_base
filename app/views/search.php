
<div class="container-fluid">
            <div class=" py-1 mx-5 rounded">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="badge">
                        <a class="text-dark" href="<?php echo BASE_URL ?>/home">Trang Chủ</a>
                        <span class="text-muted px-2">|</span>
                        <span class="text-muted px-2">Tìm Kiếm</span>
                    </div>
                </div>
                
            </div>
        </div>
<!-- Page Header Start -->
<div class="container-fluid pt-5">
   <div class="text-center mb-4">
      <h4 class="section-title px-5"><span class="px-2">Có <?php echo count($count_product_search) ?> sản phẩm phù hợp với từ khóa "<?php echo $_GET['keyword'] ?>"</span></h4>
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
            <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
            <form>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" checked id="price-all">
                  <label class="custom-control-label" for="price-all">All Price</label>
                  <span class="badge border font-weight-normal">1000</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="price-1">
                  <label class="custom-control-label" for="price-1">$0 - $100</label>
                  <span class="badge border font-weight-normal">150</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="price-2">
                  <label class="custom-control-label" for="price-2">$100 - $200</label>
                  <span class="badge border font-weight-normal">295</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="price-3">
                  <label class="custom-control-label" for="price-3">$200 - $300</label>
                  <span class="badge border font-weight-normal">246</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="price-4">
                  <label class="custom-control-label" for="price-4">$300 - $400</label>
                  <span class="badge border font-weight-normal">145</span>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                  <input type="checkbox" class="custom-control-input" id="price-5">
                  <label class="custom-control-label" for="price-5">$400 - $500</label>
                  <span class="badge border font-weight-normal">168</span>
               </div>
            </form>
         </div>
         <!-- Price End -->
         <!-- Color Start -->
         <div class="border-bottom mb-4 pb-4">
            <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
            <form>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" checked id="color-all">
                  <label class="custom-control-label" for="price-all">All Color</label>
                  <span class="badge border font-weight-normal">1000</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="color-1">
                  <label class="custom-control-label" for="color-1">Black</label>
                  <span class="badge border font-weight-normal">150</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="color-2">
                  <label class="custom-control-label" for="color-2">White</label>
                  <span class="badge border font-weight-normal">295</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="color-3">
                  <label class="custom-control-label" for="color-3">Red</label>
                  <span class="badge border font-weight-normal">246</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="color-4">
                  <label class="custom-control-label" for="color-4">Blue</label>
                  <span class="badge border font-weight-normal">145</span>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                  <input type="checkbox" class="custom-control-input" id="color-5">
                  <label class="custom-control-label" for="color-5">Green</label>
                  <span class="badge border font-weight-normal">168</span>
               </div>
            </form>
         </div>
         <!-- Color End -->
         <!-- Size Start -->
         <div class="mb-5">
            <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
            <form>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" checked id="size-all">
                  <label class="custom-control-label" for="size-all">All Size</label>
                  <span class="badge border font-weight-normal">1000</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="size-1">
                  <label class="custom-control-label" for="size-1">XS</label>
                  <span class="badge border font-weight-normal">150</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="size-2">
                  <label class="custom-control-label" for="size-2">S</label>
                  <span class="badge border font-weight-normal">295</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="size-3">
                  <label class="custom-control-label" for="size-3">M</label>
                  <span class="badge border font-weight-normal">246</span>
               </div>
               <div
                  class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                  <input type="checkbox" class="custom-control-input" id="size-4">
                  <label class="custom-control-label" for="size-4">L</label>
                  <span class="badge border font-weight-normal">145</span>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                  <input type="checkbox" class="custom-control-input" id="size-5">
                  <label class="custom-control-label" for="size-5">XL</label>
                  <span class="badge border font-weight-normal">168</span>
               </div>
            </form>
         </div>
         <!-- Size End -->
      </div>
      <!-- Shop Sidebar End -->
      <!-- Shop Product Start -->
      <div class="col-lg-9 col-md-12">
         <div class="row pb-3">
            <div class="col-12 pb-1">
               <div class="d-flex align-items-center justify-content-between mb-4 float-right">
                  <!-- <form action="">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by name">
                        <div class="input-group-append">
                           <span class="input-group-text bg-transparent text-primary">
                           <i class="fa fa-search"></i>
                           </span>
                        </div>
                     </div>
                  </form> -->
                  <div class="dropdown ml-4">
                     <button class="btn border dropdown-toggle " type="button" id="triggerId"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Lọc sản phẩm
                     </button>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                        <a class="dropdown-item <?php if(isset($_GET['price_asc'])) {echo 'active';} ?>" href="<?php echo BASE_URL ?>home/search?price_asc&keyword=<?php echo $_GET['keyword'] ?>">Giá tăng dần</a>
                        <a class="dropdown-item <?php if(isset($_GET['price_desc'])) {echo 'active';} ?>" href="<?php echo BASE_URL ?>home/search?price_desc&keyword=<?php echo $_GET['keyword'] ?>">Giá giảm dần</a>
                        <a class="dropdown-item" href="#">Đang giảm giá</a>
                     </div>
                  </div>
               </div>
            </div>
            <?php foreach ($product_search as $key => $value) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
               <div class="card product-item border-0 mb-4">
                  <form action="<?php echo BASE_URL ?>giohang/themgiohang" method="post">
                     <input type="hidden" value="<?php echo $value['id_product'] ?>" name="id_product">
                     <input type="hidden" value="<?php echo $value['title_product'] ?>" name="title_product">
                     <input type="hidden" value="<?php echo $value['price_product'] ?>" name="price_product">
                     <input type="hidden" value="<?php echo $value['image_product'] ?>" name="image_product">
                     <input type="hidden" value="1" name="quantity_product">
                     <input type="hidden" value="<?php echo $value['desc_product'] ?>" name="desc_product">
                     <div
                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="image_product w-100"
                           src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>"
                           alt="">
                     </div>
                     <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $value['title_product'] ?></h6>
                        <div class="d-flex justify-content-center">
                           <h6><?php echo number_format($value['price_product']) ?> VNĐ</h6>
                           <!-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> -->
                        </div>
                     </div>
                     <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="<?php echo BASE_URL ?>sanpham/product_detail/<?php echo $value['id_product'] ?>"
                           class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi
                        tiết</a>
                        <button  class="btn btn-sm text-dark p-0" name="btn_addcart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</button>
                     </div>
                  </form>
               </div>
            </div>
            <?php } ?>
            <div class="col-12 pb-1">
               <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-center mb-3">

                     <?php
                        $page = "";
                        $next_page = "";
                        $prev_page = "";
                        $total = ceil(count($count_product_search)/6);
                        if(!isset($_GET['trang']) || $_GET['trang'] == ""){
                           $page = 1;
                        }else{
                           $page = $_GET['trang'];
                        }
                        if($page <= $total) 
                           $next_page = ($page + 1);
                           $prev_page = ($page - 1);
                     ?>

                     <?php if($page <= $total && $page != 1) { ?>
                        <li class="page-item">
                           <a class="page-link" href="<?php echo BASE_URL ?>home/search<?php if(isset($_GET['price_asc'])) {echo '?price_asc&';} else if(isset($_GET['price_desc'])) {echo '?price_desc&';} else{echo '?';}?>trang=<?php echo $prev_page ?>&keyword=<?php echo $_GET['keyword'] ?>" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                           <span class="sr-only">Previous</span>
                           </a>
                        </li>
                     <?php } ?>

                     <?php
                      for($i = 1 ; $i<=$total; $i++  ) { ?>
                     <li class="page-item <?php if(($page == $i)) {echo 'active';} ?>"><a class="page-link" href="<?php echo BASE_URL ?>home/search<?php if(isset($_GET['price_asc'])) {echo '?price_asc&';} else if(isset($_GET['price_desc'])) {echo '?price_desc&';} else{echo '?';}?>trang=<?php echo $i ?>&keyword=<?php echo $_GET['keyword'] ?>"><?php echo $i ?></a></li>
                     <?php } ?>

                     <?php if($page < $total) { ?>
                        <li class="page-item">
                           <a class="page-link"  href="<?php echo BASE_URL ?>home/search<?php if(isset($_GET['price_asc'])) {echo '?price_asc&';} else if(isset($_GET['price_desc'])) {echo '?price_desc&';} else{echo '?';}?>trang=<?php echo $next_page ?>&keyword=<?php echo $_GET['keyword'] ?>">
                           <span aria-hidden="true">&raquo;</span>
                           <span class="sr-only">Next</span>
                           </a>
                        </li>
                     <?php } ?>
                     
                  </ul>
               </nav>
            </div>
         </div>
      </div>
      <!-- Shop Product End -->
   </div>
</div>
<!-- Shop End -->