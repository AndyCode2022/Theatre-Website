<?php require 'header.php' ?>

<h2>Theatre User Login</h2>
<h2>Please enter your Email address and password</h2>

<form id="loginForm" action="authenticate.php" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" size="40"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" size="40"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>

<?php require 'footer.php' ?>