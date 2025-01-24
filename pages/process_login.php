<?php
session_start();
// Form submission
// With no use of database
// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);

//     $password = $_POST['password'];

//     if ($username == 'Prosper' && $password == 'Prodeveloper-1') {
//         $_SESSION['username'] = $username;
//         header('Location: view_data.php');
//     }
//     else {
//         echo "Incorrect Login";
//     }
// }

// With the use of database
// Require connection
require_once('../assets/required/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_input(INPUT_POST, strtolower('username'), FILTER_SANITIZE_SPECIAL_CHARS);

    $password = $_POST['password'];

    $query = "SELECT username FROM school_manager WHERE username = '$username' AND pswd = SHA1('$password')";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        $_SESSION['username'] = ucfirst($username);
        header('Location: view_data.php');
    } else {
        echo "Incorrect Login";
    }
     // Free result
     mysqli_free_result($result);
}

// Close connection
mysqli_close($conn);