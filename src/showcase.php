<?php
    include "./connection.php";
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library | Showcase</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./showcase.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./assets/logo/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div id="loader"></div>

    <div id="header-nav">
        <div class="header-nav-cover">
            <h1>E-Library</h1>
            <div class="lists">
                <ul class="m-nav">
                    <li><a href="./books.php">Book</a></li>
                    <li><a href="./showcase.php">Showcase</a></li>
                    <li><a href="./curriculum.php">Curriculum</a></li>
                    <li><a href="./study.php">Study</a></li>
                    <li><a href="./userlogin.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div id="header">
            <div class="logo">
                <a href="../index.php" style="color:#000">
                    <h1>E-Library</h1>
                </a>
            </div>
            <div class="lists">
                <ul class="midscreen-display">
                    <li><a href="./books.php">Book</a></li>
                    <li><a href="./showcase.php">Showcase</a></li>
                    <li><a href="./curriculum.php">Curriculum</a></li>
                    <li><a href="./study.php">Study</a></li>
                </ul>
            </div>
            <div class="database">
                <button class="hamburger">☰</button>
            </div>
        </div>
    </header>



    <div id="project-cover">
        <div id="project">
            <div class="topic">
                <h1>Projects</h1>
                <div class="project-selector">
                    <ul>
                        <li class="active list" data="all">All</li>
                        <li class="list" data="ui">UI Design</li>
                        <li class="list" data="app">App Design</li>
                        <li class="list" data="com">E-Commerce</li>
                    </ul>
                </div>
            </div>
            <div class="project-grid">
                <div class="project-grid1 grid-common com">
                    <div class="project-image">
                        <img src="./assets/showcaseimg/ClaE-Commerce.png">
                    </div>
                    <div class="project-title">
                        <h3>Cla E-Commerce</h3>
                        <h4>Cla is an E-Commerce based website developed for providing goods and services to the end user securely.</h4>
                    </div>
                    <div class="project-code">
                        <button>Html</button>
                        <button>Css</button>
                        <button>Bootstrap</button>
                    </div>
                    <div class="view-option">
                        <a href="./assets/showcaseimg/ProjectsDemo/cla/index.html" target ="_blank">
                            <button>Preview</button>
                        </a>
                        <a href="./assets/showcaseimg/ProjectsDemo/cla/index.html" download="./assets/showcaseimg/ProjectsDemo/cla/index.html">
                            <button>Download</button>
                        </a>
                    </div>
                </div>
            <div class="project-grid2 grid-common app">
                <div class="project-image">
                    <img src="./assets/showcaseimg/mailappdesign.png">
                </div>
                <div class="project-title">
                    <h3>Mail App Design</h3>
                    <h4>Web Based Mail App Ui Design provided with user dashboard and many more functions. Used Variety of languages like listed.</h4>
                </div>
                <div class="project-code">
                    <button>Html</button>
                    <button>Css</button>
                    <button>JavaScript</button>
                </div>
                <div class="view-option">
                    <a href="./assets/showcaseimg/ProjectsDemo/mailappdesign.html" target ="_blank">
                        <button>Preview</button>
                    </a>
                    <a href="./assets/showcaseimg/ProjectsDemo/mailappdesign.html" download="./assets/showcaseimg/ProjectsDemo/mailappdesign.html">
                        <button>Download</button>
                    </a>
                </div>
            </div>
            <div class="project-grid3 grid-common ui">
                <div class="project-image">
                    <img src="./assets/showcaseimg/taskmanagementui.png">
                </div>
                <div class="project-title">
                    <h3>Task Management Dashboard</h3>
                    <h4>Task Management System Ui Design Dashboard for ease of use and access for the clients as well as for the management system.</h4>
                </div>
                <div class="project-code">
                    <button>Html</button>
                    <button>TailWind Css</button>
                    <button>JavaScript</button>
                </div>
                <div class="view-option">
                        <a href="./assets/showcaseimg/ProjectsDemo/taskmanagementui.html" target ="_blank">
                            <button>Preview</button>
                        </a>
                        <a href="./assets/showcaseimg/ProjectsDemo/taskmanagementui.html" download="./assets/showcaseimg/ProjectsDemo/taskmanagementui.html">
                            <button>Download</button>
                        </a>
                </div>
            </div>
            <div class="project-grid4 grid-common app">
                <div class="project-image">
                    <img src="./assets/showcaseimg/uxosappdesign.png">
                </div>
                <div class="project-title">
                    <h3>Uxos App Design</h3>
                    <h4>Uxos is an app design website that provides a interface to the end users about the mobile applications website.</h4>
                </div>
                <div class="project-code">
                    <button>Html</button>
                    <button>Css</button>
                    <button>JavaScript</button>
                    <button>JQuery</button>
                </div>
                <div class="view-option">
                    <a href="./assets/showcaseimg/ProjectsDemo/uxos/index.html" target ="_blank">
                        <button>Preview</button>
                    </a>
                    <a href="./assets/showcaseimg/ProjectsDemo/uxos/index.html" download="./assets/showcaseimg/ProjectsDemo/uxos/index.html">
                        <button>Download</button>
                    </a>
                </div>
            </div>
            <div class="project-grid5 grid-common ui">
                <div class="project-image">
                    <img src="./assets/showcaseimg/ourservices.png">
                </div>
                <div class="project-title">
                    <h3>Our Services Ui</h3>
                    <h4>Our Services Inspirational designs, illustrations, and graphic elements from the best designers. Want more inspiration?</h4>
                </div>
                <div class="project-code">
                    <button>Html</button>
                    <button>Css</button>
                </div>
                <!-- ./assets/showcaseimg/ProjectsDemo/ourservices.html -->
                <div class="view-option">
                    <a href="./assets/showcaseimg/ProjectsDemo/ourservices.html" target ="_blank">
                        <button>Preview</button>
                    </a>
                    <a href="./assets/showcaseimg/ProjectsDemo/ourservices.html" download=."assets/showcaseimg/ProjectsDemo/ourservices.html">
                    <button>Download</button>
                    </a>
                </div>
            </div>
                <div class="project-grid6 grid-common ">
                    <div class="project-image">
                        <img src="./assets/showcaseimg/socially.png">
                    </div>
                    <div class="project-title">
                        <h3>Socially</h3>
                        <h4>Socially is an web based social media platform where people can make friends and chat with each other with a easy user interface.</h4>
                    </div>
                    <div class="project-code">
                        <button>Html</button>
                        <button>Css</button>
                    </div>
                    <div class="view-option">
                        <a href="./assets/showcaseimg/ProjectsDemo/" target ="_blank">
                            <button>Preview</button>
                        </a>
                        <button>Download</button>
                    </div>
                </div>
            </div>
    </div>
</div>


<footer>
        <div id="footer">
            <div class="footer-about">
                <div class="footer-aboutus">
                    <h2>About Us</h2>
                    <ul>
                        <li>
                            Developers
                        </li>
                        <li>
                            Community
                        </li>
                        <li>
                            Help and Support
                        </li>
                        <li>
                            Blog
                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
                <div class="footer-books">
                    <h2>Books</h2>
                    <ul>
                        <li>Energize</li>
                        <li>FindingYourPassion</li>
                        <li>HistoricalFiction</li>
                        <li>Motivation</li>
                        <li>Parenting</li>
                        <li>Religion and Spirituality</li>
                    </ul>
                </div>
                <div class="footer-bookss">
                </div>
                <div class="footer-socialmedia">
                    <h2>Stay Connected</h2>
                    <ul>
                        <li>
                            <i class="fa fa-facebook"></i>
                        </li>
                        <li>
                            <i class="fa fa-linkedin"></i>
                        </li>
                        <li>
                            <i class="fa fa-twitter"></i>
                        </li>
                        <li>
                            <i class="fa fa-youtube-play"></i>
                        </li>
                        <li>
                            <i class="fa fa-github"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="copyright">
                <h1 style="font-size:2rem;">Find an issue with this page? <a href="https://github.com/kushalshakya/majorProject" target="_blank">Fix it on Github</a></h1>
                <h3>Need help? Email <span>librariansupervisior@gmail.com</span></h3>
                <div class="policies">
                    <ul>
                        <li>Privacy</li>
                        <li class="side">Use Of Cookies</li>
                        <li class="side">Website Details</li>
                        <li class="side">Accessibility</li>
                        <li class="side">Copyright</li>
                        <li class="side side-close">Terms Of Use</li>
                    </ul>
                </div>
                <div class="copyright-info">
                    <h2>&copy; 2022 E-Library. All rights reserved.</h2>
                </div>
            </div>
    </footer>

    <script src="./scripts/common.js" defer type="text/javascript"></script>
    <script>
        $(document).on("click", "#project .project-selector ul li", function(){
            $(this).addClass("active").siblings().removeClass("active");
        });

        $(document).ready(function(){
        $('.list').click(function(){
            const value = $(this).attr('data');
            if(value == 'all'){
                $('.grid-common').show('1000');
            }
            else{
                $('.grid-common').not('.'+value).hide('1000');
                $('.grid-common').filter('.'+value).show('1000');
            }
        })
    })
    </script>
</body>
</html>