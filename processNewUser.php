<?php

require 'header.php';

?>

<?php

require "dbconnect.php";

$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$isValid = true;
//form validation to be added
if ($password != $confirmPassword) {
    $isValid = false;
    echo "<p>passwords do not match</p>";
}

if (strlen($password) < 8){
    $isValid = false;
    echo "<p>Password is too short.";
}

$stmt = $conn->prepare("SELECT email FROM customers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<p>Sorry that username is taken. Please try a different email.</p>";
    $isValid = false;
}

if ($isValid == true) {

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO customers (email, password)
VALUES (?,?)");

$stmt->bind_param("ss", $email, $hash);

    if ($stmt->execute() == true) {
        $lastId = $stmt->insert_id;
        echo "<p>New record has been created. Your customer ID is: $lastId </p>";

                }
                else {
                    echo "Something went wrong";
                }
            }
else {
    echo "<p>Problem validating the form. Please try again <a href='register.php'>click here</a></p>";
}

$conn->close();

?>

<?php

require 'footer.php';

?>