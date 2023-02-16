<?php require 'header.php'; ?>

<form id="registerForm" action="processUpdateUser.php" method="post">

    <h2>Update User</h2>

    <label for="firstname">First Name</label>
    <input type="text" name="firstname" value="<?php echo isset($row['firstname']) ?>">
    <br>

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" value="<?php echo isset($row['lastname']) ?>">
    <br>

    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="<?php echo isset($row['address']) ?>">
    <br>

    <label for="town">Town</label>
    <input type="text" name="town" id="town" value="<?php echo isset($row['town']) ?>">
    <br>

    <label for="postcode">Postcode</label>
    <input type="text" name="postcode" id="postcode" value="<?php echo isset($row['postcode']) ?>">
    <br>

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo isset($row['email']) ?>">
    <br>

    <input type="submit" value="Update">
</form>

<?php require 'footer.php'; ?>