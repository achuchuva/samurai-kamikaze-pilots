<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="description" content="Apply for work with SKP Secret Key Productions">
    <meta name="author" content="Amelie Kercher">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mobile.css">
    <title>SKP - Apply</title>
</head>

<body>

    <div id="primary">

        <?php
        include 'navbar.inc';
        ?>

        <section class="content">
            <h1>Apply for a job with SKP</h1>
            <hr>
            <h3>Which advertised job are you applying for today?</h3>
            <!-- Create internal page jumpto/hyperlinks to both forms -->
            <div>
                <a class="button" href="#animator-pos">
                    GAME ANIMATOR
                </a>
                <a class="button" href="#programmer-pos">
                    GAME PROGRAMMER
                </a>
            </div>
        </section>

    </div>

    <section id="secondary">

        <h1>Apply Today</h1>

        <div id="animator-pos">
            <!-- Form heading -->
            <form method="post" action="processEOI.php" novalidate="novalidate">
                <fieldset>
                    <legend>Game Animator Position Application</legend>
                    <!-- Reference number 5 alphanum-->
                    <fieldset>
                        <legend>Job reference number</legend>
                        <div class="form-section">
                            <label for="a-reference-number">Number</label>
                            <input type="text" name="reference-number" id="a-reference-number" placeholder="12345" list="ref-nums" pattern="[0-9]{5}" required>
                            <?php
                            require_once("settings.php");

                            $conn = @mysqli_connect(
                                $host,
                                $user,
                                $pwd,
                                $sql_db
                            );

                            if ($conn) {
                                $query = "SELECT `job_ref` FROM `jobs`;";
                                $result = mysqli_query($conn, $query);

                                echo "<datalist id='ref-nums'>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option>", $row["job_ref"], "</option>";
                                }
                                echo "</datalist>";
                            }
                            ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <!-- Personal info -->
                        <legend>Personal Details</legend>
                        <!-- First name -->
                        <div class="form-section">
                            <label for="a-given-name">Given Name</label>
                            <input name="given-name" id="a-given-name" type="text" placeholder="Given name" maxlength="20" required>
                        </div>
                        <!-- Last name -->
                        <div class="form-section">
                            <label for="a-family-name">Family Name</label>
                            <input name="family-name" id="a-family-name" type="text" placeholder="Family name" maxlength="20" required>
                            <br>
                        </div>
                        <!-- DOB date -->
                        <!-- DOB validation-> https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date -->
                        <div class="form-section">
                            <label for="a-birthdate">Date of Birth</label>
                            <input name="birthdate" id="a-birthdate" type="date" min="1900-01-01" max="2023-01-01" required>
                            <br>
                        </div>
                        <!-- Gender radio -->
                        <div class="form-section">
                            <label for="a-male" class="gender">
                                <input type="radio" name="gender" id="a-male" value="Male" required checked>
                                Male
                            </label>
                            <label for="a-female" class="gender">
                                <input type="radio" name="gender" id="a-female" value="Female">
                                Female
                            </label>
                            <label for="a-nonbinary" class="gender">
                                <input type="radio" name="gender" id="a-nonbinary" value="Non-Binary">
                                Non-Binary
                            </label>
                            <label for="a-other" class="gender">
                                <input type="radio" name="gender" id="a-other" value="Other">
                                Prefer not to specify
                            </label>
                            <br>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Locational Information</legend>
                        <!-- Address info -->
                        <!-- Street address -->
                        <div class="form-section">
                            <label for="a-street">Street address</label>
                            <input type="text" name="street" id="a-street" maxlength="40" required>
                            <br>
                        </div>
                        <!-- Suburb/town -->
                        <div class="form-section">
                            <label for="a-suburb">Suburb/Town</label>
                            <input type="text" name="suburb" id="a-suburb" maxlength="40" required>
                            <br>
                        </div>
                        <!-- State dropdown -->
                        <div class="form-section">
                            <label for="a-state">State</label>
                            <select id="a-state" name="state" required>
                                <option value="" disabled selected>Select your option</option>
                                <option value="VIC">Victoria</option>
                                <option value="NSW">New South Whales</option>
                                <option value="TAS">Tasmania</option>
                                <option value="SA">South Australia</option>
                                <option value="WA">Western Australia</option>
                                <option value="NT">Northern Territory</option>
                                <option value="ACT">Australian Captial Territory</option>
                            </select>
                            <br>
                        </div>
                        <!-- Postcode number -->
                        <div class="form-section">
                            <label for="a-postcode">Postcode</label>
                            <input type="text" name="postcode" id="a-postcode" pattern="[0-9]{4}" required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <!-- Contact info -->
                        <!-- Email address email -->
                        <div class="form-section">
                            <label for="a-email">Email address</label>
                            <input type="email" name="email" id="a-email" placeholder="yourname@email.com" required>
                            <br>
                        </div>
                        <!-- Phone number -->
                        <div class="form-section">
                            <label for="a-phone-num">Phone number - no spaces</label>
                            <input type="text" name="phone-num" id="a-phone-num" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>About You</legend>
                        <!-- Skills info -->
                        <p>Please select all of the following that apply to you:</p>
                        <br>
                        <!-- Checkbox inputs checkbox -->
                        <?php
                        require_once("settings.php");

                        $conn = @mysqli_connect(
                            $host,
                            $user,
                            $pwd,
                            $sql_db
                        );

                        $job_ref = "343GA";

                        if ($conn) {
                            $query = "SELECT `skill_id` FROM `job_skills`
                                    WHERE `job_id`=(SELECT `job_id` FROM `jobs` WHERE `job_ref`='$job_ref');";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $skill_id = $row["skill_id"];
                                $skills_query = "SELECT `skill_name` FROM `skills` WHERE `skill_id`=$skill_id";
                                $skills_result = mysqli_query($conn, $skills_query);

                                while ($skills_row = mysqli_fetch_assoc($skills_result)) {
                                    echo "<label for='p-", $skills_row["skill_name"], "'>";
                                    echo "<input type='checkbox' name='skills[]' value='", $skills_row["skill_name"], "'> ", $skills_row["skill_name"];
                                    echo "</label>";
                                }
                            }
                        }
                        ?>

                        <!-- Other skills checkbox -->
                        <label for="a-other">
                            <input type="checkbox" name="other-skills" value="other-skills" id="a-other">
                            Other skills (please elaborate below)
                        </label>

                        <!-- Other skills textarea -->
                        <br>
                        <textarea rows="20" cols="70" name="other" placeholder="Tell us about yourself... Please mention any prior experience"></textarea>
                    </fieldset>
                    <!-- Apply button use POST -->
                    <input type="submit" value="Apply">
                </fieldset>
            </form>
            <br>
        </div>


        <div id="programmer-pos">
            <!-- Form heading -->
            <form method="post" action="processEOI.php" novalidate="novalidate">
                <fieldset>
                    <legend>Game Programmer Position Application</legend>
                    <!-- Reference number 5 alphanum-->
                    <fieldset>
                        <legend>Job reference number</legend>
                        <div class="form-section">
                            <label for="p-reference-number">Number</label>
                            <input type="text" name="reference-number" id="p-reference-number" list="ref-nums" placeholder="12345" pattern="[0-9]{5}" required>
                            <?php
                            require_once("settings.php");

                            $conn = @mysqli_connect(
                                $host,
                                $user,
                                $pwd,
                                $sql_db
                            );

                            if ($conn) {
                                $query = "SELECT `job_ref` FROM `jobs`;";
                                $result = mysqli_query($conn, $query);

                                echo "<datalist id='ref-nums'>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option>", $row["job_ref"], "</option>";
                                }
                                echo "</datalist>";
                            }
                            ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <!-- Personal info -->
                        <legend>Personal Details</legend>
                        <!-- First name -->
                        <div class="form-section">
                            <label for="p-given-name">Given Name</label>
                            <input name="given-name" id="p-given-name" type="text" placeholder="Given name" maxlength="20" required>
                        </div>
                        <!-- Last name -->
                        <div class="form-section">
                            <label for="p-family-name">Family Name</label>
                            <input name="family-name" id="p-family-name" type="text" placeholder="Family name" maxlength="20" required>
                            <br>
                        </div>
                        <!-- DOB date -->
                        <!-- DOB validation -> https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date -->
                        <div class="form-section">
                            <label for="p-birthdate">Date of Birth</label>
                            <input name="birthdate" id="p-birthdate" type="date" min="1900-01-01" max="2023-01-01" required>
                            <br>
                        </div>
                        <!-- Gender radio -->
                        <div class="form-section">
                            <label for="p-male" class="gender">
                                <input type="radio" name="gender" id="p-male" value="Male" required checked>
                                Male
                            </label>
                            <label for="p-female" class="gender">
                                <input type="radio" name="gender" id="p-female" value="Female">
                                Female
                            </label>
                            <label for="p-nonbinary" class="gender">
                                <input type="radio" name="gender" id="p-nonbinary" value="Non-Binary">
                                Non-Binary
                            </label>
                            <label for="p-other" class="gender">
                                <input type="radio" name="gender" id="p-other" value="Other">
                                Prefer not to specify
                            </label>
                            <br>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Locational Information</legend>
                        <!-- Address info -->
                        <!-- Street address -->
                        <div class="form-section">
                            <label for="p-street">Street address</label>
                            <input type="text" name="street" id="p-street" maxlength="40" required>
                            <br>
                        </div>
                        <!-- Suburb/town -->
                        <div class="form-section">
                            <label for="p-suburb">Suburb/Town</label>
                            <input type="text" name="suburb" id="p-suburb" maxlength="40" required>
                            <br>
                        </div>
                        <!-- State dropdown -->
                        <div class="form-section">
                            <label for="p-state">State</label>
                            <select id="p-state" name="state" required>
                                <option value="" disabled selected>Select your option</option>
                                <option value="VIC">Victoria</option>
                                <option value="NSW">New South Whales</option>
                                <option value="TAS">Tasmania</option>
                                <option value="SA">South Australia</option>
                                <option value="WA">Western Australia</option>
                                <option value="NT">Northern Territory</option>
                                <option value="ACT">Australian Captial Territory</option>
                            </select>
                            <br>
                        </div>
                        <!-- Postcode number -->
                        <div class="form-section">
                            <label for="p-postcode">Postcode</label>
                            <input type="text" name="postcode" id="p-postcode" pattern="[0-9]{4}" required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <!-- Contact info -->
                        <!-- Email address email -->
                        <div class="form-section">
                            <label for="p-email">Email address</label>
                            <input type="email" name="email" id="p-email" pattern="youremail@email.com" required>
                            <br>
                        </div>
                        <!-- Phone number -->
                        <div class="form-section">
                            <label for="p-phone-num">Phone number</label>
                            <input type="text" name="phone-num" id="p-phone-num" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>About You</legend>
                        <!-- Skills info -->
                        <p>Please select all of the following that apply to you:</p>
                        <br>
                        <!-- Checkbox inputs checkbox -->
                        <?php
                        require_once("settings.php");

                        $conn = @mysqli_connect(
                            $host,
                            $user,
                            $pwd,
                            $sql_db
                        );

                        $job_ref = "256GP";

                        if ($conn) {
                            $query = "SELECT `skill_id` FROM `job_skills`
                                    WHERE `job_id`=(SELECT `job_id` FROM `jobs` WHERE `job_ref`='$job_ref');";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $skill_id = $row["skill_id"];
                                $skills_query = "SELECT `skill_name` FROM `skills` WHERE `skill_id`=$skill_id";
                                $skills_result = mysqli_query($conn, $skills_query);

                                while ($skills_row = mysqli_fetch_assoc($skills_result)) {
                                    echo "<label for='p-", $skills_row["skill_name"], "'>";
                                    echo "<input type='checkbox' name='skills[]' value='", $skills_row["skill_name"], "'> ", $skills_row["skill_name"];
                                    echo "</label>";
                                }
                            }
                        }
                        ?>

                        <!-- Other skills checkbox -->
                        <label for="p-other">
                            <input type="checkbox" name="other-skills" value="other-skills" id="p-other">
                            Other skills (please elaborate below)
                        </label>

                        <!-- Other skills textarea -->
                        <br>
                        <textarea rows="20" cols="70" name="other" placeholder="Tell us about yourself... Please mention any prior experience"></textarea>
                    </fieldset>
                    <!-- Apply button use POST -->
                    <input type="submit" value="Apply">
                </fieldset>
            </form>
            <br>
        </div>


    </section>

    <!-- Standard footer -->
    <?php
    include 'footer.inc';
    ?>
</body>

</html>