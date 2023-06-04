<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//code goes here
?>

<?php
// Finds the comments in the MySQL database
include_once 'dbconnect.php';

$title = isset($_POST['title']);
$postText = isset($_POST['postText']);
$userno = isset($_SESSION['userno']);
$commentText = isset($_SESSION['commentText']);
$date_created = isset($_SESSION['date_created']);



$sql = "SELECT * FROM posts";
$postResult = mysqli_query($conn, $sql);

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
              </div>
              </div>';

    // <!-- references -->
    // <!-- https://chat.openai.com/ -->

    $sql = "SELECT * FROM comments";
    $commentResult = mysqli_query($conn, $sql);

    // Displays comments
    if (mysqli_num_rows($commentResult) > 0) {
      while ($comment = mysqli_fetch_assoc($commentResult)) {
        echo '<div class="container">';
        echo '<div class="card-commentText">';
        if (!empty($comment) && isset($comment['commentText'])) {
          echo '<p class="card-text">' . $comment['commentText'] . '</p>';
        }
        echo '</div>
        <div class="card-footer">
        <div>' . $comment["date_created_c"] . '</div>
        </div>
        </div>';
      }
      
      //  Comment form for adding comments to posts 
      if (isset($_POST['submit'])) {
        // if (!isset($_SESSION['userno'])) {

        echo 'Access denied. Please login to post comments.';
      }
      echo '<div class="container">';
      echo '<form method="post" action="includes/processNewComment.php">
        
        <input type="hidden" name="userno" value="' . $postText['userno'] . '">
        <input type="hidden" name="date_created" value="' . $postText['date_created'] . '">
        <input type="hidden" name="postID" value="' . $postText['postID'] . '">
                <textarea class="form-control" id="commentText" name="commentText" rows="10">Add your comment to the post</textarea><br><br>
                <input class="form-control" name="submit" type="submit" value="submit">
                </form>';
      echo '</div>';
      // }
    } else {
      echo 'No comments yet';
    }
  }
} else {
  echo 'No posts yet';
}

// references
// https://www.youtube.com/watch?v=W-FkqWUz0eE