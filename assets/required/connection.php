<?php
/* ====================================================
# Database connection
=====================================================*/

// Require constants
require_once('constants.php');

// Make a connection

$conn = @mysqli_connect(SERVER, USER, PASSCODE, DB);

if (!$conn) {
    die("Failed to connect to " . DB . " " . mysqli_connect_error());
}
