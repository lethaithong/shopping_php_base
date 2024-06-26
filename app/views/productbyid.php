   
   <div class="container-fluid">
            <div class=" py-1 mx-5 rounded">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="badge">
                        <a class="text-dark" href="<?php echo BASE_URL ?>/home">Trang Chủ</a>
                        <span class="text-muted px-2">|</span>
                        <span class="text-muted px-2">Chi Tiết Sản Phẩm</span>
                    </div>
                </div>
                
            </div>
        </div>
   <!-- Page Header Start -->
   <!-- <div class="container-fluid">
      <div class="text-center">
         <h2 class="section-title px-5"><span class="px-2">Chi tiết sản phẩm</span></h2>
      </div>
   </div> -->
   <!-- Page Header End -->
   <!-- Shop Detail Start -->
   <div class="container-fluid py-5">
      <?php foreach ($product as $key => $value) { ?>
      <form action="<?php echo BASE_URL ?>giohang/themgiohang" method="POST">
         <input type="hidden" value="<?php echo $value['id_product'] ?>" name="id_product" />
         <input type="hidden" value="<?php echo $value['title_product'] ?>" name="title_product" />
         <input type="hidden" value="<?php echo $value['price_product'] ?>" name="price_product" />
         <input type="hidden" value="<?php echo $value['image_product'] ?>" name="image_product" />
         <input type="hidden" value="1" name="quantity_product" />
         <input type="hidden" value="<?php echo $value['desc_product'] ?>" name="desc_product" />
         <div class="row px-xl-5">
               <div class="col-lg-5 pb-5">
                  <div>
                     <img class="image_product_id" src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>" alt="Image" />
                  </div>
                  <!-- <div id="image_product_id product-carousel" class="carousel slide" data-ride="carousel">
                  <div class="image_product_id carousel-inner border">
                     <div class="image_product_id carousel-item active">
                        <img style="height: 200px; width: 200px;"
                              src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>"
                              alt="Image">
                     </div>
                     <div class="carousel-item">
                        <img class="image_product w-100 h-100"
                              src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>"
                              alt="Image">
                     </div>
                     <div class="carousel-item">
                        <img class="image_product w-100 h-100"
                              src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>"
                              alt="Image">
                     </div>
                     <div class="carousel-item">
                        <img class="image_product w-100 h-100"
                              src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>"
                              alt="Image">
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                     <i class="fa fa-2x fa-angle-left text-dark"></i>
                  </a>
                  <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                     <i class="fa fa-2x fa-angle-right text-dark"></i>
                  </a>
                  </div> -->
               </div>
               <div class="col-lg-7 pb-5">
                  <h3 class="font-weight-semi-bold"><?php echo $value['title_product'] ?></h3>
                  <div class="d-flex mb-3">
                     <div class="text-primary mr-2">
                           <small class="fas fa-star"></small>
                           <small class="fas fa-star"></small>
                           <small class="fas fa-star"></small>
                           <small class="fas fa-star-half-alt"></small>
                           <small class="far fa-star"></small>
                     </div>
                     <small class="pt-1">(50 Reviews)</small>
                  </div>
                  <h3 class="font-weight-semi-bold mb-4">
                     <?php echo number_format($value['price_product']) ?>
                     VNĐ
                  </h3>
                  <!-- <p class="mb-4">
                     Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit
                     diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.
                  </p> -->
                  <!-- <div class="d-flex mb-3">
                     <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                     <form>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="size-1" name="size" />
                              <label class="custom-control-label" for="size-1">XS</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="size-2" name="size" />
                              <label class="custom-control-label" for="size-2">S</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="size-3" name="size" />
                              <label class="custom-control-label" for="size-3">M</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="size-4" name="size" />
                              <label class="custom-control-label" for="size-4">L</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="size-5" name="size" />
                              <label class="custom-control-label" for="size-5">XL</label>
                           </div>
                     </form>
                  </div>
                  <div class="d-flex mb-4">
                     <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                     <form>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="color-1" name="color" />
                              <label class="custom-control-label" for="color-1">Black</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="color-2" name="color" />
                              <label class="custom-control-label" for="color-2">White</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="color-3" name="color" />
                              <label class="custom-control-label" for="color-3">Red</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="color-4" name="color" />
                              <label class="custom-control-label" for="color-4">Blue</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="color-5" name="color" />
                              <label class="custom-control-label" for="color-5">Green</label>
                           </div>
                     </form>
                  </div> -->
                  <div class="d-flex align-items-center mb-4 pt-2">
                     <div class="input-group quantity mr-3" style="width: 130px;">
                           <!-- <div class="input-group-btn">
                              <button class="btn btn-primary btn-minus" name="btn-minus">
                                 <i class="fa fa-minus"></i>
                              </button>
                           </div> -->
                           <input type="number" class="form-control bg-secondary text-center" value="1" min="1" name="quantity_product" />
                           <!-- <div class="input-group-btn">
                              <button class="btn btn-primary btn-plus" name="btn_plus">
                                 <i class="fa fa-plus"></i>
                              </button>
                           </div> -->
                     </div>
                     <button class="btn btn-primary px-3" name="btn_addcart"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ</button>
                  </div>
                  <div class="d-flex pt-2">
                     <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                     <div class="d-inline-flex">
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
                              <i class="fab fa-pinterest"></i>
                           </a>
                     </div>
                  </div>
               </div>
         </div>
      </form>
      <?php } ?>
      <div class="row px-xl-5">
         <div class="col">
               <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                  <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">MÔ TẢ</a>
                  <!-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a> -->
                  <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">ĐÁNH GIÁ (0)</a>
               </div>
               <div class="tab-content">
                  <div class="tab-pane fade show active" id="tab-pane-1">
                     <h4 class="mb-3">Mô Tả Chi Tiết</h4>
                     <p>
                           <?php echo $value['desc_product'] ?>
                     </p>
                  </div>
                  <div class="tab-pane fade" id="tab-pane-3">
                     <div class="row">
                           <div class="col-md-6">
                              <h4 class="mb-4">1 đánh giá về sản phẩm "Colorful Stylish Shirt"</h4>
                              <div class="media mb-4">
                                 <img src="<?php echo BASE_URL ?>app/public/images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;" />
                                 <div class="media-body">
                                       <h6>
                                          John Doe<small> - <i>01 Jan 2045</i></small>
                                       </h6>
                                       <div class="text-primary mb-2">
                                          <i class="fas fa-star"></i>
                                          <i class="fas fa-star"></i>
                                          <i class="fas fa-star"></i>
                                          <i class="fas fa-star-half-alt"></i>
                                          <i class="far fa-star"></i>
                                       </div>
                                       <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h4 class="mb-4">Leave a review</h4>
                              <small>Your email address will not be published. Required fields are marked *</small>
                              <div class="d-flex my-3">
                                 <p class="mb-0 mr-2">Your Rating * :</p>
                                 <div class="text-primary">
                                       <i class="far fa-star"></i>
                                       <i class="far fa-star"></i>
                                       <i class="far fa-star"></i>
                                       <i class="far fa-star"></i>
                                       <i class="far fa-star"></i>
                                 </div>
                              </div>
                              <form>
                                 <div class="form-group">
                                       <label for="message">Your Review *</label>
                                       <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                 </div>
                                 <div class="form-group">
                                       <label for="name">Your Name *</label>
                                       <input type="text" class="form-control" id="name" />
                                 </div>
                                 <div class="form-group">
                                       <label for="email">Your Email *</label>
                                       <input type="email" class="form-control" id="email" />
                                 </div>
                                 <div class="form-group mb-0">
                                       <input type="submit" value="Leave Your Review" class="btn btn-primary px-3" />
                                 </div>
                              </form>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
   </div>
   <!-- Shop Detail End -->
   <!-- Products Start -->
   <div class="container-fluid py-5">
      <div class="text-center mb-4">
         <h2 class="section-title px-5"><span class="px-2">Sản phẩm liên quan</span></h2>
      </div>
      <div class="row px-xl-5 pb-3">
         <?php foreach ($related as $key =>
         $value) { ?>
         <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
               <div class="card product-item border-0 mb-4">
                  <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="post">
                     <input type="hidden" value="<?php echo $value['id_product'] ?>" name="id_product" />
                     <input type="hidden" value="<?php echo $value['title_product'] ?>" name="title_product" />
                     <input type="hidden" value="<?php echo $value['price_product'] ?>" name="price_product" />
                     <input type="hidden" value="<?php echo $value['image_product'] ?>" name="image_product" />
                     <input type="hidden" value="1" name="quantity_product" />
                     <input type="hidden" value="<?php echo $value['desc_product'] ?>" name="desc_product" />
                     <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                           <img class="image_product w-100" src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>" alt="" />
                     </div>
                     <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                           <h6 class="text-truncate mb-3"><?php echo $value['title_product'] ?></h6>
                           <div class="d-flex justify-content-center">
                              <h6>
                                 <?php echo number_format($value['price_product']) ?>
                                 VNĐ
                              </h6>
                              <!-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> -->
                           </div>
                     </div>
                     <div class="card-footer d-flex justify-content-between bg-light border">
                           <a href="<?php echo BASE_URL ?>sanpham/product_detail/<?php echo $value['id_product'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                           <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</button>
                     </div>
                  </form>
               </div>
         </div>
         <?php } ?>
      </div>
   </div>
</div>
   <!-- Products End -->
