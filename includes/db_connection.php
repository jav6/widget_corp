<?php
	define("DB_SERVER", "mysql");
	define("DB_USER", "root");
	define("DB_PASS", "root");
	define("DB_NAME", "widget_cms");

  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
