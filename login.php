<?php require 'header.php' ?>

        <h2>Theatre User Login</h2>
        <h2>Please enter your Email address and password</h2>

        <form id="loginForm" method="post" action="authenticate.php">
            <table>
                <tr>
                    <td>Email address :</td>
                    <td><input type="text" name="Email" size="30" /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="Password" size="10" /></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" value="Check User" /></td>
                </tr>
            </table>
        </form>

    <?php require 'footer.php' ?>