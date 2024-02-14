<?php
include 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    // Get user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // Validate and sanitize inputs (add your validation logic here)

    // Prepare and execute SQL query to check if email already exists
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);

    if ($select_user->rowCount() > 0) {
        $message[] = 'email already exists';
        echo 'email already exists';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm your password';
            echo 'confirm your password';
        } else {
            // Insert new user into the database
            $insert_user = $conn->prepare("INSERT INTO `users` (name, email, password) VALUES (?, ?, ?)");
            $insert_user->execute([$name, $email, $pass]);

            // Retrieve user information after insertion
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
            $select_user->execute([$email]);

            $row = $select_user->fetch(PDO::FETCH_ASSOC);

            if ($select_user->rowCount() > 0) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];

                // Redirect to home page after successful registration
                header("Location: home.php");
                exit(); // Make sure to exit after the header to prevent further code execution
            }
        }
    }
}
// ... (rest of your code)
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
    <title>Nature gift shop - register now</title>
</head>

<body>
    <div class="form-container">
        <section class="form-container">
            <div class="title">
                <img src="../images/leaf login.png">  
                <h1>Register Now</h1>

            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your name</p>
                    <input type="text" name="name" required placeholder="enter your name" maxlength="50">
                </div>
                <div class="input-field">
                    <p>your email</p>
                    <input type="email" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value= this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <p>your password</p>
                    <input type="password" name="pass" required placeholder="enter your password" maxlength="50" oninput="this.value= this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <p>confirm password</p>
                    <input type="password" name="cpass" required placeholder="enter your password" maxlength="50" oninput="this.value= this.value.replace(/\s/g,'')">
                </div>
                <input type="submit" name="submit" value="register now" class="btn">
                <p>already have an account? <a href="login.php">login now</a></p>
</body>

</html>