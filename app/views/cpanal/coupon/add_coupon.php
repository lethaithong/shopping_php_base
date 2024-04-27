
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>coupon" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
         <h3 class="text-center">Thêm mã giảm giá</h3>
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
         <form action="<?php echo BASE_URL ?>coupon/insert_coupon" method="POST" enctype="multipart/form-data" class="forms-sample">
            <div class="form-group">
               <label for="tensanpham">Tên mã giảm giá:</label>
               <input type="text" class="form-control" placeholder="Nhập tên mã giảm giá" id="coupon_name" name="coupon_name" required maxlength="100">
            </div>
            <div class="form-group">
               <label for="Gia">Mã giảm:</label>
               <input type="text" class="form-control" placeholder="Nhập mã giảm" id="coupon_code" name="coupon_code" required maxlength="100">
            </div>
            <div class="form-group">
               <label for="Gia">Số lượng:</label>
               <input type="text" class="form-control" placeholder="Nhập số lượng" id="coupon_quantity" name="coupon_quantity" required pattern="[0-9]{1,3}" title="Số lượng phải đúng định dạng và không quá 3 kí tự">
            </div>
            <div class="form-group">
               <label for="dieukien">Điều kiện:</label>
               <select class="form-control" name="coupon_condition" >
                  <option value="1"> Giảm Theo % Giá </option>
                  <option value="2"> Giảm Theo Số Tiền </option>
               </select>
            </div>
            <div class="form-group">
               <label for="Sogiam">Số giảm:</label>
               <input type="text" class="form-control" placeholder="Nhập số Giảm" id="coupon_number" name="coupon_number" required pattern="[0-9]{1,9}" title="Số lượng giảm phải đúng định dạng và không quá 9 kí tự">
            </div>
            
            <button type="submit" class="btn btn-primary">Thêm</button>
         </form>
      </div>
   </div>
</div>