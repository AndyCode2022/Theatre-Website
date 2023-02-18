<?php require 'header.php'; ?>

<h2>Theatre User Login</h2>
<h2>Please enter your email address and password</h2>

<form id="loginForm" method="post" action="authenticate.php">
    <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" size="40">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" size="40">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php require 'footer.php'; ?>