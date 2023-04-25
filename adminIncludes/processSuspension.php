<?php

// Connect to the database
require_once '../../serverFiles/dbconnect.php';
// Define the userno and new suspended status
$userno = $_POST['userno'];
$suspended = true;

// Update the user's record with the new suspended status
$sql = "UPDATE users SET suspended = '$suspended' WHERE userno = '$userno'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "User suspended successfully";
} else {
    echo "Error suspending user: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
