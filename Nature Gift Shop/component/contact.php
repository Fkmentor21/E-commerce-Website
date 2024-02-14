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
    <title>Nature Gift Shop - contact us page</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="banner">

            <h1>contact us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / about / contact</span>
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
        <div class="form-container">
            <form method="post">
                <div class="title">
                    <img src="message.png" class="logo">
                    <h1>Leave A Message</h1>
                </div>
                <br><br>
                <div class="input-field">
                    <p>your name </p>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <p>your email </p>
                    <input type="email" name="email">
                </div>
                <div class="input-field">
                    <p>your number</p>
                    <input type="text" name="number">
                </div>
                <div class="input-field">
                    <p>your message </p>
                    <textarea name="message"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">send message </button>
            </form>
        </div><br><br>

        <!-- contact details  -->




        <?php include 'footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'alert.php'; ?>
</body>

</html>