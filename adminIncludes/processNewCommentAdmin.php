<?php

require_once '../includes/dbconnect.php';

// Submit the comments to the database
if (isset($_POST['submit'])) {

$commentID = $_POST['commentID'];
$postID = $_POST['postID'];
$userno = $_POST['userno'];
$commentText = $_POST['commentText'];
$date_created = $_POST['date_created'];


    // insert message data into the database
    $query = "INSERT INTO comments (commentID, postID, userno, commentText, date_created
    VALUES ('$commentID', '$postID', '$userno', '$commentText', '$date_created')";
    if (mysqli_query($conn, $query)) {
        echo 'Message posted';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    echo 'Message posted';
}

mysqli_close($conn);

// header('Location: ../admin/microBlogAdmin.php');

// $stmt = $conn->prepare("SELECT userno FROM users WHERE userno = ?");
// $stmt->bind_param("s", $userno);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($stmt->errno) {

// $stmt = $conn->prepare("INSERT INTO comments (commentID, postID, userno, commentText, date_created) 
// VALUES (?,?,?,?,?)");

// $stmt->bind_param("iiiss", $commentID, $postID, $userno, $commentText, $date_created);
// $stmt->execute();

// } else {
// // Closes the prepared statement
// if (isset($stmt)) {
//     mysqli_stmt_close($stmt);
//  }
// }
// }
header('Location: ../admin/microBlogAdmin.php');

// Close the database connection
$conn->close();

?>