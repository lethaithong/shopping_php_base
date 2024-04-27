
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>category" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
         <h3 class="text-center">Chỉnh sửa danh mục sản phẩm!</h3>
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
            foreach ($categorybyid as $key => $value) {
            ?>
         <form action="<?php echo BASE_URL ?>category/update_category/<?php echo $value['id_category'] ?>" method="POST" class="forms-sample">
            <div class="form-group">
               <label for="tendanhmuc">Tên danh mục:</label>
               <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="title_category" name="title_category" 
                  value="<?php echo $value['title_category'] ?>" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="mota">Mô tả:</label>
               <textarea class="form-control" name="desc_category" id="editor" cols="" rows="8"
                  placeholder="Nhập mô tả" style="resize: none;"><?php echo $value['desc_category'] ?></textarea>
            </div>
            <div class="form-group">
               <label for="category">Lựa chọn danh mục gốc:</label>
               <select class="form-control" name="cat_parent" >
                     
                        <?php foreach($category as $key => $cat){
                           if($cat['cat_parent'] == 1 || $cat['cat_parent'] == 2){?>
                        
                           <option <?php if($cat['id_category'] == $value['id_category']) {echo 'selected';} ?> value="<?php echo $cat['id_category'] ?>">-<?php echo $cat['title_category'] ?></option>

                           <?php foreach ($category as $key => $cat1) { 
                                 if($cat['id_category'] == $cat1['cat_parent']){ ?>

                                    <option <?php if($cat1['id_category'] == $value['id_category']) {echo 'selected';} ?> value="<?php echo $cat1['id_category'] ?>">&nbsp; &nbsp;+<?php echo $cat1['title_category'] ?></option>

                              <?php }
                                 } 
                              }
                           } ?>
               </select>
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