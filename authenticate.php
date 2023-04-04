<?php
session_start();
require "serverFiles/dbconnect.php";
// add a user status for admin and users

$username = $_POST['username'];
$password = $_POST['password'];
$userStatus = isset($_POST['userStatus']) ? $_POST['userStatus'] : null;

        $alertClass = "alert-danger";
        $message = "Your username or password is incorrect";

        if (!empty($username) && !empty($password)) {
            $stmt = $conn->prepare("SELECT userno, firstname, lastname, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
        if (isset($_POST['userStatus']) && ($_POST['userStatus'] == 0 || $_POST['userStatus'] == 1)) {
            $userStatus = $_POST['userStatus'];
        }
                if (password_verify($password, $row['password'])) {
                    $message = "Hi " . $row['firstname'] . " " . $row['lastname'] . ". You have successfully logged in.";
                    $_SESSION['loggedin'] = true;
                    $_SESSION['userno'] = $row['userno'];
                    $_SESSION['userStatus'] = $userStatus;
                    $alertClass = "alert-success";
                } else {
                    $message = "Password not recognised";
                }
            }

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
        header("Location: login.php");
        exit;
    }
            $stmt->close();
        }
        $conn->close();
?>
<!-- echos out if the password is wrong or not -->
<div class="container my-3">
    <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">Close</button>
        <?php echo '"href="index.php"'?>
    </div>
</div>