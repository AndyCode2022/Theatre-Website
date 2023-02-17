<?php require 'header.php'; ?>

<?php

require "dbconnect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT users.userno, firstname, lastname, users.password 
        password FROM users, admin
        WHERE users.username = admin.username = '$username'
        AND users.password = admin.password";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        echo "Hi " . $row['firstname'] . " " . $row['lastname'];
        echo "<br>You have successfully logged in.";
    } elseif ($admin == $adminController) {
        echo "Hi " . $row['username'];
        echo "<br>You have successfully logged in as an admin.";
        $_SESSION['loggedin'] = true;
        $_SESSION['userno'] = $row['userno'];
    }
    echo "Password not recognised";
    }
else {
    echo "Your username or password is incorrect";
}

$conn->close();

?>

<?php require 'footer.php'; ?>