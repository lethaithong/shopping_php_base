
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>category" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
         <h3 class="text-center">Thêm danh mục sản phẩm!</h3>
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
         <form action="<?php echo BASE_URL ?>/category/insert_category" method="POST" class="forms-sample">
            <div class="form-group">
               <label for="tendanhmuc">Tên danh mục:</label>
               <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="title_category" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="mota">Mô tả:</label>
               <textarea required class="form-control" name="desc_category" id="editor" cols="" rows="8"
                  placeholder="Nhập mô tả" style="resize: none;"></textarea>
            </div>
            <div class="form-group">
               <label for="category">Lựa chọn danh mục:</label>
               <select class="form-control" name="cat_parent" >

                  <option value="1" class="font-weight-bold">Danh mục gốc - Đơn cấp</option>
                  <option value="2" class="text-info">Danh mục gốc - Đa cấp</option>
                  <?php foreach($category as $key => $value){ 
                           if($value['cat_parent'] == 2){ ?>
                              <option class="text-info" value="<?php echo $value['id_category'] ?>">-<?php echo $value['title_category'] ?></option>
                              
                      <?php }else if($value['cat_parent'] == 1){ ?>
                        <option class="font-weight-bold" value="<?php echo $value['id_category'] ?>">-<?php echo $value['title_category'] ?></option>
                     <?php } } ?>
                  
               </select>
            </div>
            
            <button type="submit" class="btn btn-primary mr-2">Thêm</button>
         </form>
      </div>
   </div>
</div>