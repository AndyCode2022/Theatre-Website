<?php
require '../includes/dbconnect.php';
// handle posting messages

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $postText = $_POST['postText'];

    // insert message data into the database
    $query = "INSERT INTO posts (title, postText) 
    VALUES ('$title', '$postText')";
    mysqli_query($conn, $query);
}
// display messages
// $query = "SELECT * FROM posts ORDER BY date_created DESC";
// $result = mysqli_query($conn, $query);

// while ($row = mysqli_fetch_assoc($result)) {
//     echo '<div class="message">';
//     echo '<h2>' . $row['title'] . '</h2>';
//     echo '<p>' . $row['body'] . '</p>';
//     echo '<p>Posted by ' . $row['username'] . ' on ' . $row['date_created'] . '</p>';
//     echo '</div>';
// }

header('Location: ../admin/microBlogAdmin.php');
mysqli_close($conn);
?>