<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Manager login page for SKP">
    <meta name="author" content="Devarsh">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mobile.css">
    <title>SKP - Manager Login</title>
</head>

<body>

    <div id="primary">
        <form action="login.php" method="post">

            <h2>LOGIN</h2>

            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>

            <?php } ?>

            <label>User Name</label>

            <input type="text" name="uname" placeholder="User Name"><br>

            <label>Password</label>

            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit">Login</button>

        </form>
    </div>

    <!-- Standard footer -->
    <?php
    include 'footer.inc';
    ?>

</body>

</html>