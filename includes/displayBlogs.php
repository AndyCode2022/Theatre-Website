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

    // Displayed comments with edit functionality
    // if (!empty($row) && isset($row['postID'])
    // )
    // $sql = "SELECT * FROM comments WHERE postID = " . $postText['postID'];
    // $commentResult = mysqli_query($conn, $sql);

    // if (mysqli_num_rows($commentResult) > 0) {
    //   while ($commentText = mysqli_fetch_assoc($commentResult)) {
    //     // Edit functionality
    //     echo '<div class="container">
    //               <div class="card-commentText">
    //               <form method="post" action="../adminIncludes/editComment.php">
    //               <input type="hidden" name="commentno" value="' . ($commentText['userno']) . '">
    //               <input class="form-control" type="submit" value="Edit">
    //               </form>
    //               </div>
    //               </div>';

    //     // Delete functionality
    //     echo '<div class="container">
    //         <form method="post" action="../adminIncludes/deleteComment.php">
    //         <input type="hidden" name="commentno" value="' . isset($commentText['userno']) . '">
    //         <input class="form-control" type="submit" value="delete">
    //         </form>
    //         </div>';
  //     }
  //   }
  //   echo '</div>
  //         </div>';
  }
} else {
  echo 'No posts yet';
}

?>

<!-- references -->
<!-- https://chat.openai.com/ -->