<?php require 'header.php'; ?>

<form id="registerForm" action="processUpdateUser.php" method="post">

    <h2>Update User</h2>

    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="firstname" value="<?php echo isset($row['firstname']) ?>">
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo isset($row['lastname']) ?>">
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" value="<?php echo isset($row['address']) ?>">
    </div>

    <div class="mb-3">
        <label for="town" class="form-label">Town</label>
        <input type="text" class="form-control" name="town" id="town" value="<?php echo isset($row['town']) ?>">
    </div>

    <div class="mb-3">
        <label for="postcode" class="form-label">Postcode</label>
        <input type="text" class="form-control" name="postcode" id="postcode" value="<?php echo isset($row['postcode']) ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo isset($row['email']) ?>">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php require 'footer.php'; ?>