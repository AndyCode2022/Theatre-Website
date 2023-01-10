<?php

require 'header.php';

?>

<?php

require "dbaccess.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT customerno, firstname, lastname, password FROM customers
        WHERE username = '$username'";

$result = $conn->query($sql);

if ($result->num_rows == 1){

    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])){
      echo "Hi " . $row['firstname'] . " " . $row['lastname'];
      echo "<br>You have successfully logged in.";
      
      $_SESSION['loggedin'] = true;
      $_SESSION['customerno'] = $row['customerno'];
    }
    else {
        echo "Password not recognised";
    }
}
else {
    echo "Your username or password is incorrect";
}

$conn->close();

?>

<p></p>

<?php

require 'footer.php';

?>