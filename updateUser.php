<?php require 'includes/header.php'; ?>

<?php
// require 'includes/checkLogin.php';

checkLogin();
require 'includes/dbconnect.php';

$userno = $_SESSION['userno'];

$sql = "SELECT * FROM users WHERE userno = $userno";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Unable to retrieve userno info.";
}

$conn->close();

?>

<h2>Update User</h2>

<!-- Input fields for user to update their details.
                When you user has entered their information then the new details
                will be updated in the MySQL database -->
<form id="registerForm" method="post" action="includes/processUpdateUser.php">
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="firstname" required="true" value="<?php echo $row['firstname'] ?>">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastname" required="true" value="<?php echo $row['lastname'] ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" required="true" value="<?php echo $row['email'] ?>">
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" name="username" class="form-control" id="username" required="true" value="<?php echo $row['username'] ?>">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required="true" value="<?php echo $row['password'] ?>">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php require 'includes/footer.php'; ?>