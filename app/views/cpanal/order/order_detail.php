
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>order" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
         <h3 class="text-center">Chi tiết đơn hàng!</h3>
         <?php 
   if(isset($_GET['error'])){
      $error = unserialize(urldecode($_GET['error']));
      foreach($error as $key => $value){
        
           echo '<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                    '.$value.'
                 </div>';
      }
  }else if(isset($_GET['cucsess'])){
     $cucsess = unserialize(urldecode($_GET['cucsess']));
      foreach($cucsess as $key => $value){
        
           echo '<div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                    '.$value.'
                 </div>';
      }
  }
   ?>
         <div class="table-responsive pt-3">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Tên sản phẩm</th>
                     <th>Hình ảnh</th>
                     <th>Số lượng</th>
                     <th>Đơn giá</th>
                     <th>Thành tiền</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $total = 0;
                     foreach ($order_detail as $key => $value) {
                        $total += $value['price_product'] * $value['quantity'];
                     ?>
                  <tr>
                     <td><?php echo $value['title_product'] ?></td>
                     <td><img class="img-product" src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>" alt="hinh anh" ></td>
                     <td><?php echo $value['quantity'] ?></td>
                     <td><?php echo number_format($value['price_product'],0,',','.').' VND' ?></td>
                     <td><?php echo number_format($value['price_product'] * $value['quantity']) .' VND' ?></td>
                  </tr>
                  <?php } ?>
                  
               </tbody>
            </table>
            <form action="<?php echo BASE_URL ?>order/order_confirm/<?php echo $value['code_order'] ?>" method="post">
                
               <div class="row cs">
                  <div class="col-sm-9">
                  <?php if($value['status_order'] == 0 ){ ?>
                        <input type="submit" name="agree_order" value="Duyệt đơn hàng" class="btn btn-sm btn-info" <?php if($value['status_order'] == 1) {echo 'disabled';} ?>>
                        <?php }else if($value['status_order'] == 2 ){ ?>
                           <input type="submit" name="" value="Đơn Hàng Bị Hủy!" class="btn btn-danger" disabled>
                           <?php }else{ ?>
                              <input type="submit" name="" value="Đơn Hàng Đã Duyệt!" class="btn btn-info" disabled>
                              <?php } ?>
                  </div>
                  <div class="col-sm-3 my-auto">
                  <h6>Tạm tính: <?php echo number_format($total) .' VND'?></h6>
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
                     
                  
            </form>
         </div>
      </div>
   </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Thông tin người đặt hàng!</h4>
         <div class="table-responsive pt-3">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Tên người đặt</th>
                     <th>Email</th>
                     <th>Số điện thoại</th>
                     <th>Địa chỉ</th>
                     <th>Ghi chú</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     foreach ($order_info as $key => $value) {
                     ?>
                  <tr>
                     
                     <td><?php echo $value['name'] ?></td>
                      
                     <td><?php echo $value['email'] ?></td>
                     <td><?php echo $value['phone'] ?></td>
                     <td><?php echo $value['address'] ?></td>
                     <td><?php echo $value['note'] ?></td>
                  </tr>
                  <?php } ?>
                  
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>