<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta name="keywords" content="HTML, CSS"> <!-- Should we add PHP to all of these? -->
    <meta name="author" content="Amile Kercher">
    <meta name="description" content="SKP manage page">
    <link rel="stylesheet" href="styles/manage.css">
    <title>SKP - Log In</title>
</head>
<body>
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

</body>

</html>