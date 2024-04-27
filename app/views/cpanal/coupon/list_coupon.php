
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>coupon/add_coupon" type="button" class="btn btn-info mb-3"><i class="fas fa-plus mr-2"></i>Thêm Mã Giảm Giá</a>
         <h3 class="text-center">Danh mục mã giảm giá</h3>
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
         <div class="table-responsive pt-3" >
            <table class="table table-bordered baby" id="myTable">
               <thead>
                  <tr>
                     <th>Tên Mã</th>
                     <th>Mã Giảm</th>
                     <th>Số Lượng</th>
                     <th>Điều Kiện</th>
                     <th>Số Giảm</th>
                     <th>Quản Lý</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     foreach ($coupon as $key => $value) {
                     ?>
                  <tr>
                     <td><?php echo $value['coupon_name'] ?></td>
                     <td><?php echo $value['coupon_code'] ?></td>
                     <td><?php echo $value['coupon_quantity'] ?></td>
                     <td><?php if($value['coupon_condition'] == 1){echo "Giảm Theo % Giá";}else{echo "Giảm Theo Số Tiền";} ?></td>
                     <td><?php echo number_format($value['coupon_number'] )?><?php if($value['coupon_condition'] == 1){echo "%";}else{echo " VND";} ?></td>
                     <td>
                        <a href="<?php echo BASE_URL ?>coupon/delete_coupon/<?php echo $value['coupon_id'] ?>" onclick="return confirm('Bạn có muốn xoá?')"><h4 class="fas fa-trash mr-3 text-danger"></h4></a>
                        <a href="<?php echo BASE_URL ?>coupon/edit_coupon/<?php echo $value['coupon_id'] ?>"><h4 class="fas fa-edit"></h4></a>
                     </td>
                        
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>