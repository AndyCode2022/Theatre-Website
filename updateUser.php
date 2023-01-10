<?php

require 'header.php';

?>

<?php

require "checkLogin.php";
require "dbconnect.php";

$customerno = $_SESSION['customerno'];

$sql = "SELECT * FROM customers WHERE customerno = $customerno";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Unable to retrieve customer info.";
}

$conn->close();

?>

<form action="processUpdateUser.php" method="post">

    <h2>Update User</h2>

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo $row['email'] ?>">
    <br>

    <input type="submit" value="Update">
</form>

<?php

require 'footer.php';

?>