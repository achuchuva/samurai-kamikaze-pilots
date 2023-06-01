<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="description" content="Login for the manager web page">
    <meta name="author" content="Anton Chuchuva">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mobile.css">
    <title>SKP - Login</title>
</head>

<body>

    <div id="primary">

        <?php
        include 'navbar.inc';
        ?>

        <!-- Index section -->
        <div class="index-content">
            <section>
                <h2>Manage Login Form</h2>
                <form method="post" class="login-form" novalidate="novalidate">
                    <div class="container">
                        <p><label for="username">Username</label>
                            <input type="text" placeholder="Enter Username" name="username" required>
                        </p>

                        <p><label for="password">Password</label>
                            <input type="password" placeholder="Enter Password" name="password" required>
                        </p>

                        <input type="submit" value="Login" />

                        <?php
                            session_start();

                            if (isset($_SESSION['empty_username']) && $_SESSION["empty_username"]) {
                                echo "<p class='error-message'>You haven't entered a username</p>";
                            } else if (isset($_SESSION['empty_password']) && $_SESSION["empty_password"]) {
                                echo "<p class='error-message'>You haven't entered a password</p>";
                            } else if (isset($_SESSION['wrong_credentials']) && $_SESSION["wrong_credentials"]) {
                                echo "<p class='error-message'>The entered credentials are incorrect</p>";
                            }
                        ?>
                    </div>
                </form>
            </section>
        </div>

    </div>

    <?php

    session_start();

    require_once('settings.php');

    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['empty_username'] = false;
        $_SESSION['empty_password'] = false;
        $_SESSION['wrong_credentials'] = false;

        $entered_username = sanitise_input($_POST["username"]);
        $entered_password = sanitise_input($_POST["password"]);

        if (empty($entered_username)) {
            $_SESSION['empty_username'] = true;
            header("location: login.php");
        } else if (empty($entered_password)) {
            $_SESSION['empty_password'] = true;
            header("location: login.php");
        } else if (strcmp($entered_username, $user) == 0 && strcmp($entered_password, $pwd) == 0) {
            $_SESSION['loggedin'] = true;
            header("location: manage.php");
        } else {
            $_SESSION['wrong_credentials'] = true;
            header("location: login.php");
        }
    }

    ?>

    <!-- Standard footer -->
    <?php
    include 'footer.inc';
    ?>
</body>

</html>