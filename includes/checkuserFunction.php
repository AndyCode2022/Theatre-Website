<?php

// function checkuser($conn, $result, $password) {

if ($result->num_rows == 1) {

$row = $result->fetch_assoc();

//verify password
if (password_verify($password, $row['password'])) {
$_SESSION['logged_in'] = true;
$_SESSION['userno'] = $row['userno'];

if ($_SESSION['logged_in'] = true) {

header("Location: ../index.php");

exit();
}
}
//error handling for when password is incorrect
else {
echo "Password not recognised";
}
//error handling for when username or password is incorrect
} else {
echo "Your username or password is incorrect";
}

$conn->close();
// }
