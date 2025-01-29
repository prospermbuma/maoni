<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free-5.15.2-web/css/all.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/login.css">
    <!-- Title -->
    <title>Login</title>
</head>

<body>

    <!-- Sign In Form -->
    <div id="sign_in">
        <div class="message"></div>
        <h2 class="head-text">User Login</h2>
        <form method="POST">
            <div class="input-group">
                <div class="name-group">
                    <input type="text" name="username" id="username" placeholder="Username">
                    <i class="icon fas fa-user"></i>
                </div>
                <div class="password-group">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <i class="icon fas fa-lock"></i>
                    <i class=" eye fas fa-eye text-gray"></i>
                    <i class="eye fas fa-eye-slash text-gray"></i>
                </div>
            </div>
            <div class="sign_in_save_changes">
                <input type="submit" name="submit" id="submit" Value="Sign In">
            </div>
        </form>
        <div class="back-home multi-div">
            <a href="../index.php"><i class="fas fa-arrow-left"></i> Home</a>
        </div>
    </div>
    <!-- End Form  -->

    <!-- === Scripts === -->
    <script src="../assets/js/login.js"></script>
</body>

</html>