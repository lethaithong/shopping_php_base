<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
   <div class="row px-xl-5 pt-5">
      <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
         <a href="" class="text-decoration-none">
            <h1 class="mb-4 display-5 font-weight-semi-bold"><span
               class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
         </a>
         <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum
            dolore amet erat.
         </p>
         <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
         <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
         <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
      </div>
      <div class="col-lg-8 col-md-12">
         <div class="row">
            <div class="col-md-4 mb-5">
               <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
               <div class="d-flex flex-column justify-content-start">
                  <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                  <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our
                  Shop</a>
                  <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop
                  Detail</a>
                  <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping
                  Cart</a>
                  <a class="text-dark mb-2" href="checkout.html"><i
                     class="fa fa-angle-right mr-2"></i>Checkout</a>
                  <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact
                  Us</a>
               </div>
            </div>
            <div class="col-md-4 mb-5">
               <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
               <div class="d-flex flex-column justify-content-start">
                  <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                  <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our
                  Shop</a>
                  <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop
                  Detail</a>
                  <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping
                  Cart</a>
                  <a class="text-dark mb-2" href="checkout.html"><i
                     class="fa fa-angle-right mr-2"></i>Checkout</a>
                  <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact
                  Us</a>
               </div>
            </div>
            <div class="col-md-4 mb-5">
               <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
               <form action="">
                  <div class="form-group">
                     <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                        required="required" />
                  </div>
                  <div class="form-group">
                     <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                        required="required" />
                  </div>
                  <div>
                     <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe
                     Now</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row border-top border-light mx-xl-5 py-4">
      <div class="col-md-6 px-xl-0">
         <p class="mb-md-0 text-center text-md-left text-dark">
            &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved.
            Designed
            by
            <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
            Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
         </p>
      </div>
      <div class="col-md-6 px-xl-0 text-center text-md-right">
         <img class="img-fluid" src="<?php echo BASE_URL ?>app/public/images/payments.png" alt="">
      </div>
   </div>
</div>
<!-- Footer End -->
<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- <form action="<?php echo BASE_URL ?>customer/login_user" method="POST">
   <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header border-bottom-0">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
            
               <div class="form-title">
                  <h4>Đăng nhập</h4>
               </div>
               <div class="d-flex flex-column">
                  <div class="form-group">
                     <input type="email" class="form-control" id="email" required type="email" name="email" maxlength="30" placeholder="Nhập Email...">
                  </div>
                  
                  <div class="form-group">
                     <input type="password" class="form-control" id="password-field" required name="password" maxlength="30" placeholder="Nhập mật khẩu...">
                     <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
                  <button class="btn btn-info btn-block btn-round" name="login_user">Đăng nhập</button>
                  <div class="text-center text-muted delimiter">Hoặc đăng nhập với</div>
                  <div class="d-flex justify-content-center social-buttons">
                     <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                     <i class="fab fa-twitter"></i>
                     </button>
                     <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                     <i class="fab fa-facebook"></i>
                     </button>
                     <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                     <i class="fab fa-linkedin"></i>
                     </button>
                     </di>
                  </div>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <div class="signup-section">Bạn chưa có tài khoản? <a href="#a" class="text-info"> Đăng kí</a>.</div>
            </div>
         </div>
      </div>
   </div>
</form> -->


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL ?>app/public/lib/easing/easing.min.js"></script>
<script src="<?php echo BASE_URL ?>app/public/lib/owlcarousel/owl.carousel.min.js"></script>
<!-- Contact Javascript File -->
<script src="<?php echo BASE_URL ?>app/public/mail/jqBootstrapValidation.min.js"></script>
<script src="<?php echo BASE_URL ?>app/public/mail/contact.js"></script>
<!-- Template Javascript -->
<script src="<?php echo BASE_URL ?>app/public/js/main.js"></script>
<script src="<?php echo BASE_URL ?>app/public/js/cus.js"></script>

</body>
</html>

<!-- <form action="<?php echo BASE_URL ?>customer/insert_customer" method="POST">
   <div class="modal fade" id="loginModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header border-bottom-0">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-title text-center">
                  <h4>Đăng kí</h4>
               </div>
               <div class="d-flex flex-column text-center">
                  <div class="form-group">
                     <input type="email" class="form-control" id="email1" required type="email" name="email" placeholder="Nhập Email...">
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control" id="password" required type="password" name="password" placeholder="Nhập mật khẩu...">
                  </div>
                  <div class="form-group">
                     <input type="username" class="form-control" id="username" required type="text" name="username" placeholder="Tên người dùng...">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="phone" required type="text" name="phone" placeholder="Số điẹn thoại...">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="address" required type="text" name="address" placeholder="Địa chỉ...">
                  </div>
                  <button class="btn btn-info btn-block btn-round" name="register_customer">Đăng Kí</button>
                  <div class="text-center text-muted delimiter">Hoặc đăng kí với</div>
                  <div class="d-flex justify-content-center social-buttons">
                     <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                     <i class="fab fa-twitter"></i>
                     </button>
                     <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                     <i class="fab fa-facebook"></i>
                     </button>
                     <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                     <i class="fab fa-linkedin"></i>
                     </button>
                     </di>
                  </div>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <div class="signup-section">Bạn chưa có tài khoản? <a href="#a" class="text-info"> Đăng kí</a>.</div>
            </div>
         </div>
      </div>
   </div>
</form> -->
<!-- <?php 
   if(!empty($_GET['msg'])){
       $msg = unserialize(urldecode($_GET['msg']));
       foreach($msg as $key => $value){
           //echo '<span style="color:blue; font-weight:both">'.$value.'</span>';
           echo "<script type='text/javascript'>alert('$value')</script>";
           //echo '<script type="text/javascript">alert(".$value.")</script>';
       }
   }
   ?> -->

