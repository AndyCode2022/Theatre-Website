<?php require 'header.php' ?>

  <h2>Register User details</h2>

  <form id="registerForm" method="POST" action="WriteUser.php">

    <table>
      <tr>
        <td>User Email address:</td>
        <td><input type="text" name="Email" size="30" "> </td>
 </tr>
 <tr>
  <td>Password:</td>
  <td><input type=" Password" name="Password" size="10"> </td>
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