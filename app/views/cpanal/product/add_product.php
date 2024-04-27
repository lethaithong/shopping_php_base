
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
      <a href="<?php echo BASE_URL ?>product" type="button" class="btn btn-info mb-3"><i class="fas fa-chevron-left mr-2"></i>Trở về</a>
         <h3 class="text-center">Thêm sản phẩm!</h3>
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
         <form action="<?php echo BASE_URL ?>product/insert_product" method="POST" enctype="multipart/form-data" class="forms-sample">
            <div class="form-group">
               <label for="tensanpham">Tên sản phẩm:</label>
               <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="title_product" name="title_product" required maxlength="40">
            </div>
            <div class="form-group">
               <label for="tendanhmuc">Hình ảnh:</label>
               <input type="file" class="form-control" id="image_product" name="image_product">
            </div>
            <div class="form-group">
               <label for="Gia">Giá:</label>
               <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" id="price_product" name="price_product" required pattern="[0-9]{1,6}" title="Giá tiền phải phải đúng định dạng và không quá 9 kí tự">
            </div>
            <div class="form-group">
               <label for="soluong">Số Lượng:</label>
               <input type="text" class="form-control" placeholder="Nhập số lượng sản phẩm" id="quantity_product" name="quantity_product"required pattern="[0-9]{1,6}" title="số lượng phải đúng định dạng và không quá 9 kí tự">
            </div>
            <div class="form-group">
               <label for="mota">Mô tả:</label>
               <textarea class="form-control" name="desc_product" id="editor" cols="" rows="8"
                  placeholder="Nhập mô tả" style="resize: none;"></textarea>
            </div>
            <div class="form-group">
               <label for="tensanpham">Lựa chọn danh mục:</label>
               <select class="form-control" name="category_product" >
               
               <?php foreach($category as $key => $value){ 
                           if($value['cat_parent'] == 2){ ?>
                              <option value="<?php echo $value['id_category'] ?>">-<?php echo $value['title_category'] ?></option>
                              <?php foreach ($category as $key => $values) { 
                                 if($values['cat_parent'] !==1 && $value['id_category'] == $values['cat_parent']){ ?>
                                    <option value="<?php echo $values['id_category'] ?>">&nbsp; &nbsp;+<?php echo $values['title_category'] ?></option>

                              <?php }
                           }
                        }else if($value['cat_parent'] == 1){ ?>
                           <option value="<?php echo $value['id_category'] ?>"><?php echo $value['title_category'] ?></option>
                     <?php  } } ?>

               </select>
            </div>
            
            <div class="form-group">
               <label for="tensanpham">Sản phẩm Nổi bậc :</label>
               <select class="form-control" name="product_hot" >
                  <option value="1"> Không </option>
                  <option value="2"> Có </option>
               </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
         </form>
      </div>
   </div>
</div>