<!-- Page Header Start -->

<div class="container-fluid">
            <div class=" py-1 mx-5 rounded">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="badge">
                        <a class="text-dark" href="<?php echo BASE_URL ?>/home">Trang Chủ</a>
                        <span class="text-muted px-2">|</span>
                        <span class="text-muted px-2">Chi Tiết Đơn Hàng</span>
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
         </div>
         <!-- Price End -->
      </div>
      <!-- Shop Sidebar End -->
      <!-- Shop Product Start -->
      <div class="col-lg-9 col-md-12">
         <div class="row pb-3">
            
            <div class="container">
                
                         
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <?php
                     $total=0;
                     foreach ($order_detail as $key => $value) {
                        $total += $value['price_product'] * $value['quantity'];
                     ?>
                    <tbody>
                        <tr>
                            <td><?php echo $value['title_product'] ?></td>
                            <td><img class="img-product" src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>" alt="hinh anh" ></td>
                            <td><?php echo $value['quantity'] ?></td>
                            <td><?php echo number_format($value['price_product'],0,',','.').' VND' ?></td>
                            <td><?php echo number_format(($value['price_product'] * $value['quantity']),0,',','.').' VND' ?></td>
                        <tr>
                    </tbody>
                    <?php } ?>
                </table>
                <div class="row">
                              <div class="col-sm-9">
                              </div>
                              <div class="col-sm-3 mb-1">
                              <h6>Tạm tính: <?php echo number_format($value['price_product'] * $value['quantity'])?>VNĐ</h6>
                              </div>
                           </div>
                <?php if(!empty($value['coupon_code'])){
                        if($value['coupon_condition']==1){ ?>
                           <div class="row">
                              <div class="col-sm-9">
                              </div>
                              <div class="col-sm-3 mb-1">
                              <h6>Mã giảm giá: <?php echo number_format($value['coupon_number'])?><?php if($value['coupon_condition']==1){echo ' %';}else{echo ' k';} ?></h6>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col-sm-9">
                              </div>
                              <div class="col-sm-3 my-auto">
                              <h6>Tổng giảm: <?php echo number_format($total-$value['total_order']) .' VND'?></h6>
                              </div>
                           </div>  
               <?php }else{ ?>
                           <div class="row">
                              <div class="col-sm-9">
                              </div>
                              <div class="col-sm-3 mb-1">
                              <h6>Mã giảm giá: <?php echo number_format($value['coupon_number'])?><?php if($value['coupon_condition']==1){echo ' %';}else{echo ' k';} ?></h6>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col-sm-9">
                              </div>
                              <div class="col-sm-3 my-auto">
                              <h6>Tổng giảm: <?php echo number_format($value['coupon_number'])?> k</h6>
                              </div>
                           </div> 
                           <?php } } ?> 
               <div class="row">
                  <div class="col-sm-9">
                  </div>
                  <div class="col-sm-3 my-auto">
                  <h6>Thành tiền: <?php echo number_format($value['total_order']) .' VND'?></h6>
                  </div>
               </div>  
                </div>

            </div>
        
         </div>
      </div>
      <!-- Shop Product End -->
   </div>
</div>
<!-- Shop End -->