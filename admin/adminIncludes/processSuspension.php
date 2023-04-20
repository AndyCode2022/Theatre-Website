<?php

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Define the user ID and new suspended status
$user_id = 123;
$suspended = true;

// Update the user's record with the new suspended status
$sql = "UPDATE users SET suspended = '$suspended' WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
echo "User suspended successfully";
} else {
echo "Error suspending user: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>