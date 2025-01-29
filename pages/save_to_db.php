<?php
/* ====================================================
# Form submission with file upload
=====================================================*/

// Require connection
require_once('../assets/required/connection.php');

// Check if form submission method is available
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form input values and purify them
    $first_name = mysqli_real_escape_string($conn, trim(strtoupper($_POST['fname'])));
    $last_name = mysqli_real_escape_string($conn, trim(strtoupper($_POST['lname'])));
    $email = mysqli_real_escape_string($conn, trim(strtolower($_POST['email'])));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $comments = mysqli_real_escape_string($conn, trim(ucfirst($_POST['comments'])));

    // File upload
    if (isset($_FILES['attach']) && $_FILES['attach']['error'] == 0) {
        // Define the directory to save the file
        $upload_dir = "../uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
        }

        // Get the file information
        $file_name = basename($_FILES['attach']['name']);
        $file_tmp = $_FILES['attach']['tmp_name'];
        $file_size = $_FILES['attach']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Allowed file extensions
        $allowed_ext = ['pdf', 'doc', 'docx'];

        // Check file extension and size
        if (in_array($file_ext, $allowed_ext) && $file_size <= 5 * 1024 * 1024) { // Limit size to 5MB
            $new_file_name = uniqid() . "." . $file_ext; // Rename file with a unique name
            $file_path = $upload_dir . $new_file_name;

            // Move the file to the upload directory
            if (move_uploaded_file($file_tmp, $file_path)) {
                // File uploaded successfully
                $attachment = $file_path;
            } else {
                die("Failed to upload file.");
            }
        } else {
            die("Invalid file type or size exceeded (5MB limit).");
        }
    } else {
        $attachment = null; // If no file uploaded, set as null
    }

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($comments)) {
        // Check if the email is not taken
        $sql = "SELECT id FROM maoni WHERE email = '$email'";
        $select_result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($select_result) === 0) {
            // Insert into the database
            $q = "INSERT INTO maoni(firstname, lastname, email, phone, attachment, comments, saved_date) VALUES('$first_name', '$last_name', '$email', '$phone', '$attachment', '$comments', NOW())";
            $insert_result = mysqli_query($conn, $q);

            if ($insert_result) {
                echo "Maoni yako yametumwa vyema";
            } else {
                die("Not saved " . mysqli_error($conn));
            }
        } else {
            echo "Barua pepe au namba ya simu imeshatumika";
        }
        // Free result
        mysqli_free_result($select_result);
    } else {
        die("Tafadhali jaza taarifa zote");
    }
}

// Close connection
mysqli_close($conn);
