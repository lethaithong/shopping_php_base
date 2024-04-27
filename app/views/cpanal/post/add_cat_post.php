
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>post/list_cat_post" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
      <h3 class="text-center">Thêm danh mục bài viết!</h3>
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
         <form action="<?php echo BASE_URL ?>post/insert_cat_post" method="POST" class="forms-sample">
            <div class="form-group">
               <label for="tendanhmuc">Tên bài viết:</label>
               <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="title_cat_post" name="title_cat_post" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="mota">Mô tả:</label>
               <textarea class="form-control" name="desc_cat_post" id="editor" cols="" rows="5"
                  placeholder="Nhập mô tả" style="resize: none;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Thêm</button>
         </form>
      </div>
   </div>
</div>