// This file allows the user to search for the post that they're interested in.

<?php

include 'dbconnect.php';
include  'microBlog.php';
// Process the search form
if(isset($_POST['submit'])) {
$search = mysqli_real_escape_string($conn, $_POST['search']);
$sql = "SELECT * FROM post 
WHERE title 
LIKE '%$search%' 
OR content 
LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
}

// Display the search results
if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo "<h2>".$row['title']."</h2>";
echo "<p>".$row['content']."</p>";
}
} else {
echo "No results found.";
}

?>