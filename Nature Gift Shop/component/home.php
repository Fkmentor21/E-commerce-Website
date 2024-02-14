<?php
include 'connection.php';
session_start();

if (isset($_POST['logout'])) {
   session_destroy();
   header("Location: login.php");
   exit(); // Make sure to exit after the header to prevent further code execution
}
?>

<style type="text/css">
   <?php
   include 'style.css';
   ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <title>Nature Gift Shop - home page</title>
</head>

<body>
   <?php include 'header.php'; ?>
   <div class="main">
      <section class="home-section">
         <div class="slider">
            <div class="slider_slider slide1">
               <div class="overlay"></div>
               <div class="slide-detail">
                  <h1>Welcome To My Shop</h1>
                  <h2>"Don't judge each day by the harvest you".<h2><br>
                        <a href="view-products.php" class="btn">shop now</a>

               </div>
               <div ckass="hero-dec-top"></div>
               <div ckass="hero-dec-bottom"></div>
            </div>
            <!-- slide end  -->
            <div class="slider_slider slide2">
               <div class="overlay"></div>
               <div class="slide-detail">
                  <h1>Welcome To My Shop</h1>
                  <h2>"Don't judge each day by the harvest you".<h2><br>
                        <a href="view-products.php" class="btn">shop now</a>

               </div>
               <div ckass="hero-dec-top"></div>
               <div ckass="hero-dec-bottom"></div>
            </div>
            <!-- slide end  -->
            <div class="slider_slider slide3">
               <div class="overlay"></div>
               <div class="slide-detail">
                  <h1>Welcome To My Shop</h1>
                  <h2>"Don't judge each day by the harvest you".<h2><br>
                        <a href="view-products.php" class="btn">shop now</a>

               </div>
               <div ckass="hero-dec-top"></div>
               <div ckass="hero-dec-bottom"></div>
            </div>
            <!-- slide end  -->
            <div class="slider_slider slide4">
               <div class="overlay"></div>
               <div class="slide-detail">
                  <h1>Welcome To My Shop</h1>
                  <h2>"Don't judge each day by the harvest you".<h2><br>
                        <a href="view-products.php" class="btn">shop now</a>

               </div>
               <div ckass="hero-dec-top"></div>
               <div ckass="hero-dec-bottom"></div>
            </div>
            <!-- slide end  -->
            <div class="slider_slider slide5">
               <div class="overlay"></div>
               <div class="slide-detail">
                  <h1>Welcome To My Shop</h1>
                  <h2>"Don't judge each day by the harvest you".<h2><br>
                        <a href="view-products.php" class="btn">shop now</a>

               </div>
               <div ckass="hero-dec-top"></div>
               <div ckass="hero-dec-bottom"></div>
            </div>
            <!-- slide end  -->
            <div class="left-arrow"><i class=" bx bxs-left-arrow"></i></div>
            <div class="right-arrow"><i class=" bx bxs-right-arrow"></i></div>

         </div>

         <!-- home slider end -->
      </section>
      <!-- thumbnail -->
      <section class="thumb">
         <div class="box-container">
            <div class="box">
               <img src="../images/plan.png">
               <h3>Parent Plant</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, atque.</p>
               <i class="bx bx-chevron-right"></i>
            </div>
            <div class="box">
               <img src="../images/pots.png">
               <h3>Pot</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, atque.</p>
               <i class="bx bx-chevron-right"></i>
            </div>
            <div class="box">
               <img src="../images/gardening.png">
               <h3>Seeds</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, atque.</p>
               <i class="bx bx-chevron-right"></i>
            </div>
      </section>
      <!---------------- DISCOUNT OFFER ----------- -->
      <section class="container">
         <div class="box-container">
            <div class="box">
               <img src="slide 4.jpeg">
            </div>

            <div class="box">
               <span>Plant Seed</span>
               <h1>save up to 50% off</h1>
               <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
            </div>
         </div>
      </section>

      <!---------------- TRENDING PRODUCTS ----------- -->

      <div class="box-contain">
         <section class="shop">
            <div class="title">
               <img src="../images/leaf logo.png">
               <h1>TRENDING PRODUCTS</h1>
            </div>
            <br>
            <div class="row">
               &nbsp;&nbsp;<img src="../images/Trending.webp">
               <div class="row-details">

               </div>
            </div>
            <div class="box-container">
               <div class="box">
                  <img src="../images/pro 1.jpg">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 2.png">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 3.avif">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 4.jpg">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 5.webp">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="pro 4.jpg">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 1.jpg">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 2.png">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 3.avif">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 4.jpg">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 5.webp">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
               <div class="box">
                  <img src="../images/pro 1.jpg">
                  <a href="view_products.php" class="btn">Shop Now</a>
               </div>
            </div>
         </section>
      </div>

      <!-- SERVICES  -->
      <div class="box-contain">
         <section class="services">
            <div class="box-container">
               <div class="box">
                  <img src="../images/saving.png" alt="Great Savings">
                  <div class="detail">
                     <h3>Great Savings</h3>
                     <p>Save big every order</p>
                  </div>
               </div>
               <div class="box">
                  <img src="../images/7 s.png" alt="24/7 Support">
                  <div class="detail">
                     <h3>24/7 Support</h3>
                     <p>One-on-one support</p>
                  </div>
               </div>
               <div class="box">
                  <img src="../images/gift-card.png" alt="Gift Vouchers">
                  <div class="detail">
                     <h3>Gift Vouchers</h3>
                     <p>Vouchers on every festival</p>
                  </div>
               </div>
               <div class="box">
                  <img src="../images/trip.png" alt="Worldwide Delivery">
                  <div class="detail">
                     <h3>Worldwide Delivery</h3>
                     <p>Dropship worldwide</p>
                  </div>
               </div>
            </div>
         </section>
      </div>



      <br>
      <br>


      <?php include 'footer.php'; ?>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <script src="script.js"></script>
   <?php include 'alert.php'; ?>
</body>

</html>