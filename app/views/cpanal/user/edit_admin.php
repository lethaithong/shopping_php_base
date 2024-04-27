
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>user/list_admin" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
      <h3 class="text-center">Chỉnh sửa thông tin nhân viên!</h3>
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
         <?php
            foreach ($userbyid as $key => $value) {
            ?>
         <form action="<?php echo BASE_URL ?>user/update_admin/<?php echo $value['admin_id'] ?>" method="POST" class="forms-sample">
            <div class="form-group">
               <label for="Tennhanvien">Tên nhân viên:</label>
               <input type="text" class="form-control" placeholder="Nhập tên nhân viên" name="username" 
                  value="<?php echo $value['username'] ?>" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="mail">Email:</label>
               <input type="email" class="form-control" placeholder="Email" name="email" 
                  value="<?php echo $value['email'] ?>" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="Diachi">Địa chỉ:</label>
               <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" 
                  value="<?php echo $value['address'] ?>" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="SDT">SĐT:</label>
               <input type="text" class="form-control" placeholder="Nhập sdt" name="phone" 
                  value="<?php echo $value['phone'] ?>" required pattern="[0-9]{10}" title="nhập đúng định dạng 10 số điện thoại">
            </div>

            <div class="form-group">
               <label for="status">Trạng thái:</label>
                  <select class="form-control" name="status">
                      
                     <?php 
                        if($value['status'] == 1){ ?>
                           <option selected value="1">Mở</option>
                           <option value="2">Đóng</option>
                        <?php }else{ ?>
                           <option selected value="2">Đóng</option>
                           <option value="1">Mở</option>
                           <?php }
                      ?>
                     
                     
                  </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
         </form>
         <?php } ?>
      </div>
   </div>
</div>