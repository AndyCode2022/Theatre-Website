<?php

require 'header.php';

?>

<?php

require "dbaccess.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$town = $_POST['town'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$username = $_POST['username'];
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

$stmt = $conn->prepare("SELECT username FROM customers WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<p>Sorry that username is taken. Please try a different username.</p>";
    $isValid = false;
}

if ($isValid == true) {
/*
    $sql = "INSERT INTO customers (firstname, lastname, address, town, postcode, email, username, password)
                VALUES ('$firstname' , '$lastname' , '$address' , '$town' , '$postcode' , '$email' , '$username' , '$password')";
*/

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO customers (firstname , lastname, address, town, postcode, email, username, password)
VALUES (?,?,?,?,?,?,?,?)");

$stmt->bind_param("ssssssss", $firstname, $lastname, $address, $town, $postcode, $email, $username, $hash);

    if ($stmt->execute() == true) {
        $lastId = $stmt->insert_id;
        echo "<p>New record has been created. Your customer ID is: $lastId </p>";

                }
                else {
                    echo "Something went wrong";
                }
            }
else {
    echo "<p>Problem validating the form. Please try again <a href='newUser.php'>click here</a></p>";
}

$conn->close();

?>

<?php

require 'footer.php';

?>