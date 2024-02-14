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

// Adding products to cart
if (isset($_POST['add_to_cart'])) {
    $id = unique_id();
    $product_id = $_POST['product_id'];
    $qty = 1;
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);

    $verify_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $verify_cart->execute([$user_id, $product_id]);

    $max_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $max_cart_items->execute([$user_id]);

    if ($verify_cart->rowCount() > 0) {
        $warning_msg[] = 'Product already exists in your cart';
    } else if ($max_cart_items->rowCount() >= 20) {
        $warning_msg[] = 'Cart is full';
    } else {
        $select_price = $conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

        // Use a transaction to ensure atomicity
        $conn->beginTransaction();

        try {
            // Add item to cart
            $insert_cart = $conn->prepare("INSERT INTO cart (id, user_id, product_id, price, qty) VALUES (?, ?, ?, ?, ?)");
            $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['price'], $qty]);

            // Trigger to update cart count
            $conn->exec("UPDATE cart_count_table SET cart_count = cart_count + 1 WHERE user_id = '$user_id'");

            $conn->commit();

            $success_msg[] = 'Product added to cart successfully';
        } catch (PDOException $e) {
            $conn->rollBack();
            $warning_msg[] = 'Failed to add product to cart';
        }
    }
}

// Deleting item from wishlist
if (isset($_POST['delete_item'])) {
    $wishlist_id = $_POST['wishlist_id'];

    $delete_wishlist_item = $conn->prepare("DELETE FROM wishlist WHERE id = ? AND user_id = ?");
    $delete_wishlist_item->execute([$wishlist_id, $user_id]);

    if ($delete_wishlist_item->rowCount() > 0) {
        $success_msg[] = 'Item deleted from wishlist successfully';
    } else {
        $warning_msg[] = 'Failed to delete item from wishlist';
    }
}
?>

<!-- The rest of your HTML and PHP code remains unchanged -->



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
    <title>Nature Gift Shop - Whishlist Page</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>my whishlist</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / about / contact / our shop / wishlist</span>
        </div>
        <div class="contain">
            <section class="products">
                <h1 class="title">Products added in wishlist</h1><br><br>
                <div class="box-container">

                    <?php
                    $grand_total = 0;
                    $select_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
                    $select_wishlist->execute([$user_id]);

                    if ($select_wishlist->rowCount() > 0) {
                        while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
                            $select_products = $conn->prepare("SELECT * FROM products WHERE id = ?");
                            $select_products->execute([$fetch_wishlist['product_id']]);

                            if ($select_products->rowCount() > 0) {
                                $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);
                    ?>
                                <!-- Your existing HTML and form code remains unchanged -->


                                <!-- Your existing HTML code for displaying wishlist items -->






                                <form method="post" action="" class="box">
                                    <img src="https://hortology.co.uk/cdn/shop/files/Ficus-elastica-Melany-Rubber-Plant-14x45cm-Hadleigh-Plant-Pot-White-20x17.5cm_52335388-022e-4750-9c9f-54efbba9ea0a_1200x.jpg?v=1704197517<?= $fetch_products['image']; ?>" class="img">
                                    <h3 class="name"><?= $fetch_products['name']; ?></h3>
                                    <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                                    <div class="flex">
                                        <p class="price">Price $<?= $fetch_products['price']; ?>/-</p>

                                    </div>
                                    <input type="hidden" name="wishlist_id" value="<?= $fetch_wishlist['id']; ?>">

                                    <!-- Your existing HTML code for displaying wishlist items -->

                                    <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                                    <button type="submit" name="delete_item" onclick="return confirm('Delete this item?');">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </form>

                    <?php
                                $grand_total += $fetch_wishlist['price'];
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