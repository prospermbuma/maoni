<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
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
    <link rel="stylesheet" href="../assets/css/change_password.css">
    <!-- Title -->
    <title>Login</title>
</head>

<body>

    <!-- Change password Form -->
    <div id="change_password">
        <div class="message"></div>
        <h2 class="head-text">Change password</h2>
        <form method="POST">
            <div class="input-group">
                <div class="password-group-0">
                    <input type="password" name="pswd_0" id="pswd_0" placeholder="Current Password">
                    <i class="icon fas fa-lock"></i>
                    <i class=" eye fas fa-eye text-gray"></i>
                    <i class="eye fas fa-eye-slash text-gray"></i>
                </div>
                <div class="password-group-1">
                    <input type="password" name="pswd_1" id="pswd_1" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New Password">
                    <i class="icon fas fa-lock"></i>
                    <i class=" eye fas fa-eye text-gray"></i>
                    <i class="eye fas fa-eye-slash text-gray"></i>
                </div>
                <div class="password-group-2">
                    <input type="password" name="pswd_2" id="pswd_2" placeholder="Confirm Password">
                    <i class="icon fas fa-lock"></i>
                    <i class=" eye fas fa-eye text-gray"></i>
                    <i class="eye fas fa-eye-slash text-gray"></i>
                </div>
            </div>
            <div class="save_changes">
                <input type="submit" name="submit" id="submit" Value="Save changes">
            </div>
        </form>
        <div class="back-dash multi-div">
            <a href="view_data.php"><i class="fas fa-arrow-left"></i> Dashboard</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Signout</a>
        </div>
    </div>
    <!-- End Form Wrapper -->

    <!-- === Scripts === -->
    <script src="../assets/js/change_password.js"></script>
</body>

</html>