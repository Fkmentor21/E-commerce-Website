<header class="header">
    </div>
    <div class="flex">
        <a href="home.php" class="logo"><img src=""></a>
        <nav class="navbar">
            <a href="home.php"><b>Home<b></a>
            <a href="view_products.php"><b>Products<b></a>
            <a href="order.php"><b>Orders<b></a>
            <a href="about.php"><b>About us<b></a>
            <a href="contact.php"><b>Contact us<b></a>
        </nav>
        <div class="icons">
            <i class="bx bxs-user" id="user-btn"></i>
            <?php
            // Assuming you store user ID in the session after login
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                // Set a default value or handle accordingly
                $user_id = null;
            }
            ?>

            <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_items = $count_wishlist_items->rowCount();
            ?>

            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i><sup><?= $total_wishlist_items ?></sup></a>

            <?php
            $count_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
            ?>

            <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"></i><sup><?= $total_cart_items ?></sup></a>

            <i class='bx bx-list-plus' id="menu-btn" style="font-size: 2rem;"></i>
        </div>
        <div class="user-box">
            <?php
            if (isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
            ?>
                <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <form method="post">
                    <button type="submit" name="logout" class="logout-btn">log out</button>
                </form>
            <?php
            } else {
            ?>
                <a href="login.php" class="btn">login</a>
                <a href="register.php" class="btn">register</a>
            <?php
            }
            ?>
</header>