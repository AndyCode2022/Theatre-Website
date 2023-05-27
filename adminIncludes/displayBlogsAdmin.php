<?php

// Finds the comments in the MySQL database
include '../includes/dbconnect.php';

$_SESSION['userno'];

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
              <input name="post_text" value="' . $postText['postText'] . '">      
              </div>';
        echo '<p class="card-text">Posted by user ' . $postText['userno'] . ' on ' . $postText['date_created'] . '</p>';
        echo '</div>';

        // Edit post functionality
        echo '<div class="container">
                    <div class="card-postText">
                    <form method="hidden" name="editPost" action="../adminIncludes/editComment.php">
                    <input class="form-control" type="submit" value="Edit">
                    </form>
                    </div>
                    </div>';

        // Delete post functionality
        echo '<div class="container">
                    <form method="post" name="deletePost" action="../adminIncludes/deleteComment.php">
                    <input class="form-control" type="submit" value="delete">
                    </form>
                    </div>
                    </div>';

    $sql = "SELECT * FROM comments";
    $commentResult = mysqli_query($conn, $sql);

        // Displays comments
        if (mysqli_num_rows($commentResult) > 0) {
            while ($comment = mysqli_fetch_assoc($commentResult)) {
                // Displayed comments
                echo 'div class="container"';
                echo '<div class="card-commentText">';
                    echo '<p> ' . ($comment['commentText']) . '</p>
                    </div>
                    <div class="card-footer">
                    <div class="text-muted"> ' . ($comment["date_created"]) . '</div>
                    </div>';
                    
                    // Edit comment functionality
                    echo '<div class="container">
                    <div class="card-commentText">
                    <form method="hidden" name="editComment" action="adminIncludes/editComment.php">
                    
                    <input class="form-control" type="submit" value="Edit">
                    </form>
                    </div>
                    </div>';

                    // Delete comment functionality
                    echo '<div class="container">
                    <form method="post" name="deleteComment" action="adminIncludes/deleteComment.php">
                    
                    <input class="form-control" type="submit" value="delete">
                    </form>
                    </div>
                    </div>';
            }
        } else {
            echo 'No comments yet';
        }

                // Comment input for user
                echo '<div class="container">
                    <div class="card-commentText">
                    <form method="post" action="adminIncludes/processNewCommentAdmin.php">
                    <div class="form-group">
                    <textarea class="form-control" id="commentText" name="commentText" rows="10" required="yes">Add your comment to the post</textarea><br><br>
                    <input class="form-control" type="submit" value="Submit">
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>';
        }

        } else {
            echo 'No posts yet';
        }
