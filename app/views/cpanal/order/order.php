
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h3 class="card-title text-center">Danh sách đơn hàng</h3>
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
            <table class="table table-bordered baby" id="myTable">
               <thead>
                  <tr>
                     <th>Mã đơn hàng</th>
                     <th>Ngày đặt</th>
                     <th>Mã đã dùng</th>
                     <th>Tổng tiền</th>
                     <th>Chi tiết</th>
                     <th>Tình trạng</th>
                     <th>Quản lý</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     foreach ($order as $key => $value) {
                     ?>
                  <tr>
                     <td><?php echo $value['code_order'] ?></td>
                     <td><?php echo $value['date_order'] ?></td>
                     <td><?php echo $value['coupon_code'] ?></td>
                     <td><?php echo number_format($value['total_order']) ?> VND</td>
                     <td><a href="<?php echo BASE_URL ?>order/order_detail/<?php echo $value['code_order'] ?>" class="btn btn-info rounded">xem chi tiết</a></td>
                     <?php if($value['status_order'] == 0){ ?>
                     <td> Đơn hàng mới! </td>
                     <?php }elseif($value['status_order'] == 1){ ?> 
                     <td> Đã xử lý! </td>
                     <?php }else{ ?>
                        <td> Đơn Bị Hủy! </td>
                        <?php } ?>
                        <form action="<?php echo BASE_URL ?>order/order_confirm/<?php echo $value['code_order'] ?>" method="post">
                           <td><input type="submit" class="btn btn-danger rounded " <?php if($value['status_order'] == 2 || $value['status_order'] == 1) {echo 'disabled';} ?> onclick="return confirm('Bạn có muốn hủy?')" value="Hủy đơn" name="cancel_order"></td>
                        </form>
                        <!-- <a href="#" onclick="return confirm('Bạn có muốn xoá?')">Xoá</a> || 
                        <a href="#">Sửa</a> -->
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>