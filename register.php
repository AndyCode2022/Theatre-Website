<?php require 'header.php' ?>

<h2>Enter your details</h2>

<form id="registerForm" method="POST" action="processNewUser.php">

  <table>
    <tr>
      <td>First Name</td>
      <td><input type="text" name="firstname" size="30" /></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><input type="text" name="lastname" size="10" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="address" size="10" /></td>
    </tr>
    <tr>
      <td>Town</td>
      <td><input type="text" name="town" size="10" /></td>
    </tr>
    <tr>
      <td>Postcode</td>
      <td><input type="text" name="postcode" size="10" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" size="10" /></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="username" size="10" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password" size="10" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input type="password" name="confirmPassword" size="10" /></td>
    </tr>

    <tr>
      <td colspan="2"><input type="submit" value="Add User" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="reset" value="Clear" /></td>
    </tr>
  </table>
</form>

<?php require 'footer.php' ?>