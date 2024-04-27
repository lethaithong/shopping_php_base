<?php 
   $name ="";
   foreach ($postbycat as $key => $value) {
   $name = $value['title_cat_post'];
   } 
   ?>
<!-- Page Header Start -->
<div class="container-fluid pt-5">
   <div class="text-center mb-4">
      <?php if(!$name){ ?>
      <h2 class="section-title px-5"><span class="px-2">Chưa có bài viết!</span></h2>
      <?php } else { ?>
      <h2 class="section-title px-5"><span class="px-2">Danh mục bài viết: <?php echo $name ?></span></h2>
      <?php } ?>
   </div>
</div>
<!-- Page Header End -->
<?php foreach ($postbycat as $key => $value) { ?>
<div class="row">
   <div class="col-sm-1"></div>
   <?php if(($value['image_post']) == "") {?>
      <div class="col-sm-3  p-2"></div>
                     
                  <?php  }else if(($value['image_post'])){ ?>
                     <div class="col-sm-3 border p-2"><img class="image_product w-100"
      src="<?php echo BASE_URL ?>app/public/upload/post/<?php echo $value['image_post'] ?>" alt=""></div>
                     <?php } ?>
   <div class="col-sm-7" >
      <h4><?php echo substr($value['title_post'],0,160)."..." ?></h4>
      <p><?php echo mb_substr($value['content_post'],0,500,'utf-8')."...." ?></p>
      <div class="d-flex align-items-end float-right" style="height: auto">
         <div class="p-2"><a href="<?php echo BASE_URL ?>post/post_detail/<?php echo $value['id_post'] ?>">Xem thêm</a></div>
      </div>
   </div>
</div>
<div class="col-sm-1"></div>
</div>
<?php } ?>