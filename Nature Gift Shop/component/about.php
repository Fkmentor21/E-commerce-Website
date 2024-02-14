<?php
include 'connection.php';
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit(); // Make sure to exit after the header to prevent further code execution
}
?>
<style>
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
    <title>Nature Gift Shop - about us page</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="banner">

            <h1>about us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / contact / about</span>
        </div>
        <!-- <div class="title2">
<div class="box-contain">
<div class="about-category">
    <div class="box">
        <img src="bamboo.jpg">
        <div class="detail">
            <span>Plant</span>
            <h1>bamboo</h1>
            <a href="view-products.php" class="btn">shop now</a>
</div>
</div>
<div class="box">
        <img src="pot name.jpg">
        <div class="detail">
            <span>Pot</span>
            <h1>lily</h1>
            <a href="view-products.php" class="btn">shop now</a>
</div>
</div>
<div class="box">
        <img src="plant see.jpg">
        <div class="detail">
            <span>Seed</span>
            <h1>ice</h1>
            <a href="view-products.php" class="btn">shop now</a>
</div>
</div>
 </div>
</div>  -->
        <!------------ people say about us  ---------------->
        <div class="testimonial-container">
            <div class="title">

                <h1>What People Say About Us </h1>

            </div>
            <div class="container">
                <div class="testimonial-item active">
                    <img src="../images/faheem.jpg">
                    <h1>Faheem Ahmed</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit inventore, sed maxime totam dolor ipsam. Consectetur provident maiores possimus libero!</p>
                </div>
                <div class="testimonial-item active1 ">
                    <img src="../images/maaz.jpg">
                    <h1>Maaz Ahmed</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit inventore, sed maxime totam dolor ipsam. Consectetur provident maiores possimus libero!</p>
                </div>
                <div class="testimonial-item active2">
                    <img src="../images/farooq.jpg">
                    <h1>Farooq Iqbal</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit inventore, sed maxime totam dolor ipsam. Consectetur provident maiores possimus libero!</p>
                </div>
            </div>
            <br>
            <br>


            <div class="word">
                <h1>Why Choose Us </h1>
            </div>
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