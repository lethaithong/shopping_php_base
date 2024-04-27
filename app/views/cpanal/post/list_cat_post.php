
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
   <div class="card-body">
   <a href="<?php echo BASE_URL ?>post/add_cat_post" type="button" class="btn btn-info mb-3"><i class="fas fa-plus mr-2"></i>Thêm danh mục</a>
   <h3 class="text-center">Danh mục bài viết</h3>
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
                  <th>Tên bài viết</th>
                  <th>Mô tả</th>
                  <th>Quản lý</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $i=0;
                  foreach ($cat_post as $key => $value) {
                      $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $value['title_cat_post'] ?></td>
                  <td><?php echo $value['desc_cat_post'] ?></td>
                  <td>
                     <a href="<?php echo BASE_URL ?>post/delete_cat_post/<?php echo $value['id_cat_post'] ?>" onclick="return confirm('Bạn có muốn xoá?')"><h4 class="fas fa-trash mr-3"></h4></a>
                     <a href="<?php echo BASE_URL ?>post/edit_cat_post/<?php echo $value['id_cat_post'] ?>"><h4 class="fas fa-edit"></h4></a>
                     
                  </td>
               </tr>
               <?php } ?>
            </tbody>
      </div>
   </div>
</div>
</table>