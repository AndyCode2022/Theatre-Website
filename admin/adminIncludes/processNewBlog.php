<?php
require '../../serverFiles/dbconnect.php';
// handle posting messages

if (isset($_POST['submit'])) {
    var_dump($_POST); // add this line to check the contents of $_POST
    $title = $_POST['title'];
    $body = $_POST['postText'];
    // $userno = $_POST['userno'];
    // $postID = $_POST['postID'];
    // $date_created = $_POST['date_created'];

    // insert message data into the database
    $query = "INSERT INTO posts (title, postText) 
    VALUES ('$title', '$postText')";
    mysqli_query($conn, $query);

    echo 'Message posted';
}
// display messages
$query = "SELECT * FROM posts ORDER BY date_created DESC";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="message">';
    echo '<h2>' . $row['title'] . '</h2>';
    echo '<p>' . $row['body'] . '</p>';
    echo '<p>Posted by ' . $row['username'] . ' on ' . $row['date_created'] . '</p>';
    echo '</div>';
}

header('Location: ../microBlogAdmin.php');
mysqli_close($conn);
?>