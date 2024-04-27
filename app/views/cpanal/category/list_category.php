
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         
      <a href="<?php echo BASE_URL ?>category/add_category" type="button" class="btn btn-info mb-3"><i class="fas fa-plus mr-2"></i>Thêm danh mục</a>
      
         <h3 class="text-center">Danh mục sản phẩm</h3>
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
         <div class="table-responsive pt-3" >
            <table class="table table-bordered baby" id="myTable">
               <thead>
                  <tr>
                     <th>STT</th>
                     <th>Tên danh Mục</th>
                     
                     <th>Danh mục gốc</th>
                     <th>Ngày tạo</th>
                     <th>Ngày cập nhật</th>
                     
                     <th>Trạng thái</th>
                     <th>Quản lý</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $i=0;
                     foreach ($category as $key => $value) {
                         $i++;
                     ?>
                  <tr>
                     <td>
                        <?php echo $i; ?>
                     </td>
                     <td>
                        <?php echo $value['title_category'] ?>
                     </td>
                  
                        <?php if($value['cat_parent'] == 1) {?>
                           <td>Đơn cấp</td>
                        <?php }else if($value['cat_parent'] == 2){ ?>
                           <td>Đa cấp</td>
                        <?php }else{ foreach ($category as $key => $values) {
                           if($values['id_category'] == $value['cat_parent']){
                           ?>
                        <td><?php echo $values['title_category'] ?></td>
                        <?php }}} ?>
                     <td>
                        <?php
                           $create_at = $value['create_at'];
                           $create_at = date( "H:i:s d/m/Y", strtotime($create_at));
                           echo $create_at;
                         ?>
                     </td>
                     <td>
                        <?php
                         $update_at = $value['update_at'];
                         $update_at = date( "H:i:s d/m/Y", strtotime($update_at));
                         echo $update_at;
                         ?>
                     </td>
<!--          
                     <?php if($value['status'] == 1 ){?>
                        <td >
                           <button class="btn"  id="button"  ><h4 class="fas fa-toggle-on text-info"value="<?php echo $value['id_category'] ?>"></button>
                           <input type="hidden" value="<?php echo $value['id_category'] ?>" >
                           <a href="" id="status"><h4 class="fas fa-toggle-on text-info"><input type="hidden" value="<?php echo $value['id_category'] ?>"><input type="hidden" value="<?php echo $value['status'] ?>"></h4></a>
                        </td>
                     <?php  }else if($value['status'] == 2 ){ ?>
                        <button class="btn" id="button" ><h4 class="fas fa-toggle-off text-danger"></button>
                        <td ><a href="<?php echo BASE_URL ?>category/active_category/<?php echo $value['id_category'] ?>" id="status"><h4 class="fas fa-toggle-off text-danger"></h4></a></td>
                     <?php } ?>
                   -->
                     <?php if($value['status'] == 1 ){?>
                        <td ><a href="<?php echo BASE_URL ?>category/active_category/<?php echo $value['id_category'] ?>" id="status"><h4 class="fas fa-toggle-on text-info"></h4></a></td>
                     <?php  }else if($value['status'] == 2 ){ ?>
                        <td ><a href="<?php echo BASE_URL ?>category/active_category/<?php echo $value['id_category'] ?>" id="status"><h4 class="fas fa-toggle-off text-danger"></h4></a></td>
                     <?php } ?>
                  
                     
                        <td>
                        <a href="<?php echo BASE_URL ?>category/delete_category/<?php echo $value['id_category'] ?>" onclick="return confirm('Bạn có muốn xoá?')"><h4 class="fas fa-trash mr-3 text-danger"></h4></a>
                        <a href="<?php echo BASE_URL ?>category/edit_category/<?php echo $value['id_category'] ?>"><h4 class="fas fa-edit"></h4></a>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>