<?php
// session_start();
// Finds the comments in the MySQL database
include 'dbconnect.php';

$title = isset($_POST['title']);
$postText = isset($_POST['postText']);
$userno = isset($_SESSION['userno']);

$sql = "SELECT * FROM posts";
$postResult = mysqli_query($conn, $sql);

if (mysqli_num_rows($postResult) > 0) {
  while ($postText = mysqli_fetch_assoc($postResult)) {
    // Displays the posts on the page
    echo '<h2>Posts</h2>
              <div class="container">
              <div class="card mb-3">
              <div class="card-commentText">
              <h5 class="card-title">' . ($postText["title"]) . '</h5>
              <div class="card mb-3">
              <input name="post_text" value="' . $postText['postText'] . '">';
    echo '<p class="card-text">Posted by user ' . $postText['userno'] . ' on ' . date('d-m-Y', strtotime($postText['date_created'])) . '</p>';
    echo '</div>
              </div>
              </div>
              </div>';

    echo '<h2>Comments</h2>';

    $postText = isset($_SESSION['commentText']);
    $userno = isset($_SESSION['userno']);

    // Displayed comments with edit functionality
    if (!empty($row) && isset($row['commentID']))
      $sql = "SELECT * FROM comments WHERE commentID = commentID";
    $commentResult = mysqli_query($conn, $sql);
    if (mysqli_num_rows($commentResult) > 0) {
      while ($comment = mysqli_fetch_assoc($commentResult)) {
        echo '<div class="container">
              <div class="card mb-3">
              <div class="card">
              <input name="comment" value="' . $comment['commentText'] . '">';
        echo '<p class="card-text">Posted by user ' . $comment['userno'] . ' on ' . date('d-m-Y', strtotime($comment['date_created'])) . '</p>';
        echo '</div>
              </div>
              </div>';

        // Edit functionality
        echo '<div class="container">
                  <div class="card-commentText">
                  <form method="post" action="includes/editComment.php">
                  <input type="hidden" name="comments" value="' . ($comment['userno']) . '">';
        if (!empty($row) && isset($row['commentID']))
          echo '<input class="form-control" type="text" name="comment_text" value="' . ($comment['comment']) . '">
                  <input class="form-control" type="submit" value="Edit">
                  </div>
                  </div>';
        // Delete functionality
        echo '<div class="container">
            <form method="post" action="includes/deleteComment.php">
            <input type="hidden" name="commentno" value="' . isset($comment['userno']) . '">';
        if (!empty($row) && isset($row['commentText']))
          echo '<input class="form-control" type="text" name="comment_text" value="' . $comment['commentText'] . '">
                  <input class="form-control" type="submit" value="delete">
                  </div>';
      }
    }

    // Comment input for user
    echo '<div class="container">
              <div class="card-commentText">
              <form method="post" action="includes/processNewComment.php">
              <input type="hidden" name="comments" value="' . isset($comment['commentID']) . '">
              <textarea class="form-control" id="comments" name="comments" rows="10" required="yes">Add your comment to the post</textarea><br><br>
              <input class="form-control" type="submit" value="Submit">
            </form>
          </div>
        </div>';
  }
} else {
  echo 'No posts yet';
}
