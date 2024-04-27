
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         
      <h3 class="text-center">Danh Sách Khách Hàng</h3>
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
            <table class="table table-bordered baby">
               <thead>
                  <tr>
                     <th>STT</th>
                     <th>Tên khách hàng</th>
                     <th>Email</th>
                     <th>Địa chỉ</th>
                     <th>SĐT</th>
                     <th>Trạng thái</th>
                  </tr>
               </thead>
               <tbody>

                  <?php
                     $i=0;
                     foreach ($user as $key => $value) {
                         $i++;
                     ?>
                  <tr>
                     <td>
                        <?php echo $i; ?>
                     </td>
                     <td>
                        <?php echo $value['username'] ?>
                     </td>
                     <td>
                        <?php echo $value['email'] ?>
                     </td>
                     <td>
                        <?php echo $value['address'] ?>
                     </td>
                     <td>
                        <?php echo $value['phone'] ?>
                     </td>
                  
                     <td>
                        <?php if($value['status'] == 1 ){?>
                           <a href="<?php echo BASE_URL ?>user/active_customer/<?php echo $value['admin_id'] ?>"><h4 class="fas fa-toggle-on text-info"></h4></a>
                        <?php  }else if($value['status'] == 2 ){ ?>
                           <a href="<?php echo BASE_URL ?>user/active_customer/<?php echo $value['admin_id'] ?>"><h4 class="fas fa-toggle-off text-danger"></h4></a>
                     <?php } ?>
                  </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>