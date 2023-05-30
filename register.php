<?php require 'includes/header.php' ?>

<div class=".bodyRegisterPage">
<!-- registration page to register a new user to the website -->
<!-- Has input fields for firstname, lastname, email, username, password, and confirmPassword -->
  <div class="container">
    <h2>Enter your details</h2>
    <!-- add validation in form of javascript -->
    <form id="registerForm" method="POST" onclick action="./includes/processNewUser.php">

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
        <div class="input-control">
          <label for="username" class="form-label">username</label>
          <input type="text" name="username" class="form-control" id="username">
          <div class="error"></div>
        </div>
      </div>

      <div class="mb-3">
        <div class="input-control">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password">
          <div class="error"></div>
        </div>
      </div>

      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required="true">
      </div>
<!-- Submit form to send form for validation checks -->
      <button type="submit" class="btn btn-primary" value="submit">Add User</button>
      <!-- Reset button to clear data in input fields -->
      <button type="reset" class="btn btn-secondary" value="clear">Clear</button>

    </form>
  </div>
</div>

<script src="JavaScript/formValidation.js"></script>

<?php require 'includes/footer.php' ?>