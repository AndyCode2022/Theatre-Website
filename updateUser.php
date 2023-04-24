<?php require 'includes/header.php'; ?>
<?php require 'includes/dbconnect.php'; ?>

<form id="registerForm" action="serverFiles/processUpdateUser.php" method="post">

    <h2>Update User</h2>

    <?php
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = $username";

    $gotResults = mysqli_query($conn, $sql);

    if ($gotResults) {
        if(mysqli_num_rows($gotResults)>0){
            while($row = mysqli_fetch_assoc($gotResults)){
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

    ?>

    <!-- Input fields for user to update their details.
    When you user has entered their information then the new details
    will be updated in the MySQL database -->
<form method="post" action="includes/processUpdateUser.php">
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="firstname" value="<?php echo isset($row['firstname']) ?>">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo isset($row['lastname']) ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo isset($row['email']) ?>">
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" name="username" class="form-control" id="username" required="true">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required="true">
    </div>

    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required="true">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php require 'includes/.php'; ?>