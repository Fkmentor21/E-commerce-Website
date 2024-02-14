<?php
include 'connection.php';
session_start();

$success_msg = $warning_msg = [];

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Assuming you stored user_id in the session after login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Redirect or handle the case when user_id is not set in the session
    header("Location: login.php");
    exit();
}



// Deleting item from wishlist
if (isset($_POST['delete_item'])) {
    $cart_id = $_POST['cart_id'];
    $delete_cart_item = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $delete_cart_item->execute([$cart_id, $user_id]);

    if ($delete_cart_item->rowCount() > 0) {
        $success_msg[] = 'Item deleted from cart successfully';
    } else {
        $warning_msg[] = 'Failed to delete item from cart';
    }
}
?>

<!-- The rest of your HTML and PHP code remains unchanged -->

<style>
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Nature Gift Shop - Cart Page</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>Cart</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / about / contact / our shop / wishlist / cart</span>
        </div>
        <div class="contain">
            <section class="products">
                <h1 class="title">Products added in cart</h1><br><br>
                <div class="box-container">
                    <?php
                    $grand_total = 0;
                    $select_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
                    $select_cart->execute([$user_id]);
                    if ($select_cart->rowCount() > 0) {
                        while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                            $select_products = $conn->prepare("SELECT * FROM products WHERE id = ?");
                            $select_products->execute([$fetch_cart['product_id']]);  // Fix here, using $fetch_cart instead of $fetch_wishlist
                            if ($select_products->rowCount() > 0) {
                                $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);
                    ?>
                                <!-- Your existing HTML and form code remains unchanged -->

                                <!-- Your existing HTML code for displaying wishlist items -->

                                <form method="post" action="" class="box">
                                    <img src="https://hortology.co.uk/cdn/shop/files/Ficus-elastica-Melany-Rubber-Plant-14x45cm-Hadleigh-Plant-Pot-White-20x17.5cm_52335388-022e-4750-9c9f-54efbba9ea0a_1200x.jpg?v=1704197517<?= $fetch_products['image']; ?>" class="img">

                                    <h3 class="name"><?= $fetch_products['name']; ?></h3>
                                    <div class="flex">
                                        <p class="price">price $<?= $fetch_products['price']; ?>/-</p>
                                        <input type="number" name="qty" required min="1" value="<?= $fetch_cart['qty']; ?>" max="99" maxlength="2" class="qty">
                                        <button type="submit" name="update_cart" class="bx bxs-edit fa-edit"></button>
                                    </div>

                                    <!-- Move the "cart_id" input field inside the form -->
                                    <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">

                                    <button type="submit" name="delete_item" class="btn" onclick="return confirm('delete this item')">delete</button>
                                </form>


                    <?php
                            }
                        }
                    } else {
                        echo '<p>No products added yet!</p>';
                    }
                    ?>

                </div>

            </section>
        </div>
        <?php include 'footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>

    <?php
    // Display success messages
    foreach ($success_msg as $msg) {
        echo '<script>swal("Success", "' . $msg . '", "success");</script>';
    }

    // Display warning messages
    foreach ($warning_msg as $msg) {
        echo '<script>swal("Warning", "' . $msg . '", "warning");</script>';
    }
    ?>
</body>

</html>