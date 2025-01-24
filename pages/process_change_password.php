<?php
session_start();

require_once('../assets/required/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pswd_0 = filter_input(INPUT_POST, 'pswd_0', FILTER_SANITIZE_SPECIAL_CHARS);
    $pswd_1 = filter_input(INPUT_POST, 'pswd_1', FILTER_SANITIZE_SPECIAL_CHARS);
    $pswd_2 = filter_input(INPUT_POST, 'pswd_2', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($pswd_0) && !empty($pswd_1) && !empty($pswd_2)) {

        // Check if the confirm password is the same as the new password
        if ($pswd_2 != $pswd_1) {
            echo "Password mismatch";
        } else {
            $username = $_SESSION['username'];
            // Check if the current password exists
            $sql = "SELECT user_id FROM school_manager WHERE username = '$username' AND pswd = SHA1('$pswd_0')";
            $select_result = mysqli_query($conn, $sql);

            // If the current password exits then update the password
            if (mysqli_num_rows($select_result)) {
                // Check if the new confirmed password is already exists
                $q = "SELECT pswd FROM school_manager WHERE username = '$username' AND pswd = SHA1('$pswd_2')";
                $q_result = mysqli_query($conn, $q);
                // If the password does not exits then update the new confirmed password
                if (mysqli_num_rows($q_result) === 0) {
                    $query = "UPDATE school_manager SET pswd = SHA1('$pswd_2') WHERE username = '$username'";
                    $insert_result = mysqli_query($conn, $query);
                    if ($insert_result) {
                        echo "Password changed successfully";
                    } else {
                        die("Not saved " . mysqli_error($conn));
                    }
                } else {
                    echo "Password has already been used";
                }
            } else {
                echo "Incorrect current password";
            }
            // Free result
            mysqli_free_result($select_result);
        }
    } else {
        die("Fields cannot be blank");
    }
}

// Close connection
mysqli_close($conn);
