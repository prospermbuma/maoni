<?php
session_start();

// Make a connection
DEFINE('HOST', 'localhost');
DEFINE('USER', 'root');
DEFINE('PASS', '');
DEFINE('DB', 'school_manager');

$conn = @mysqli_connect(HOST, USER, PASS, DB);

if (!$conn) {
    die("Failed to connect to " . DB . " " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_input(INPUT_POST, strtolower('username'), FILTER_SANITIZE_SPECIAL_CHARS);

    $password = $_POST['password'];

    $query = "SELECT username FROM users WHERE username = '$username' AND pswd = SHA1('$password')";
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
