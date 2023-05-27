<?php
require '../includes/dbconnect.php';

include 'editBlog.php';
include 'editComment.php';
include 'deleteBlog.php';
include 'deleteComment.php';

function getPosts($conn) {
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
$postText=$result->fetch_assoc(); {
        // Displays the posts on the page
        echo '<h5>' . $postText["title"] . '</h5>
              <input name="post_text" value="' . $postText['postText'] . '">';
        echo '<p>Posted by user ' . $postText['userno'] . ' on ' . $postText['date_created'] . '</p>';
        
        // Edit post functionality
        echo '<form class="edit-form" method="post" action="' . editBlogs($conn) . '">
                    <input type="hidden" name="userno" value="' . $postText['userno'] . '">
                    <input type="hidden" name="postID" value="' . $postText['postID'] . '">
                    <input type="hidden" name="postText" value="' . $postText['postText'] . '">
                    <button type="submit" name="editPost">Edit</button>
                    </form>';

        // Delete post functionality
        echo '<form class="delete-form" method="post" action="' . deleteBlogs($conn) . '">
                    <input type="hidden" name="postText" class="form-control" type="submit" value="' . $postText['postText'] . '">
                    <button type="submit" name="deletePost">Delete</button>
                    </form>';
 }
}
getPosts($conn);

    function getComments($conn) {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while ($commentText = $result->fetch_assoc()) {
                // Displayed comments
                    echo '<p>' . ($commentText['commentText']) . '</p>
                    <div> ' . ($commentText["date_created"]) . '</div>';

        // Edit post functionality
        echo '<form class="edit-form" method="post" action="' . editComments($conn) . '">
                    <input type="hidden" name="userno" value="' . $commentText['userno'] . '">
                    <input type="hidden" name="postID" value="' . $commentText['postID'] . '">
                    <input type="hidden" name="postText" value="' . $commentText['commentText'] . '">
                    <button type="submit" name="editPost">Edit</button>
                    </form>';

        // Delete post functionality
        echo '<form class="delete-form" method="post" action="' . deleteComments($conn) . '">
                    <input type="hidden" name="commentText" class="form-control" type="submit" value="' . $commentText['commentText'] . '">
                    <button type="submit" name="deletePost">Delete</button>
                    </form>';
            }
    //  Comment form for adding comments to posts 
    echo '<form method="post" action="../adminIncludes/processNewCommentAdmin.php">
                    <textarea class="form-control" id="commentText" name="commentText" rows="10">Add your comment to the post</textarea><br><br>
                    <input class="form-control" type="submit" value="submitComment">
                 </form>';
        }
    getComments($conn);

        // references
        // https://www.youtube.com/watch?v=W-FkqWUz0eE