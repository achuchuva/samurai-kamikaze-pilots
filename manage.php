<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Management Page" />
    <meta name="author" content="Amelie Kercher" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/mobile.css">
    <title>SKP - Management Portal</title>
</head>

<body>
    <div id="primary">

        <?php
        include 'navbar.inc';
        ?>

        <h1 class="centered">Welcome to the database, Manager.</h1>
        <form method="get" class="manage-form">
            <h3>Filter by applicant name</h3>
            <p><label for="first_name">First Name: </label>
                <input type="text" name="first_name" id="first_name" />
            </p>
            <p><label for="last_name">Last Name: </label>
                <input type="text" name="last_name" id="last_name" />
            </p>
            <h3>Filter by job reference</h3>
            <select name="job_ref">
                <?php
                require_once("settings.php");

                $conn = @mysqli_connect(
                    $host,
                    $user,
                    $pwd,
                    $sql_db
                );

                if ($conn) {
                    echo "<option value='none'>None Selected</option>";

                    $query = "SELECT * FROM `jobs`;";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=", $row["job_ref"], ">#", $row["job_ref"], " (", $row["job_title"], ")</option>";
                    }
                }
                ?>
            </select>
            <p><input type="submit" value="Search" /></p>
        </form>

        <form method="post" class="manage-form">
            <?php
            session_start();

            if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
                header("Location: login.php");
            }

            require_once("settings.php");
            $conn = @mysqli_connect(
                $host,
                $user,
                $pwd,
                $sql_db
            );

            // Update search query based on inputs from searching by job ref and applicant name
            $search_query = "";

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $job_ref = isset($_GET['job_ref']) ? $_GET['job_ref'] : "none";
                $firstname = isset($_GET['first_name']) ? $_GET['first_name'] : "";
                $lastname = isset($_GET['last_name']) ? $_GET['last_name'] : "";
                $search_query = " WHERE job_ref='$job_ref' AND first_name LIKE '%$firstname%' AND last_name LIKE '%$lastname%' ";
                if ($job_ref == "none") {
                    $search_query = " WHERE first_name LIKE '%$firstname%' AND last_name LIKE '%$lastname%' ";
                }
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $status_eois = $_POST["status"];
                if ($conn) {
                    foreach ($status_eois as &$status_update) {
                        $status_array = explode(",", $status_update);
                        $eoi_number = $status_array[0];
                        $status = $status_array[1];
                        $query = "UPDATE eoi SET status='$status' WHERE eoi_number='$eoi_number'";
                        mysqli_query($conn, $query);
                    }
                }

                if ($conn) {
                    if (isset($_POST["delete"])) {
                        $delete_eois = $_POST["delete"];
                        foreach ($delete_eois as $eoi_number) {
                            $skills_query = "DELETE FROM eoi_skills WHERE eoi_number='$eoi_number'";
                            mysqli_query($conn, $skills_query);
                            $address_query = "DELETE FROM address WHERE eoi_number='$eoi_number'";
                            mysqli_query($conn, $address_query);
                            $eoi_query = "DELETE FROM eoi WHERE eoi_number='$eoi_number'";
                            mysqli_query($conn, $eoi_query);
                        }
                    }
                }
            }

            // Checks if connection is successful
            if (!$conn) {
                // displays an error message 
                echo "<p>Database connection failure</p>";
            } else {
                // Upon successful connection 
                $sql_table = "eoi";

                // Set up the SQL command to query or add data into the table 
                $query = "SELECT * FROM eoi " .
                    $search_query .
                    "ORDER BY eoi_number";

                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                } else if (mysqli_num_rows($result) > 0) {
                    echo "<table class=\"db-table\">\n";
                    echo "<tr>\n"
                        . "<th scope=\"col\">EOI number</th>\n"
                        . "<th scope=\"col\">Job reference</th>\n"
                        . "<th scope=\"col\">First name</th>\n"
                        . "<th scope=\"col\">Last name</th>\n"
                        . "<th scope=\"col\">Street address</th>\n"
                        . "<th scope=\"col\">Suburb</th>\n"
                        . "<th scope=\"col\">State</th>\n"
                        . "<th scope=\"col\">Postcode</th>\n"
                        . "<th scope=\"col\">Email</th>\n"
                        . "<th scope=\"col\">Phone</th>\n"
                        . "<th scope=\"col\">Skills</th>\n"
                        . "<th scope=\"col\">Other skills</th>\n"
                        . "<th scope=\"col\">Status</th>\n"
                        . "<th scope=\"col\">Delete</th>\n"
                        . "</tr>\n";

                    // Retrieve current record pointed by the result pointer
                    while ($row = mysqli_fetch_assoc($result)) {
                        $eoi_number = $row["eoi_number"];

                        $address_query = "SELECT * FROM address WHERE eoi_number='$eoi_number'";
                        $address_result = mysqli_query($conn, $address_query);

                        $skills = [];
                        $skills_query = "SELECT skill_name FROM skills WHERE skill_id IN (SELECT skill_id FROM eoi_skills WHERE eoi_number='$eoi_number')";
                        $skills_result = mysqli_query($conn, $skills_query);

                        echo "<tr>\n ";
                        echo "<td>", $row["eoi_number"], "</td>\n ";
                        echo "<td>", $row["job_ref"], "</td>\n ";
                        echo "<td>", $row["first_name"], "</td>\n ";
                        echo "<td>", $row["last_name"], "</td>\n ";
                        while ($address_row = mysqli_fetch_assoc($address_result)) {
                            echo "<td>", $address_row["street_address"], "</td>\n ";
                            echo "<td>", $address_row["suburb"], "</td>\n ";
                            echo "<td>", $address_row["state"], "</td>\n ";
                            echo "<td>", $address_row["postcode"], "</td>\n ";
                        }
                        echo "<td>", $row["email"], "</td>\n ";
                        echo "<td>", $row["phone"], "</td>\n ";
                        echo "<td><ul>";
                        while ($skill = mysqli_fetch_array($skills_result)) {
                            echo "<li>", $skill["skill_name"], "</li>";
                        }
                        echo "</ul></td>\n";
                        echo "<td>", $row["other_skills"], "</td>\n ";
                        $status = $row["status"];
                        switch ($status) {
                            case "New":
                                $opt_1 = "Current";
                                $opt_2 = "Final";
                                break;
                            case "Current":
                                $opt_1 = "New";
                                $opt_2 = "Final";
                                break;
                            case "Final":
                                $opt_2 = "New";
                                $opt_1 = "Current";
                                break;
                        }
                        echo "<td>
                        <select name='status[]' id='status'>
                            <option value='$eoi_number,$status' selected='selected'>$status</option>
                            <option value='$eoi_number,$opt_1'>$opt_1</option>
                            <option value='$eoi_number,$opt_2'>$opt_2</option>
                        </select>
                    </td>\n ";
                        echo "<td><input type='checkbox' id='delete' name='delete[]' value='$eoi_number'></td>\n ";
                        echo "</tr>\n ";
                    }

                    echo "</table>\n";
                } else {
                    echo "<p>No records were found</p>";
                }
                mysqli_close($conn);
            }
            ?>
            <p><input type="submit" value="Delete/Update table entries" /></p>
        </form>
    </div>

    <!-- Standard footer -->
    <?php
    include 'footer.inc';
    ?>
</body>

</html>