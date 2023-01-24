<?php

require 'header.php';

?>

<?php

require "checkLogin.php";
require "dbconnect.php";

$customerno = $_SESSION['userno'];

$sql = "SELECT * FROM users WHERE userno = $userno";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Unable to retrieve user info.";
}

$conn->close();

?>

<form action="processUpdateUser.php" method="post">

    <h2>Update User</h2>

    <label for="firstname">First Name</label>
    <input type="text" name="firstname" value="<?php echo $row['firstname'] ?>">
    <br>

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname'] ?>">
    <br>

    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="<?php echo $row['address'] ?>">
    <br>

    <label for="town">Town</label>
    <input type="text" name="town" id="town" value="<?php echo $row['town'] ?>">
    <br>

    <label for="postcode">Postcode</label>
    <input type="text" name="postcode" id="postcode" value="<?php echo $row['postcode'] ?>">
    <br>

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo $row['email'] ?>">
    <br>

    <input type="submit" value="Update">
</form>

<?php

require 'footer.php';

?>