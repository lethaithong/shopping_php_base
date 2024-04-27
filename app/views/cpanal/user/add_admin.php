
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>user/list_admin" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
         <h3 class="text-center">Thêm nhân viên!</h3>
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
         <form action="<?php echo BASE_URL ?>/user/insert_admin" method="POST" class="forms-sample">
         <div class="form-group">
               <label for="Tennhanvien">Tên nhân viên:</label>
               <input type="text" class="form-control" placeholder="Nhập tên nhân viên" name="username" 
                  value="" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="mail">Email:</label>
               <input type="email" class="form-control" placeholder="Email" name="email" 
                  value="" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="Diachi">Địa chỉ:</label>
               <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" 
                  value="" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="SDT">SĐT:</label>
               <input type="text" class="form-control" placeholder="Nhập sdt" name="phone" 
                  value="" required pattern="[0-9]{10}" title="nhập đúng định dạng 10 số điện thoại">
            </div>
            <div class="form-group">
               <label for="password">Mật Khẩu:</label>
               <input type="text" class="form-control" placeholder="Nhập mật khẩu" name="password" 
                  value="" required maxlength="40">
            </div>

            <div class="form-group">
               <label for="tensanpham">Chức vụ :</label>
               <select class="form-control" name="level" >
                  <option value="1"> Nhân viên </option>
                  <option value="2"> Khách hàng </option>
               </select>
            </div>

            <div class="form-group">
               <label for="tensanpham">Trạng thái :</label>
               <select class="form-control" name="status" >
                  <option value="1"> Mở </option>
                  <option value="2"> Đóng </option>
               </select>
            </div>
            
            <button type="submit" class="btn btn-primary mr-2">Thêm</button>
         </form>
      </div>
   </div>
</div>