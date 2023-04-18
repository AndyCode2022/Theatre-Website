<?php 
require('dbconnect.php');
//initialize variables
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];
$isValid = true;

//password validation
if($password != $confirmPassword)
{
        echo "<h1 class=\"results\">Passwords do not match<a href='create account.php'>Go Back</a></h1></br>";
        $isValid = false;
}
if (strlen($password) < 8)
{
        echo "<h1 class=\"results\">Password must be at least 8 characters<a href='create account.php'>Go Back</a></h1></br>";
        $isValid = false;
}

//Checks if username is already taken
$stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0)
{
        echo "<h1 class=\"results\">Username is already taken<a href='create account.php'>Go Back</a></h1></br>";
        $isValid = false;
}

//Creates a new user
if($isValid == true)
{

$hash = password_hash($password, PASSWORD_DEFAULT);
        //PREPARED STATEMENT
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, username, password) 
VALUES (?, ?, ?, ?, ?)");

//bind parameters
$stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $hash);

//Execute
if($stmt->execute() == true)
{
        $lastId = $stmt->insert_id;     
        echo "<h1 class=\"results\">New User created successfully <br>$lastId</br> </h1>";
}

//error handling
else
{
        echo "<h1>Invalid User information was not inputted please try again</h1>";
}}
$conn->close();
