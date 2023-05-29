<?php
require '../includes/dbconnect.php';
include 'commentsFunction.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
// While there are posts, display them
while ($postText=$result->fetch_assoc()) {
// if statement makes sure only to display if there is content
if (!empty($postText)) {
        echo '<div class="container">';
echo '<h5>' . ($postText["title"]) . '</h5>
        <input name="post_text" value="' . ($postText['postText']) . '">';
echo '<p>Posted by user ' . ($postText['userno']) . ' on ' . ($postText['date_created']) . '</p>';
        echo '</div>';

// Edit post functionality
echo '<div class="container">';
echo '<form class="edit-form" method="post" action="../adminIncludes/editBlog.php">
            <input type="hidden" name="userno" value="' . ($postText['userno']) . '">
            <input type="hidden" name="postID" value="' . ($postText['postID']) . '">
            <input type="hidden" name="postText" value="' . ($postText['postText']) . '">
            <button type="submit" name="editBlog">Edit</button>
            </form>';
echo '</div>';

        // Delete post functionality
        echo '<div class="container">';
echo '<form class="delete-form" method="post" action="../adminIncludes/deleteBlog.php">
            <input type="hidden" name="postID" value="' . $postText['postID'] . '">
            <button type="submit" name="blogDelete">Delete</button>
            </form>';
        echo '</div>';
 }
       

}

$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

while ($commentText = $result->fetch_assoc()) {
        // Displayed comments
        if (!empty($commentText)) {


                // Edit comment functionality
                echo '<form class="edit-form" method="post" action="../adminIncludes/editBlog.php">
                    <input type="hidden" name="userno" value="' . $commentText['userno'] . '">
                    <input type="hidden" name="commentID" value="' . $commentText['commentID'] . '">
                    <input type="hidden" name="commentText" value="' . $commentText['commentText'] . '">
                    <button type="submit" name="editPost">Edit</button>
                    </form>';

                // Delete comment functionality
                echo '<form class="delete-form" method="post" action="../adminIncludes/deleteComment.php">
                    <input type="hidden" name="commentText" class="form-control" type="submit" value="' . $commentText['commentText'] . '">
                    <button type="submit" name="deletePost">Delete</button>
                    </form>';
        }
}
  

showComments($conn);

// references
// https://www.youtube.com/watch?v=W-FkqWUz0eE