<!-- Put each of the functions inside the queries -->
<!--  -->

<!-- Database Connection to Theatre database in xampp (MyPhpAdmin) -->

<?php

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "theatre";

    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

?>


<!-- Authentication -->

<?php

class Authentication extends Dbh
{
    public $userno;
    public $firstname;
    public $lastname;
    public $hashed_password;
    public $username;
    public $password;
    public $message;
    public $sql;
    public $result;

    public function __construct($username, $password, $message)
    {
        $this->username = $username;
        $this->password = $password;
        $this->message = $message;

        $this->sql = "SELECT userno, firstname, lastname, password FROM users WHERE username = ?";
        $stmt = $this->connect()->prepare($this->sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userno = $result['userno'];
        $this->firstname = $result['firstname'];
        $this->lastname = $result['lastname'];
        $this->hashed_password = $result['password'];
    }

    public function name()
    {
        if ($this->result->num_rows == 1) {
            $row = $this->result->fetch_assoc();
            if (password_verify($this->password, $row['password'])) {
                $message = "Hi " . $row['firstname'] . " " . $row['lastname'] . ". You have successfully logged in.";
                $_SESSION['loggedin'] = true;
                $_SESSION['userno'] = $row['userno'];
                $alertClass = "alert-success";
            } else {
                $message = "Password not recognised";
                $alertClass = "alert-danger";
            }
        } else {
            $message = "Your username or password is incorrect";
            $alertClass = "alert-danger";
        }

        // $this->connect()->close();
        return [$message, $alertClass];
    }
}

?>


<!-- Check login -->

<?php

class CheckLogin extends Dbh
{

    public function logIn()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
            header("Location: login.php");
            exit;
        }
    }
}

?>


<!-- processNewBlog -->

<?php

class newBlog extends Dbh
{

    function newBlog()
    {
        if (isset($_POST['submit'])) {
            $postID = $_SESSION['postID'];
            $userno = $_SESSION['userno'];
            $title = $_POST['title'];
            $body = $_POST['body'];
            $date_created = date('Y-m-d H:i:s');

            $conn = $this->connect();
            $sql = "INSERT INTO posts (title, body, date_created)
            VALUES ('$title', '$body', '$date_created')";

            if ($conn->query($sql) === TRUE) {
                echo "New post created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // $conn->close();
        }
        header('Location: microblog.php');
        exit();
    }
}

?>


<!-- processNewUser -->

<?php

class processNewUser extends Dbh {

    // public $firstname;
    // public $lastname;
    // public $address;
    // public $town;
    // public $postcode;
    // public $email;
    // public $username;
    // public $password;
    // public $confirmPassword;

public $firstname = $_POST['firstname'];
public $lastname = $_POST['lastname'];
public $address = $_POST['address'];
public $town = $_POST['town'];
public $postcode = $_POST['postcode'];
public $email = $_POST['email']; 
public $username = $_POST['username'];
public $password = $_POST['password'];
public $confirmPassword = $_POST['confirmPassword'];

public $isValid = true;
//form validation to be added
public function confirmPassword() { 
if ($password != $confirmPassword) {
    $isValid = false;
    echo "<p>passwords do not match</p>";
 }
}

public function passwordLength() {
if (strlen($password) < 8){
    $isValid = false;
    echo "<p>Password is too short.";
 }
}

public function usernameExtract() {
$stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
$stmt->bind_param("s", $this->$username);
$stmt->execute();
$result = $stmt->get_result();
}

public function userNameTaken() { 
if ($result->num_rows > 0) {
    echo "<p>Sorry that username is taken. Please try a different username.</p>";
    $isValid = false;
 }
}

public function passwordHash() { 
if ($isValid == true) {

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (firstname , lastname, address, town, postcode, email, username, password)
VALUES (?,?,?,?,?,?,?,?)");
}
    $stmt->bind_param("ssssssss", $firstname, $lastname, $address, $town, $postcode, $email, $username, $hash);
}

 public function verification() {
    if ($stmt->execute() == true) {
        $lastId = $stmt->insert_id;
        return "<p>New record has been created. Your user ID is: $lastId </p>";
    } else {
        return "Something went wrong";
    }
}

public function validate() {
    if ("validation successful") {
        $this->verification();
    } else {
        return "<p>Problem validating the form. Please try again <a href='register.php'>click here</a></p>";
    }

    $this->connect()->close();
 }
}

?>


<!-- processUpdateUser -->

<?php

// class processUpdateUser extends Dbh {

// public function updateUser() {
// $customerno = $_SESSION['userno'];

// $sql = "SELECT * FROM theatre WHERE userno = $userno";
// $result = $conn->query($sql);
// }

// public function results() {
// if ($result->num_rows == 1) {
//     $row = $result->fetch_assoc();
// } else {
//     echo "Unable to retrieve user info.";
//  }
// }

// function close() {
// $conn->close();
// }

// }

?>