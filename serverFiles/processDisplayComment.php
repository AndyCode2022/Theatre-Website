<?php
    // Display the comments on the page
    require './serverFiles/dbconnect.php';
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    while ($comment = mysqli_fetch_assoc($result)) {
    echo '<div class="comment">';
        echo '<p>' . $comment['comment'] . '</p>';
        echo '<p>Posted by ' . $comment['userno'] . ' on ' . $comment['date'] . '</p>';
        echo '</div>';
    }
    } else {
    echo 'No comments yet';
    }
?>