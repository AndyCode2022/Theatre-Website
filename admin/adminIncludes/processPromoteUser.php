<?php

// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Get the user ID you want to promote
$userno = $_POST['userno'];

// Set the new role you want to give the user
$new_role = "admin";

// Update the user's role in the database
$sql = "UPDATE users SET role = '$new_role' WHERE id = $user_id";
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

?>