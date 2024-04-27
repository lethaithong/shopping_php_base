<!-- Page Header Start -->
<div class="container-fluid ">
   <div class="text-center ">
      <h2 class="section-title px-5"><span class="px-2">Chi tiết bài viết</span></h2>
   </div>
</div>
<!-- Page Header End -->
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
   <?php foreach ($post as $key => $value) { ?>
   <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3  border border-left-0 border-top-0 border-bottom-0  p-2"><img class="image_product w-100"
         src="<?php echo BASE_URL ?>app/public/upload/post/<?php echo $value['image_post'] ?>" alt=""></div>
      <div class="col-sm-7">
         <h4><?php echo substr($value['title_post'],0,20) ?></h4>
         <p><?php echo $value['content_post'] ?></p>
      </div>
      <div class="col-sm-1"></div>
   </div>
   <?php } ?>
</div>
<!-- Shop Detail End -->
<!-- Products Start -->
<div class="container-fluid py-5">
   <div class="text-center mb-4">
      <h2 class="section-title px-5"><span class="px-2">Bài viết liên quan</span></h2>
   </div>
   <?php foreach ($related as $key => $value) { ?>
   <div class="row">
      <div class="col-sm-1"></div>
      <div class=" col-sm-3 p-2"><img class="image_product w-100"
         src="<?php echo BASE_URL ?>app/public/upload/post/<?php echo $value['image_post'] ?>" alt=""></div>
      <div class="col-sm-7">
         <h4><?php echo $value['title_post'] ?></h4>
         <p><?php echo substr($value['content_post'],0,500)."...." ?></p>
         <div class="d-flex align-items-end float-right" style="height: auto">
            <div class="p-2"><a href="<?php echo BASE_URL ?>post/post_detail/<?php echo $value['id_post'] ?>"><i>Xem thêm</i></a></div>
         </div>
      </div>
      <div class="col-sm-1"></div>
   </div>
   <?php } ?>
</div>
</div>
<!-- Products End -->