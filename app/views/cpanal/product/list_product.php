
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>product/add_product" type="button" class="btn btn-info mb-3"><i class="fas fa-plus mr-2"></i>Thêm sản phẩm</a>
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
                     <th>Tên sản phẩm</th>
                     <th>Danh mục</th>
                     <th>Hình ảnh</th>
                     <th>Giá</th>
                     <th>Số lượng</th>
                     <th>Hot</th>
                     <th>Quản lý</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $i=0;
                     foreach ($product as $key => $value) {
                         $i++;
                     ?>
                  <tr>
                     <td><?php echo $i; ?></td>
                     <td><?php echo $value['title_product'] ?></td>
                     <td><?php echo $value['title_category'] ?></td>
                     <?php if(($value['image_product']) == "") {?>
                     <td>Trống</td>
                     <?php  }else if(($value['image_product'])){ ?>
                     <td><img class="img-product" src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $value['image_product'] ?>" alt="hinh anh" ></td>
                     <?php } ?>
                     
                     <td><?php echo number_format($value['price_product'],0,',','.').' VND' ?></td>
                     <td><?php echo $value['quantity_product'] ?></td>
                     <?php if($value['product_hot'] == 2){ ?>
                     <td> Yes </td>
                     <?php }else{ ?> 
                     <td> No </td>
                     <?php } ?>
                     <td>
                        <a href="<?php echo BASE_URL ?>product/delete_product/<?php echo $value['id_product'] ?>" onclick="return confirm('Bạn có muốn xoá?')"><h4 class="fas fa-trash mr-3 text-danger"></h4></a>
                        <a href="<?php echo BASE_URL ?>product/edit_product/<?php echo $value['id_product'] ?>"><h4 class="fas fa-edit"></h4></a>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>