<?php
// session_start();
// Finds the comments in the MySQL database
include 'dbconnect.php';



$title = isset($_POST['title']);
$postText = isset($_POST['postText']);
$userno = isset($_SESSION['userno']);
$commentText = isset($_SESSION['commentText']);
$date_created = isset($_SESSION['date_created']);

$sql = "SELECT * FROM posts";
$postResult = mysqli_query($conn, $sql);

// Displayed posts

if (mysqli_num_rows($postResult) > 0) {
  while ($postText = mysqli_fetch_assoc($postResult)) {
    // Displays the posts on the page

    echo '<div class="container">
              <div class="card mb-3">
              <div class="card-commentText">
              <h5 class="card-title">' . $postText["title"] . '</h5>
              <div class="card mb-3">
              <input name="post_text" value="' . $postText['postText'] . '">';
    echo '<p class="card-text">Posted by user ' . $postText['userno'] . ' on ' . date('d-m-Y', strtotime($postText['date_created'])) . '</p>';
    echo '</div>
              </div>
              </div>';

    // <!-- references -->
    // <!-- https://chat.openai.com/ -->

    $sql = "SELECT * FROM comments";
    $commentResult = mysqli_query($conn, $sql);

    // Display comments
    if (mysqli_num_rows($commentResult) > 0) {
      while ($comment = mysqli_fetch_assoc($commentResult)) {
        echo '<div class="card-commentText">';
        if (!empty($comment) && isset($comment['commentText'])) {
          echo '<p class="card-text">' . $comment['commentText'] . '</p>';
        }
        echo '</div>
        <div class="card-footer">
        <div class="text-muted">' . $comment["date_created"] . '</div>
        </div>';
      }
    } else {
  echo 'No comments yet';
  }
 }
} else {  
 echo 'No posts yet';
}
