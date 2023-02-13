<?php require 'header.php' ?>

<form class="Form" id="microblogForm" action="microBlog.php" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">What are your thoughts today?</label>
        <input type="text" class="form-control" id="title" name="title"><br>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body:</label>
        <textarea class="form-control" id="body" name="body" rows="10"></textarea><br><br>
    </div>
    <div class="mb-3">
        <input class="form-control" type="submit" name="submit" value="Submit">
    </div>
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