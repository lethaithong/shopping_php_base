
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>post/list_post" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
      <h3 class="text-center">Chỉnh sửa bài viết!</h3>
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
            foreach ($postbyid as $key => $pro) {
        ?>

<form action="<?php echo BASE_URL ?>/post/update_post/<?php echo $pro['id_post'] ?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="tensanpham">Tên bài viết:</label>
    <input type="text" class="form-control" placeholder="Nhập tên bài viết" id="title_post" name="title_post"
    value="<?php echo $pro['title_post'] ?>" required maxlength="40">
  </div>
  <div class="form-group">
    <label for="tendanhmuc">Hình ảnh:</label>
    <input type="file" class="form-control" id="image_post" name="image_post">
    <?php if(($pro['image_post']) == "") {?>
                     <td>Chưa có hình ảnh</td>
                     
                  <?php  }else if(($pro['image_post'])){ ?>
                     <td><img src="<?php echo BASE_URL ?>app/public/upload/post/<?php echo $pro['image_post'] ?>" alt="hinh anh" height="150" width="200"></td>
                     <?php } ?>
    
  </div>
  <div class="form-group">
    <label for="mota">Chi tiết bài viết:</label>
    <textarea class="form-control" name="content_post" id="editor" cols="" rows="5"
                placeholder="Nhập mô tả" style="resize: none;" 
                 ><?php echo $pro['content_post'] ?></textarea>
  </div>

  <div class="form-group">
    <label for="tendanhmuc">Danh mục:</label>
    <select class="form-control" name="cat_post">
    <?php foreach($cat_post as $key => $value){ ?>
        
    <option <?php if($pro['id_cat_post'] == $value['id_cat_post']) {echo 'selected';} ?> value="<?php echo $value['id_cat_post'] ?>"><?php echo $value['title_cat_post'] ?></option>
    <?php } ?>
    </select>
  </div>

  <!-- <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div> -->
  <button type="submit" class="btn btn-primary">Cập nhật</button>
    <?php } ?>
</div>
</form>
</div>
</div>
</div>