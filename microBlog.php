<?php require 'header.php' ?>

<form class="Form" id="microblogForm" action="microBlog.php" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">What are your thoughts today?</label>
        <input type="text" class="form-control" id="title" name="title" required="yes"><br>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body:</label>
        <textarea class="form-control" id="body" name="body" rows="10" required="yes"></textarea><br><br>
    </div>
    <div class="mb-3">
        <input class="form-control" type="submit" name="submit" value="Submit">
    </div>
</form>

<h2>Posts</h2>
<div class="mb-3">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<?php require 'post.php' ?>

<h2>Report a User</h2>
<form class="Form" id="ReportForm" action="processReportForm.php" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Please explain why you have chosen
            to report this user
        </label>
        <textarea class="form-control" id="message" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <input class="form-control" type="submit" name="submit" value="Submit">
    </div>
</form>

<?php require 'footer.php' ?>