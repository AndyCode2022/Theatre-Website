<?php require 'includes/header.php'; ?>
<!-- Login form for users on the Theatre website -->
<!-- Login is sent to authentication page for verification -->
<h2>Theatre User Login</h2>
<h2>Please enter your email address and password</h2>

<script src="JavaScript/formValidation.js"></script>

<div class="container"></div>
<form id="loginForm" method="post" action="includes/authenticate.php">
    <div class="mb-3">
        <div class="input-control">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control" id="username" name="username" size="40" required="true">
            <div class="error"></div>
        </div>
    </div>
    <div class="mb-3">
        <div class="input-control">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" size="40" required="true">
            <div class="error"></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>



<?php require 'includes/footer.php'; ?>