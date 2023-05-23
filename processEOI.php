<?php

require_once("settings.php");

$conn = @mysqli_connect($host,
  $user,
  $pwd,
  $sql_db
);

// Checks if connection was successful
if (!$conn) {
  // Connection was not successful
  echo "<p>Database connection failure</p>";
} else {
  // Enter SQL queries and validation here
  echo "<p>Hello and welcome to the database!</p>";
}


?>