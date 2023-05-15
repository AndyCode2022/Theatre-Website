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
              

    echo '<h2>Comments</h2>';

    // if (!empty($row) && isset($row['commentID']))

    $sql = "SELECT * FROM comments";
    $commentResult = mysqli_query($conn, $sql);

    if (mysqli_num_rows($commentResult) > 0) {
      while ($commentText = mysqli_fetch_assoc($commentResult)) {
  
             echo' <div class="card mb-3">
              <input name="comment" value="' . $commentText['commentText'] . '">';
              echo '<p class="card-text">Posted by user ' . $commentText['userno'] . ' on ' . date('d-m-Y', strtotime($commentText['date_created'])) . '</p>';
              echo '</div>';
      }
    }

    // Comment input for user
    
    // if (isset($_POST['submitComment'])) 

      // echo '<div class="card-commentText">
            echo '<form class="Form" id="microblogForm" method="post" action="includes/processNewComment.php">
              <input name="commentID" value="' . isset($commentText['commentID']) . '">
              <textarea class="form-control" id="commentText" name="commentText" rows="10" required="yes">Add your comment to the post</textarea><br>
              <input class="form-control" type="submit" name="submit" value="SubmitComment">
            </form>
          </div>';
    
  }
} else {
  echo 'No posts yet';
}

?>