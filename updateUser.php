<?php require 'includes/header.php'; ?>
<?php require 'includes/dbconnect.php'; ?>

<form id="registerForm" action="serverFiles/processUpdateUser.php" method="post">

    <h2>Update User</h2>

    <?php
    $userno = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = $userno";

    $gotResults = mysqli_query($conn, $sql);

    if ($gotResults) {
        if (mysqli_num_rows($gotResults) > 0) {
            while ($row = mysqli_fetch_assoc($gotResults)) {
    ?>
                <!-- Input fields for user to update their details.
                When you user has entered their information then the new details
                will be updated in the MySQL database -->
                <form method="post" action="includes/processUpdateUser.php">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $row['lastname'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" name="username" class="form-control" id="username" value="<?php echo $row['username'] ?>">>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="<?php echo $row['password'] ?>">>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

    <?php

            }
        }
    }

    ?>


    <?php require 'includes/footer.php'; ?>