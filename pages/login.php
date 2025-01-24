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
        <h2 class="head-text">Secured Login</h2>
        <form action="process_login.php" method="POST">
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
            <div id="sign_up_link">Not registered <i class="fas fa-question"></i> Sign Up</div>
        </div>
    </div>
    <!-- End Form  -->

    <!-- Sign Up Form -->
    <div id="sign_up">
        <div class="message"></div>
        <h2 class="head-text">Create an account</h2>
        <form action="process_register.php" method="POST">
            <div class="input-group">
                <div class="multi-div">
                    <div class="name-group">
                        <input type="text" name="fname" id="fname" placeholder="Firstname">
                        <i class="icon fas fa-user"></i>
                    </div>
                    <div class="name-group">
                        <input type="text" name="lname" id="lname" placeholder="Lastname">
                        <i class="icon fas fa-user"></i>
                    </div>
                </div>
                <div class="multi-div">
                <div class="name-group">
                    <input type="text" name="uname" id="uname" placeholder="Username">
                    <i class="icon fas fa-user"></i>
                </div>
                <div class="email-group">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <i class="icon fas fa-envelope"></i>
                </div>
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
            <div class="sign_up_save_changes">
                <input type="submit" name="submit" id="save" Value="Sign Up">
            </div>
        </form>
        <div class="back-home multi-div">
            <a href="../index.php"><i class="fas fa-arrow-left"></i> Home</a>
            <div id="sign_in_link">Already registered <i class="fas fa-question"></i> Sign In</div>
        </div>
    </div>
    <!-- End Form Wrapper -->


    <!-- === Scripts === -->
    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/register.js"></script>
</body>

</html>