<?php

// Make a connection
DEFINE('HOST', 'localhost');
DEFINE('USER', 'root');
DEFINE('PASS', '');
DEFINE('DB', 'school_manager');

$conn = @mysqli_connect(HOST, USER, PASS, DB);

if (!$conn) {
    die("Failed to connect to " . DB . " " . mysqli_connect_error());
}

// Send Form Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = ucfirst(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS));
    $last_name = ucfirst(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS));
    $user_name = strtolower(filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = strtolower(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
    $pswd_1 = filter_input(INPUT_POST, 'pswd_1', FILTER_SANITIZE_SPECIAL_CHARS);
    $pswd_2 = filter_input(INPUT_POST, 'pswd_2', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($first_name) && !empty($last_name) && !empty($user_name) && !empty($email) && !empty($pswd_1) && !empty($pswd_2)) {
        // Check if the confirm password is the same as the new password
        if ($pswd_2 != $pswd_1) {
            echo "Password mismatch";
        } else {
            // Check if the email exists
            $sql = "SELECT email, username FROM users WHERE email = '$email' AND username = '$user_name'";
            $select_result = mysqli_query($conn, $sql);

            // If email does not exist then insert new data
            if (mysqli_num_rows($select_result) === 0) {
                $query = "INSERT INTO users(firstname, lastname, username, email, pswd, registered_date) VALUES('$first_name', '$last_name', '$user_name', '$email', SHA1('$pswd_2'), NOW())";
                $insert_result = mysqli_query($conn, $query);
                if ($insert_result) {
                    echo "Registered successfully";
                } else {
                    die("Not saved " . mysqli_error($conn));
                }
            } else {
                echo "Sorry, user already taken";
            }
            // Free result
            mysqli_free_result($select_result);
        }
    } else {
        echo "Fields cannot be blank";
    }
}

// Close connection
mysqli_close($conn);
