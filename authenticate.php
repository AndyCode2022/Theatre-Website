<?php

require 'header.php';

?>

<?php

require "dbconnect.php";

$username = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT customerno, password FROM customers
        WHERE email = '$email'";

$result = $conn->query($sql);

if ($result->num_rows == 1){

    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])){
      echo "Hi " . $row['email'];
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