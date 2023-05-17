<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
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
                            <label for="a-reference-number">Number - Please enter your 5 digit reference number</label>
                            <input type="text" name="reference-number" id="a-reference-number" placeholder="12345" pattern="[0-9]{5}"
                                required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <!-- Personal info -->
                        <legend>Personal Details</legend>
                        <!-- First name -->
                        <div class="form-section">
                            <label for="a-given-name">Given Name</label>
                            <input name="given-name" id="a-given-name" type="text" placeholder="Given name"
                                maxlength="20" required>
                        </div>
                        <!-- Last name -->
                        <div class="form-section">
                            <label for="a-family-name">Family Name</label>
                            <input name="family-name" id="a-family-name" type="text" placeholder="Family name"
                                maxlength="20" required>
                            <br>
                        </div>
                        <!-- DOB date -->
                        <!-- DOB validation-> https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date -->
                        <div class="form-section">
                            <label for="a-birthdate">Date of Birth</label>
                            <input name="birthdate" id="a-birthdate" type="date" min="1900-01-01" max="2023-01-01"
                                required>
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
                                <option value="vic">Victoria</option>
                                <option value="nsw">New South Whales</option>
                                <option value="tas">Tasmania</option>
                                <option value="sa">South Australia</option>
                                <option value="wa">Western Australia</option>
                                <option value="nt">Northern Territory</option>
                                <option value="act">Australian Captial Territory</option>
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
                            <input type="text" name="phone-num" id="a-phone-num"
                                pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"
                                required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>About You</legend>
                        <!-- Skills info -->
                        <p>Please select all of the following that apply to you:</p>
                        <br>
                        <!-- Checkbox inputs checkbox -->
                        <label for="a-vector">
                            <input type="checkbox" name="skills[]" value="vector" id="a-vector">
                            Vector Drawing
                        </label>
                        <label for="a-raster">
                            <input type="checkbox" name="skills[]" value="raster" id="a-raster">
                            Raster Drawing
                        </label>
                        <label for="a-animation">
                            <input type="checkbox" name="skills[]" value="animation" id="a-animation">
                            Animation
                        </label>
                        <label for="a-render">
                            <input type="checkbox" name="skills[]" value="render" id="a-render">
                            Three Dimensional Rendering
                        </label>

                        <!-- Other skills checkbox -->
                        <label for="a-other">
                            <input type="checkbox" name="skills[]" value="other" id="a-other" checked>
                            Other skills (please elaborate below)
                        </label>
                        <!-- Other skills textarea -->
                        <br>
                        <textarea rows="20" cols="70" name="other"
                            placeholder="Tell us about yourself... Please mention any prior experience"></textarea>
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
                            <input type="text" name="reference-number" id="p-reference-number" placeholder="12345" pattern="[0-9]{5}"
                                required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <!-- Personal info -->
                        <legend>Personal Details</legend>
                        <!-- First name -->
                        <div class="form-section">
                            <label for="p-given-name">Given Name</label>
                            <input name="given-name" id="p-given-name" type="text" placeholder="Given name"
                                maxlength="20" required>
                        </div>
                        <!-- Last name -->
                        <div class="form-section">
                            <label for="p-family-name">Family Name</label>
                            <input name="family-name" id="p-family-name" type="text" placeholder="Family name"
                                maxlength="20" required>
                            <br>
                        </div>
                        <!-- DOB date -->
                        <!-- DOB validation -> https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date -->
                        <div class="form-section">
                            <label for="p-birthdate">Date of Birth</label>
                            <input name="birthdate" id="p-birthdate" type="date" min="1900-01-01" max="2023-01-01"
                                required>
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
                                <option value="vic">Victoria</option>
                                <option value="nsw">New South Whales</option>
                                <option value="tas">Tasmania</option>
                                <option value="sa">South Australia</option>
                                <option value="wa">Western Australia</option>
                                <option value="nt">Northern Territory</option>
                                <option value="act">Australian Captial Territory</option>
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
                            <input type="text" name="phoneNum" id="p-phone-num"
                                pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"
                                required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>About You</legend>
                        <!-- Skills info -->
                        <p>Please select all of the following that apply to you:</p>
                        <br>
                        <!-- Checkbox inputs checkbox -->
                        <label for="p-python">
                            <input type="checkbox" name="skills[]" value="python" id="p-python">
                            Python
                        </label>
                        <label for="p-javascript">
                            <input type="checkbox" name="skills[]" value="javascript" id="p-javascript">
                            JavaScript
                        </label>
                        <label for="p-C#">
                            <input type="checkbox" name="skills[]" value="c#" id="p-C#">
                            C#
                        </label>
                        <label for="p-unity">
                            <input type="checkbox" name="skills[]" value="unity" id="p-unity">
                            Unity
                        </label>

                        <!-- Other skills checkbox -->
                        <label for="p-other">
                            <input type="checkbox" name="skills[]" value="other" id="p-other" checked>
                            Other skills (please elaborate below)
                        </label>
                        <!-- Other skills textarea -->
                        <br>
                        <textarea rows="20" cols="70" name="other"
                            placeholder="Tell us about yourself... Please mention any prior experience"></textarea>
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