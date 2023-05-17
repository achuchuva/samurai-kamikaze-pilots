<?php

require_once("settings.php");

function sanitise_input($data, $conn)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_escape_string($conn, $data);
  return $data;
}

function validate_job_ref($ref, $conn)
{
  $query = "SELECT * FROM jobs WHERE job_ref='$ref'";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) != 0) {
    # There is a row containing a result
    return true;
  } else {
    # No rows returned, the result is invalud
    return false;
  }
}

$conn = @mysqli_connect(
  $host,
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

  var_dump($_POST);

  $job_ref = $firstname = $lastname = $birthdate = $gender = $street = $suburb = $postcode = $email = $phone = $skills = $other = NULL;
  $error_message = "";

  if (isset($_POST["reference-number"])) {
    $job_ref = sanitise_input($_POST["reference-number"], $conn);
    if (!validate_job_ref($job_ref, $conn)) {
      $error_message += "<p>The entered job reference number is invalid, please ensure it matches a particular job</p><br>";
    }
  } else {
    $error_message += "<p>You haven't provided a job reference number.</p><br>";
  }

  if (isset($_POST["given-name"])) {
    $firstname = sanitise_input(($_POS["given-name"]), $conn);
    if (strlen($firstname) > 20) {
      $error_message += "<p>The entered first name exceeds 20 characters.</p><br>";
    }
  } else {
    $error_message += "<p>You haven't provided a first name.</p><br>";
  }

  if (isset($_POST["family-name"])) {
    $lastname = sanitise_input(($_POS["family-name"]), $conn);
    if (strlen($lastname) > 20) {
      $error_message += "<p>The entered family name exceeds 20 characters.</p><br>";
    }
  } else {
    $error_message += "<p>You haven't provided a family name.</p><br>";
  }

  if (isset($_POST["birthdate"])) {
    $firstname = sanitise_input(($_POS["birthdate"]), $conn);
    if (strlen($firstname) > 40) {
      $error_message += "<p>The entered first name exceeds 40 characters.</p><br>";
    }
  } else {
    $error_message += "<p>You haven't provided a first name.</p><br>";
  }
}
