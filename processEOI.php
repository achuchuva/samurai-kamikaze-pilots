<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="description" content="Landing page for SKP Secret Key Productions">
    <meta name="author" content="Devarsh">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mobile.css">
    <title>SKP - Home</title>
</head>

<body>

    <div id="primary">
        <?php
        include 'navbar.inc';
        ?>

        <div class="process">


            <?php

            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                header("location: apply.php");
            }

            require_once("settings.php");

            $POSTCODE_REGEX = '/^[0-9]{4}+$/';
            $PHONE_REGEX = '/^[0-9]{8,12}$/';

            $eoi_table = "eoi";
            $address_table = "address";
            $skills_table = "eoi_skills";

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
                    // There is a row containing a result
                    return true;
                } else {
                    // No rows returned, the result is invalid
                    return false;
                }
            }

            function validate_date($date, $format = 'Y-m-d')
            {
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) === $date;
            }

            function calculate_age($date)
            {
                $today = date("Y-m-d");
                $diff = date_diff(date_create($date), date_create($today));
                return $diff->format('%y');
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
                $job_ref = $firstname = $lastname = $birthdate = $gender = $street = $suburb = $state = $postcode = $email = $phone = $skills = $other = NULL;
                $error_message = "";

                if (empty($_POST["reference-number"])) {
                    $error_message .= "<p>You haven't provided a job reference number.</p>";
                } else {
                    $job_ref = sanitise_input($_POST["reference-number"], $conn);
                    if (!validate_job_ref($job_ref, $conn)) {
                        $error_message .= "<p>The entered job reference number is invalid, please ensure it matches a particular job.</p>";
                    }
                }

                if (empty($_POST["given-name"])) {
                    $error_message .= "<p>You haven't provided a first name.</p>";
                } else {
                    $firstname = sanitise_input(($_POST["given-name"]), $conn);
                    if (strlen($firstname) > 20) {
                        $error_message .= "<p>The entered first name exceeds 20 characters.</p>";
                    }
                }

                if (empty($_POST["family-name"])) {
                    $error_message .= "<p>You haven't provided a family name.</p>";
                } else {
                    $lastname = sanitise_input(($_POST["family-name"]), $conn);
                    if (strlen($lastname) > 20) {
                        $error_message .= "<p>The entered family name exceeds 20 characters.</p>";
                    }
                }

                if (empty($_POST["birthdate"])) {
                    $error_message .= "<p>You haven't provided a birthdate.</p>";
                } else {
                    $birthdate = sanitise_input(($_POST["birthdate"]), $conn);
                    if (!validate_date($birthdate)) {
                        $error_message .= "<p>The entered birthdate doesn't match the expected format.</p>";
                    }
                    $age = calculate_age($birthdate);
                    if ($age < 10 || $age > 120) {
                        $error_message .= "<p>Enter an age between 10 and 120 years old.</p>";
                    }                
                }

                if (empty($_POST["gender"])) {
                    $error_message .= "<p>You haven't selected a gender.</p>";
                } else {
                    $gender = sanitise_input(($_POST["gender"]), $conn);
                }

                if (empty($_POST["street"])) {
                    $error_message .= "<p>You haven't entered a street.</p>";
                } else {
                    $street = sanitise_input(($_POST["street"]), $conn);
                    if (strlen($street) > 40) {
                        $error_message .= "<p>The entered street exceeds 40 characters.</p>";
                    }
                }

                if (empty($_POST["suburb"])) {
                    $error_message .= "<p>You haven't entered a suburb.</p>";
                } else {
                    $suburb = sanitise_input(($_POST["suburb"]), $conn);
                    if (strlen($suburb) > 40) {
                        $error_message .= "<p>The entered suburb exceeds 40 characters.</p>";
                    }
                }

                if (isset($_POST["state"])) {
                    $state = sanitise_input(($_POST["state"]), $conn);
                } else {
                    $error_message .= "<p>You haven't selected a state.</p>";
                }

                if (empty($_POST["postcode"])) {
                    $error_message .= "<p>You haven't entered a postcode.</p>";
                } else {
                    $postcode = sanitise_input(($_POST["postcode"]), $conn);
                    if (preg_match($POSTCODE_REGEX, $postcode) == 0) {
                        $error_message .= "<p>The entered postcode doesn't match the expected format XXXX.</p>";
                    } else {
                        $i = intval($postcode);
                        switch ($_POST["state"]) {
                            case "NSW":
                                if ($i < 1000 || ($i > 2599 && $i < 2619) || ($i > 2899 && $i < 2921) || $i > 2999) {
                                    $error_message .= "<p>The entered postcode isn't within the NSW region.</p>";
                                }
                                break;
                            case "ACT":
                                if ($i < 200 || ($i > 299 && $i < 2600) || ($i > 2618 && $i < 2900) || $i > 2920) {
                                    $error_message .= "<p>The entered postcode isn't within the ACT region.</p>";
                                }
                                break;
                            case "VIC":
                                if ($i < 3000 || ($i > 3999 && $i < 8000) || $i > 8999) {
                                    $error_message .= "<p>The entered postcode isn't within the VIC region.</p>";
                                }
                                break;
                            case "QLD":
                                if ($i < 4000 || ($i > 4999 && $i < 9000)) {
                                    $error_message .= "<p>The entered postcode isn't within the QLD region.</p>";
                                }
                                break;
                            case "SA":
                                if ($i < 5000 || $i > 5999) {
                                    $error_message .= "<p>The entered postcode isn't within the SA region.</p>";
                                }
                                break;
                            case "WA":
                                if ($i < 6000 || $i > 6999) {
                                    $error_message .= "<p>The entered postcode isn't within the WA region.</p>";
                                }
                                break;
                            case "TAS":
                                if ($i < 7000 || $i > 7999) {
                                    $error_message .= "<p>The entered postcode isn't within the TAS region.</p>";
                                }
                                break;
                            case "NT":
                                if ($i < 800 || $i > 999) {
                                    $error_message .= "<p>The entered postcode isn't within the NT region.</p>";
                                }
                                break;
                            default:
                                $error_message .= "<p>The selected state doesn't match the expected format.</p>";
                        }
                    }
                }

                if (empty($_POST["email"])) {
                    $error_message .= "<p>You haven't entered an email.</p>";
                } else {
                    $email = sanitise_input(($_POST["email"]), $conn);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error_message .= "<p>The entered email isn't valid.</p>";
                    }
                }

                if (empty($_POST["phone-num"])) {
                    $error_message .= "<p>You haven't entered a phone number.</p>";
                } else {
                    $phone = sanitise_input(($_POST["phone-num"]), $conn);
                    if (preg_match($PHONE_REGEX, $phone) == 0) {
                        $error_message .= "<p>The entered phone number isn't valid.</p>";
                    }
                }

                if (!empty($_POST["skills"])) {
                    $skills = $_POST["skills"];
                    foreach ($skills as &$skill) {
                        $skill = sanitise_input($skill, $conn);
                        $validation_query = "SELECT * FROM job_skills 
                        JOIN skills ON job_skills.skill_id = skills.skill_id 
                        JOIN jobs ON job_skills.job_id = jobs.job_id 
                        WHERE skills.skill_name = '$skill' AND jobs.job_ref = '$job_ref';";

                        $result = mysqli_query($conn, $validation_query);

                        if (mysqli_num_rows($result) == 0) {
                            // No rows returned, the result is invalid
                            $error_message .= "<p>The selected job skills don't match the job.</p>";
                            break;
                        }
                    }
                }

                $other = '';
                if (!empty($_POST["other-skills"])) {
                    if (!empty($_POST["other"])) {
                        $other = sanitise_input(($_POST["other"]), $conn);
                    } else {
                        $error_message .= "<p>You haven't provided a description of your other skills.</p>";
                    }
                }

                if (!empty($error_message)) {
                    echo "<h1 class='red'>There was an error processing your expression of interest</h1>";
                    echo $error_message;
                    echo '<br><a href="apply.php" class="button">RETURN TO FORM</a>';
                } else {
                    try {
                        $eoi_query = "CREATE TABLE IF NOT EXISTS eoi (
                            eoi_number INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            job_ref VARCHAR(5) NOT NULL,
                            first_name VARCHAR(20) NOT NULL, 
                            last_name VARCHAR(20) NOT NULL, 
                            email VARCHAR(64) NOT NULL,
                            phone VARCHAR(12) NOT NULL,
                            other_skills TEXT NULL,
                            status ENUM('New','Current','Final') NOT NULL);";
                        mysqli_query($conn, $eoi_query);
                        $eoi_query = "INSERT INTO `$eoi_table` (`job_ref`, `first_name`, `last_name`, `email`, `phone`, `other_skills`, `status`)
                            VALUES ('$job_ref', '$firstname', '$lastname', '$email', '$phone', '$other', 'New');";
                        $eoi_result = mysqli_query($conn, $eoi_query);
                        if (!$eoi_result) {
                            throw new Exception($eoi_query);
                        }

                        $eoi_number = mysqli_insert_id($conn);

                        $address_query = "CREATE TABLE IF NOT EXISTS address (
                            address_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            eoi_number INT NOT NULL,
                            street_address VARCHAR(40) NOT NULL,
                            suburb VARCHAR(40) NOT NULL,
                            state VARCHAR(3) NOT NULL,
                            postcode VARCHAR(4) NOT NULL,
                            FOREIGN KEY (eoi_number) REFERENCES eoi(eoi_number));";
                        mysqli_query($conn, $address_query);
                        $address_query = "INSERT INTO `$address_table` (`eoi_number`, `street_address`, `suburb`, `state`, `postcode`)
                        VALUES ('$eoi_number', '$street', '$suburb', '$state', '$postcode');";
                        $address_result = mysqli_query($conn, $address_query);
                        if (!$address_result) {
                            throw new Exception($address_query);
                        }

                        foreach ($skills as &$skill) {
                            $skills_query = "CREATE TABLE IF NOT EXISTS eoi_skills (
                                eoi_number INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                job_id INT NOT NULL,
                                skill_id INT NOT NULL,
                                FOREIGN KEY (eoi_number) REFERENCES eoi(eoi_number));";
                            mysqli_query($conn, $skills_query);
                            $skills_query = "INSERT INTO `$skills_table` (`eoi_number`, `job_id`, `skill_id`)
                        VALUES ('$eoi_number',
                        (SELECT job_id from jobs WHERE job_ref='$job_ref'),
                        (SELECT skill_id from skills WHERE skill_name='$skill'));";
                            $skills_result = mysqli_query($conn, $skills_query);
                            if (!$skills_result) {
                                throw new Exception($skills_query);
                            }
                        }

                        echo "<h1 class='green'>Thank you for submitting your expression of interest</h1>";
                        echo "<p>Your identification number is $eoi_number. We will review your application as soon as possible and we look forward to your career with SKP.</p>";
                        echo $error_message;
                    } catch (Exception $exc) {
                        echo "<h1 class='red'>There was an error processing your expression of interest</h1>";
                        echo "<p>Something went wrong with executing the query ", $exc->getMessage(), ".</p>";
                        echo '<br><a href="apply.php" class="button">RETURN TO FORM</a>';
                    }
                }

                mysqli_close($conn);
            }

            ?>

        </div>
    </div>

    <!-- Standard footer -->
    <?php
    include 'footer.inc';
    ?>

</body>

</html>