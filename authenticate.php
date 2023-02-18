<?php require 'header.php'; ?>

<?php
require "dbconnect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT userno, firstname, lastname, password FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
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

$conn->close();
?>

<div class="container my-3">
    <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<?php require 'footer.php'; ?>