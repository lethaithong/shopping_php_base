
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>post/list_cat_post" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
      <h3 class="text-center">Chỉnh sửa danh mục bài viết!</h3>
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
            foreach ($cat_postbyid as $key => $value) {
            ?>
         <form action="<?php echo BASE_URL ?>/post/update_cat_post/<?php echo $value['id_cat_post'] ?>" method="POST">
            <div class="form-group">
               <label for="tendanhmuc">Tên bài viết:</label>
               <input type="text" class="form-control" placeholder="Nhập tên bài viết" id="title_cat_post"
                  name="title_cat_post" value="<?php echo $value['title_cat_post'] ?>" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="mota">Mô tả:</label>
               <textarea class="form-control" name="desc_cat_post" id="editor" cols="" rows="5"
                  placeholder="Nhập mô tả" style="resize: none;"> <?php echo $value['desc_cat_post'] ?> </textarea>
            </div>
            <!-- <div class="form-group form-check">
               <label class="form-check-label">
                 <input class="form-check-input" type="checkbox"> Remember me
               </label>
               </div> -->
            <button type="submit" class="btn btn-primary">Cập nhật</button>
         </form>
         <?php } ?>
      </div>
   </div>
</div>