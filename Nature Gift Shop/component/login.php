<?php
include 'connection.php';
session_start();

if (isset($_POST['submit'])) {
    // Get user input
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Validate and sanitize inputs (add your validation logic here)

    // Prepare and execute SQL query to check if email already exists
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $select_user->execute([$email, $pass]);

    // Fetch the result
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];

        // Redirect to home page after successful login
        header("Location: home.php");
        exit(); // Make sure to exit after the header to prevent further code execution
    } else {
        $message[] = "Incorrect username or password";
    }
}

// ... (rest of your code)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature gift shop - Login Now</title>
    <style type="text/css">
        <?php include 'style.css'; ?>
    </style>
</head>

<body>
    <div class="form-container">
        <section class="form-container">
            <div class="title">
                <img src="../images/leaf login.png" alt="Logo">
                <h1>Login Now</h1>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>Your email</p>
                    <input type="email" name="email" required placeholder="Enter your email" maxlength="50" oninput="this.value= this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <p>Your password</p>
                    <input type="password" name="pass" required placeholder="Enter your password" maxlength="50" oninput="this.value= this.value.replace(/\s/g,'')">
                </div>

                <input type="submit" name="submit" value="Login Now" class="btn">
                <p>Don't have an account? <a href="register.php">Register now</a></p>
            </form>
        </section>
    </div>
</body>

</html>