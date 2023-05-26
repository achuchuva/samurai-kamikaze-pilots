<!DOCTYPE html>
<HTML lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="description" content="Enhancements to the SKP web page">
    <meta name="author" content="Anton Chuchuva">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mobile.css">
    <title>SKP - Enhancements</title>
</head>

<body>

    <div id="primary">
    <?php
        include 'navbar.inc';
    ?>

        <section class="content">
            <h1>Enhancements</h1>
            <hr>
            <br>
            <!-- Buttons for scrolling down to the enhancements -->
            <div>
                <a class="button" href="#image-map">
                    THE IMAGE MAP
                </a>
                <a class="button" href="#collapsible-menu">
                    COLLAPSIBLE MENU
                </a>
            </div>
        </section>

    </div>

    <!-- -->
    <section id="secondary">
        <div id="image-map">
            <h2>The Image Map</h2>
            <p>
                <a href="./about.html">Link to the enhancement</a>
            </p>
            <h3>What is it</h3>
            <p>
                This feature allows certain areas of an image to become clickable and essentially behave as &lt;a&gt;
                tags. In this case the image map was used to make the faces of members of our group to be clickable and
                upon interaction scroll the user to the individual description of the group member.
            </p>
            <h3>Going beyond basic requirements</h3>
            <p>
                This custom navigation increases the interactivity and usability of the website by providing a flexible
                way to create interactive and engaging user interfaces. With the image map users have another way to
                navigate around the lengthy About page that may be easier and more intuitive especially on mobile
                devices where scrolling is not always made apparent by the website.
            </p>
            <h3>The code involved</h3>
            <p>
                Adding a usemap atrribute to an image enables it to be manipulated by the HTML map element. Inside the
                map tags are area elements which specify the type of the shape the clickable area is, its coordinates in
                pixels relative to the image size and a href attribute that links that area to a separate page or an
                element on the current page.
            </p>
            <h3>References</h3>
            <p>
                <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/map">The Image Map element - HTML:
                    HyperText Markup Language</a>
            </p>
        </div>
        <div id="collapsible-menu">
            <h2>Collapsible Menu</h2>
            <p>
                <a href="#top">Link to the enhancement</a>
            </p>
            <h3>What is it</h3>
            <p>
                The collapsible menu appears after the screen width shrinks below 700px as a hamburger menu icon that
                can be pressed to unravel the nav bar in a compressed format.
            </p>
            <h3>Going beyond basic requirements</h3>
            <p>
                This feature was implemented entirely using CSS and goes beyond simply adding reflow to the page. The
                collapsible menu caters towards mobile users specifically where the dropdown format of the nav bar not
                only looks visually more appealing but also is typically the expected format of menus on devices with a
                small screen width.
            </p>
            <h3>The code involved</h3>
            <p>
                Media queries used on a separate CSS file (mobile.css) allow the menu to only appear at a certain screen
                width threshold. Selectors for the nav bar restyle the menu to instead be in columns and only have
                visible display when the user has toggled the button and disabled when the user closes the menu.
            </p>
            <h3>References</h3>
            <p>
                <a href="https://www.w3schools.com/howto/howto_js_collapse_sidebar.asp">How To Create a Collapsed
                    Sidebar</a>
            </p>
        </div>

    </section>

    <!-- Standard footer -->
    <?php
        include 'footer.inc';
    ?>

</body>