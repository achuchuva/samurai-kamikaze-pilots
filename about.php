<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="author" content="Anton Chuchuva">
    <meta name="description" content="About the SKP Secret Key Productions team">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mobile.css">
    <title>SKP - About</title>
</head>

<body>
    <div id="primary">
    <?php
        include 'navbar.inc';
    ?>

        <!-- Group information as a definition list -->
        <section class="content">
            <!-- About page main heading -->
            <h1>About Our Company</h1>
            <hr>
            <br>
            <div class="about-info">
                <dl>
                    <dt>Group name:</dt>
                    <dd>Secret Key Productions</dd>

                    <dt>Group ID:</dt>
                    <dd>1</dd>

                    <dt>Tutor name:</dt>
                    <dd>Kaibin Wang</dd>

                    <dt>Course:</dt>
                    <dd>Computer Science</dd>

                    <dt>Email:</dt>
                    <dd>
                        <a
                            href="mailto:100225609@student.swin.edu.au?cc=104300597@student.swin.edu.au;104548805@student.swin.edu.au;104584362@student.swin.edu.au;104567729@student.swin.edu.au">
                            Our mailto link
                        </a>
                    </dd>
                </dl>
                <!-- Group photo within a figure -->
                <figure>
                    <img src="images/group.jpg" usemap="#group-photo" alt="Group photo">
                    <figcaption>The SKP Team - Click on our members to find out more!</figcaption>
                </figure>
                <map name="group-photo">
                    <area shape="rect" coords="282,115,331,260" href="#shandor" alt="Shandor">
                    <area shape="rect" coords="371,149,416,275" href="#william" alt="William">
                    <area shape="rect" coords="59,163,119,327" href="#amelie" alt="Amelie">
                    <area shape="rect" coords="175,141,223,282" href="#anton" alt="Anton">
                    <area shape="rect" coords="453,149,505,297" href="#devarsh" alt="Devarsh">
                </map>
            </div>
        </section>

    </div>

    <section id="secondary">
        <!-- Timetable -->
        <h2 class="centered">Our Timetable</h2>
        <table class="timetable">
            <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
            <tr>
                <td>8:00 - 9:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="tne">
                    TNE10006 <span class="timetable-info"> - Networks and Switching (Lecture)
                    Hawthorn ATC101</span>
                </td>
            </tr>
            <tr>
                <td>9:00 - 10:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="tne">
                    TNE10006<span class="timetable-info"> - Networks and Switching (Lecture)
                    Hawthorn ATC101</span>
                </td>
            </tr>
            <tr>
                <td>10:00 - 11:00</td>
                <td></td>
                <td class="cos">
                    COS10009<span class="timetable-info"> - Introduction to Programming (Lecture)
                    Hawthorn ATC101</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>11:00 - 12:00</td>
                <td></td>
                <td class="cos">
                    COS10009<span class="timetable-info"> - Introduction to Programming (Lecture)
                    Hawthorn ONLINE and ATC101</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>12:00 - 13:00</td>
                <td class="cos-inq">
                    COS10026<span class="timetable-info"> - Computing Technology Inquiry Project (Lecture)
                    Hawthorn ONLINE</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>13:00 - 14:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="cos-inq">
                    COS10026<span class="timetable-info"> - Computing Technology Inquiry Project (Class)
                    Hawthorn BA608</span>
                </td>
            </tr>
            <tr>
                <td>14:00 - 15:00</td>
                <td class="tne">
                    TNE10006<span class="timetable-info"> - Networks and Switching (Class)
                    Hawthorn ATC329</span>
                </td>
                <td class="cos-inq">
                    COS10026<span class="timetable-info"> - Computing Technology Inquiry Project (Workshop)
                    Hawthorn BA408</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>15:00 - 16:00</td>
                <td class="tne">
                    TNE10006<span class="timetable-info"> - Networks and Switching (Class)
                    Hawthorn ATC329</span>
                </td>
                <td class="cos-inq">
                    COS10026<span class="timetable-info"> - Computing Technology Inquiry Project (Workshop)
                    Hawthorn BA408</span>
                </td>
                <td></td>
                <td></td>
                <td class="cos">
                    COS10009<span class="timetable-info"> - Introduction to Programming (Class)
                    Hawthorn ATC625</span>
                </td>
            </tr>
            <tr>
                <td>16:00 - 17:00</td>
                <td class="tne">
                    TNE10006<span class="timetable-info"> - Networks and Switching (Class)
                    Hawthorn ATC329</span>
                </td>
                <td class="art">
                    ART10004<span class="timetable-info"> - Introduction to Game Studies (Class)
                    Hawthorn BA706</span>
                </td>
                <td></td>
                <td></td>
                <td class="cos">
                    COS10009<span class="timetable-info"> - Introduction to Programming (Class)
                    Hawthorn ATC625</span>
                </td>
            </tr>
            <tr>
                <td>17:00 - 18:00</td>
                <td></td>
                <td class="art">
                    ART10004<span class="timetable-info"> - Introduction to Game Studies (Class)
                    Hawthorn BA706</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>18:00 - 19:00</td>
                <td class="art">
                    ART10004<span class="timetable-info"> - Introduction to Game Studies (Lecture)
                    Hawthorn ATC101</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>19:00 - 20:00</td>
                <td class="art">
                    ART10004<span class="timetable-info"> - Introduction to Game Studies (Lecture)
                    Hawthorn ATC101</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <br>
        <!-- Group member descriptions-->
        <div class="flex-container">
            <div class="flexbox">
                <section id="shandor">
                    <h2>Shandor</h2>
                    Member email:

                    <a href="mailto:100225609@student.swin.edu.au">
                        100225609@student.swin.edu.au
                    </a>

                    <br>

                    <ul>
                        <li>24 year old, male with Australian and Hungarian parents</li>
                        <li>I've been working as a data analyst for a university for a year and a half now. I've also
                            done a
                            few personal projects in Unity.</li>
                        <li>Year and a half in industry</li>
                        <li>I try to spend my free time either programming or wrestling sweaty men (MMA). Sometimes it's
                            hard to tell which of those two hobbies is more socially acceptable.</li>
                    </ul>
                </section>

                <img src="images/shandor.jpg" alt="Shandor">
            </div>

            <div class="flexbox">
                <section id="william">
                    <h2>William</h2>
                    Member email:
                    <a href="mailto:104300597@student.swin.edu.au">
                        104300597@student.swin.edu.au
                    </a>
                    <br>

                    <ul>
                        <li>20 year old male from Northampton, England</li>
                        <li>Experience in basic HTML, CSS, Javascript, C++ and C#</li>
                        <li>Subway (2021), Rochford Wines (2022 - current)</li>
                        <li>Creator of "Lalo on da phone" on YouTube</li>
                    </ul>
                </section>

                <img src="images/william.jpg" alt="William">
            </div>

            <div class="flexbox">
                <section id="amelie">
                    <h2>Amelie</h2>
                    Member email:
                    <a href="mailto:104548805@student.swin.edu.au">
                        104548805@student.swin.edu.au
                    </a>
                    <br>

                    <ul>
                        <li>18 year old female Australian</li>
                        <li>Experience with Python, C#, HTML/CSS, experience in Unity</li>
                        <li>Working part-time at pub/hotel in the Yarra Valley</li>
                        <li>In my spare time I'm an animator / graphic design</li>
                    </ul>
                </section>

                <img src="images/amelie.jpg" alt="Amelie">
            </div>

            <div class="flexbox">
                <section id="anton">
                    <h2>Anton</h2>
                    Member email:
                    <a href="mailto:104584362@student.swin.edu.au">
                        104584362@student.swin.edu.au
                    </a>
                    <br>

                    <ul>
                        <li>17 year old male with Russian / Kazakhstanian parents.</li>
                        <li>
                            Couple years of experience in Unity, React and then random
                            languages like C, Python and CSS.
                        </li>
                        <li>Currently working part-time at a local cafe in Watsonia shops</li>
                        <li>
                            Check out my mobile game Squid Simulator on the IOS app store.
                            (Android didn't approve my game for some reason)
                        </li>
                    </ul>
                </section>

                <img src="images/anton.jpg" alt="Anton">
            </div>

            <div class="flexbox">
                <section id="devarsh">
                    <h2>Devarsh</h2>
                    Member email:
                    <a href="mailto:104567729@student.swin.edu.au">
                        104567729@student.swin.edu.au
                    </a>
                    <br>

                    <ul>
                        <li>18 year old with Indian parents</li>
                        <li>2 years of very basic HTML skills from highschool. I have done projects in Blender 3D and
                            created a 3rd person runner game on Unreal Engine.</li>
                        <li>2 years in Woolworths</li>
                        <li>I play video games competively; not good for my wellbeing and physical body but fortnite
                            fortnite.</li>
                    </ul>
                </section>

                <img src="images/devarsh.jpg" alt="Devarsh">
            </div>
        </div>
    </section>


    <!-- Standard footer -->
    <?php
        include 'footer.inc';
    ?>

</body>

</html>