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

        <!-- Index section -->
        <div class="index-content">
            <section>
                <h2>
                    <strong>
                        Secret <br>
                        Key <br>
                        Productions
                    </strong>
                </h2>

                <br>

                <p>
                    Welcome to our website! We are thrilled that you have decided to apply for a position with
                    us. Head on over to our "APPLY" section which is designed to make the application process for
                    potential game programmers
                    and animators as smooth and simple as possible, so that you can easily
                    submit your information and be considered for a position with our company.
                </p>
                <p>
                    If you are wondering who specifically we are looking to hire, you'll find information in the "JOBS"
                    section.
                    We value our employees and are always looking for talented individuals to join our team.
                </p>
                <p>
                    Thank you for considering us as your potential employer and we look forward to reviewing
                    your application.
                </p>
                <a href="https://www.youtube.com/watch?v=6bJt4Fd_mwk">Link to group video</a>
                <br>
                <br>
                <a class="button" href="#footer">
                    REACH OUT
                </a>
            </section>

            <figure>
                <img src="images/home-page.jpeg" alt="Welcome page image">
                <figcaption>Find your dream career with SKP!</figcaption>
            </figure>
        </div>
    </div>

    <!-- Standard footer -->
    <?php
        include 'footer.inc';
    ?>

</body>

</html>