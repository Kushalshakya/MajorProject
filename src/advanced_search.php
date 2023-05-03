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
    <title>E-Library | Advanced Search</title>
    <link rel="stylesheet" href="./books.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/logo/android-chrome-512x512.png">
</head>
<style>
    /* Loader */
    #loader{
        background: #FFF url('./assets/loader.gif') no-repeat center center;
        background-size : 25%;
        width : 100%;
        height : 100vh;
        z-index : 999;
        position : fixed;
    }
    @media(max-width : 768px){
        #loader{
            background-size : 60%;
        }
    }
</style>
<body>
    <div id="loader"></div>
    <header>
        <div id="header">
            <div class="logo">
                <a href="../index.php">
                    <h1>E-Library</h1>
                </a>
            </div>
            <div class="search">
                <input type="search" placeholder="Search for books by keyword / title / author / ISBN">
                <div class="search_query">
                    <button>Search</button>
                    <button>Advanced Search</button>
                </div>
            </div>
        </div>
    </header>
    <div id="categories-bar">
        <div class="bar-cover">
            <ul>
                <li>Read by Categories</li>
                <li>Best Summaries</li>
                <li>New Releases</li>
                <li>FAQS</li>
            </ul>
        </div>
    </div>
    <div id="advanced-search">
        <div class="advanced-cover">
            <a href="./books.php"><i class="fa fa-close advance-close"></i></a>
            <h1>Advanced Search</h1>
            <h3>Please enter something into the fields below to start a search</h3>
            <div class="search-form">
                <div class="form1">
                    <h2>Keyword</h2>
                    <input type="text">
                </div>
                <div class="form2">
                    <h2>Title</h2>
                    <input type="text">
                </div>
                <div class="form3">
                    <h2>Author</h2>
                    <input type="text">
                </div>
                <div class="form4">
                    <h2>Publisher</h2>
                    <input type="text">
                </div>
                <div class="form5">
                    <h2>ISBN</h2>
                    <input type="text">
                </div>
                <div class="form6">
                    <h2>Language</h2>
                    <input type="text">
                </div>
            </div>
            <button class="btn_search">Search</button>
        </div>
        <div class="newsletter">
            <div class="cover">
                <img src="assets/newsletter.svg">
                <h2>Get new books updates and notification.</h2>
                <input type="email">
                <button>Get in touch</button>
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
                <h1>Find an issue with this page? <a href="https://github.com/kushalshakya/majorProject" target="_blank">Fix it on Github</a></h1>
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

    <script src="./scripts/common.js" type="text/javascript"></script>
</body>
</html>