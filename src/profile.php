<?php
    date_default_timezone_set('Asia/Kathmandu');
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
    <title>E-Library | Profile</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./assets/logo/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
                    <li><a href="#">Community</a></li>
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
                    <li><a href="#">Community</a></li>
                    <li><a href="./curriculum.php">Curriculum</a></li>
                    <li><a href="./study.php">Study</a></li>
                </ul>
            </div>
            <div class="database">
                <button class="hamburger">☰</button>
            </div>
        </div>
    </header>

    <div id="profile-details">
        <div class="profile-container">

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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>