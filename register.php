<?php require 'includes/header.php' ?>

<div class=".bodyRegisterPage">

  <div class="container">
    <h2>Enter your details</h2>

    <form id="registerForm" method="POST" action="./includes/processNewUser.php">

      <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" name="firstname" class="form-control" id="firstname" required="true">
      </div>

      <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lastname" required="true">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" required="true">
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

      <button type="submit" class="btn btn-primary" value="submit">Add User</button>
      <button type="reset" class="btn btn-secondary" value="clear">Clear</button>

    </form>
  </div>
</div>

<?php require 'includes/footer.php' ?>