<?php

define ('db_user', 'root');               // username
define ('db_password','');                // password
define ('db_host', 'localhost');          // mysql server host address 
define ('db_name', 'theatre');            // database name
@$conn = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno())
  {
  echo 'Cannot connect to the database: ' . mysqli_connect_error();
  }

?>