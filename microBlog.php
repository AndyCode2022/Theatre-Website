<?php require 'header.php' ?>

<form action="microBlog.php" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br>

    <label for="body">Body:</label>
    <textarea id="body" name="body"></textarea><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<h2>Posts</h2>

<?php
require 'dbconnect.php';
$sql = "SELECT * FROM posts ORDER BY date_created DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Title: " . $row["title"] . "<br>";
        echo "Body: " . $row["body"] . "<br>";
        echo "Date Created: " . $row["date_created"] . "<br><br>";
    }
} else {
    echo "No posts found";
}

?>

<?php require 'footer.php' ?>