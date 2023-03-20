<?php
// define ('db_user', 'root');               // username
// define ('db_password','');                // password
// define ('db_host', 'localhost');          // mysql server host address 
// define ('db_name', 'theatre');            // database name
// @$conn = mysqli_connect(db_host, db_user, db_password, db_name);
// if (mysqli_connect_errno())
//   {
//   echo 'Cannot connect to the database: ' . mysqli_connect_error();
//   }
?>

<?php

class Dbh {
  private $host = "localhost"; 
  private $user = "root";
  private $pwd = "";
  private $dbName = "theatre";

  protected function connect() {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}

?>

<?php 

// class Test extends Dbh {

//   public function getUsers() {
//     $sql = "SELECT * FROM users";

// }

// }
?>