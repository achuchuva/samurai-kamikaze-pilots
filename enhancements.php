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
                <a class="button" href="#management-window">
                    MANAGEMENT WINDOW
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
        <div id="management-window">
            <h2>Management Window</h2>
            <p>
                <a href="#top">Link to the enhancement</a>
            </p>
            <h3>What is it</h3>
            <p>
                The management window is opened via a link in the navbar. It links to a new window, which displays the management
                page, from which the user can log into the database and view all of the database tables.
            </p>
            <h3>Going beyond basic requirements</h3>
            <p>
                This feature allows for ease of access to the management page, allowing the page manager to view the page without
                needing to open it in a new tab. It means that while managing the site, the manager can view the database in a seperate
                window.<br />
                All-in-all, the feature is simply a quality-of-life feature, which means that the user spends less time organising their
                windows while managing the database.
            </p>
            <h3>The code involved</h3>
            <p>
                The code to link to the management page is only slightly different to a normal "a href" link. within the navbar.inc, a link
                to the manageme page has been added: <a href="manage.php" onclick="window.open(this.href, '_blank', 'width=500,height=500'); return false;">manage</a>
                The attribute "onclick="window.open(this.href, '_blank', 'width=500,height=500'); return false;" tells the link to open in
                another window, rather than the same tab. <br />
                On top of this, styling has been added in order to have the login link sit underneath the SKP logo: <br />
                .manage-link { <br />
                color: #DFE4E7; <br />
                position: absolute; <br />
                top: 67px; <br/>
                padding-left: 22px; <br/>
                } <br />
                <br/>
                As well as styling for the mobile version of the page, in order to have the link move with the SKP logo to the right side: <br/>
                .manage-link { <br/>
                position: absolute; <br/>
                right: 35px; <br/>
                } <br/>
            </p>
        </div>

    </section>

    <!-- Standard footer -->
    <?php
    include 'footer.inc';
    ?>

</body>