
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>product" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
         <h3 class="text-center">Cập nhật sản phẩm!</h3>
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
            foreach ($productbyid as $key => $pro) {
            ?>
         <form action="<?php echo BASE_URL ?>/product/update_product/<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="tensanpham">Tên sản phẩm:</label>
               <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="title_product" name="title_product"
                  value="<?php echo $pro['title_product'] ?>" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="tendanhmuc">Hình ảnh:</label>
               <input type="file" class="form-control" id="image_product" name="image_product">
               <?php if(($pro['image_product']) == "") {?>
                     
                     <?php  }else if(($pro['image_product'])){ ?>
                     <td><img src="<?php echo BASE_URL ?>app/public/upload/product/<?php echo $pro['image_product'] ?>" alt="hinh anh" height="150" width="200"></td>
                     <?php } ?>
               
            </div>
            <div class="form-group">
               <label for="Gia">Giá:</label>
               <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" id="price_product" name="price_product"
                  value="<?php echo $pro['price_product'] ?>" required pattern="[0-9]{1,9}" title="Giá tiền phải là số">
            </div>
            <div class="form-group">
               <label for="soluong">Số Lượng:</label>
               <input type="text" class="form-control" placeholder="Nhập số lượng sản phẩm" id="quantity_product" name="quantity_product"
                  value="<?php echo $pro['quantity_product'] ?>" required pattern="[0-9]{1,6}" title="Số lượng phải là số">
            </div>
            <div class="form-group">
               <label for="mota">Mô tả:</label>
               <textarea class="form-control" name="desc_product" id="editor" cols="" rows="5"
                  placeholder="Nhập mô tả" style="resize: none;" value="<?php echo $pro['price_product'] ?>" 
                  ><?php echo $pro['desc_product'] ?></textarea>
            </div>
            <div class="form-group">
               <label for="tendanhmuc">Danh mục:</label>
               <select class="form-control" name="category_product">

               <?php foreach($category as $key => $value){ 
                           if($value['cat_parent'] == 2){ ?>
                              <option <?php if($value['id_category'] == $pro['id_cat_product']) {echo 'selected';} ?> value="<?php echo $value['id_category'] ?>">-<?php echo $value['title_category'] ?></option>
                              <?php foreach ($category as $key => $values) { 
                                 if($values['cat_parent'] !==1 && $value['id_category'] == $values['cat_parent']){ ?>
                                    <option <?php if($values['id_category'] == $pro['id_cat_product']) {echo 'selected';} ?> value="<?php echo $values['id_category'] ?>">&nbsp; &nbsp;+<?php echo $values['title_category'] ?></option>

                              <?php }
                           }
                        }else if($value['cat_parent'] == 1){ ?>
                           <option <?php if($value['id_category'] == $pro['id_cat_product']) {echo 'selected';} ?> value="<?php echo $value['id_category'] ?>">-<?php echo $value['title_category'] ?></option>
                     <?php  } } ?>
               </select>
                     
            </div>
            <div class="form-group">
               <label for="tensanpham">Sản phẩm Nổi bậc :</label>
               <select class="form-control" name="product_hot" id="product_hot">
                  <?php if($pro['product_hot'] == 1) { ?>
                  <option selected value="1"> Không </option>
                  <option value="2"> Có </option>
                  <?php }else{ ?>
                  <option selected value="2"> Có </option>
                  <option value="1"> Không </option>
                  <?php } ?>
               </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
         </form>
         <?php } ?>
      </div>
   </div>
</div>