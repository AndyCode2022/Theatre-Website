<?php

require_once ('dbconnect.php');

// Submit the comments to the database
$commentText = isset($_POST['commentText']);

// $query = "INSERT INTO comments (title, commentText) 
//     VALUES ('$commentText')";
// mysqli_query($conn, $query);

$stmt = $conn->prepare("SELECT userno FROM users WHERE userno = ?");
$stmt->bind_param("s", $commentID);
$stmt->execute();
$result = $stmt->get_result();

$sql = "INSERT INTO comments (commentText) VALUES (?)";



// Close the prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

header('Location: ../microBlog.php');

// Close the database connection
mysqli_close($conn);
