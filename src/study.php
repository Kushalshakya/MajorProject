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
    <title>E-Library | Study</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/logo/android-chrome-512x512.png">
    <link rel="stylesheet" href="./utils.css">
</head>
<body>
    <div id="loader"></div>
    <a href="#">
        <i class="fa fa-angle-double-up fa-3x" id="arrow"></i>
    </a>

    <!-- Navigation Header for Mobiles & Tablets -->
    <div id="header-nav">
        <div class="header-nav-cover">
            <a href="../index.php" style="color:#000">
                <h1>E-Library</h1>
            </a>
            <div class="lists">
                <ul class="m-nav">
                    <li><a href="./books.php">Book</a></li>
                    <li><a href="./showcase.php">Showcase</a></li>
                    <li><a href="./curriculum.php">Curriculum</a></li>
                    <li><a href="./study.php">Study</a></li>
                    <li><a href="./userlogin.php">Login</a></li>
                </ul>
            </div>
            <!-- We will be making this dynamic by using php and mysql later on -->
            <!-- <div class="user-status">
                <h2>KushalShakya</h2><br>
                <h3><i class="fa fa-sign-out"></i><span>Logout</span></h3>
            </div> -->
        </div>
    </div>

    <!-- Header -->
    <header>
        <div id="header">
            <div class="logo">
                <a href="../index.php" style="color:#000;">
                <h1>E-Library</h1></a>
            </div>
            <div class="lists">
                <ul class="midscreen-display">
                    <li><a href="./books.php">Book</a></li>
                    <li><a href="./showcase.php">Showcase</a></li>
                    <li><a href="./curriculum.php">Curriculum</a></li>
                    <li><a href="./study.php">Study</a></li>
                </ul>
            </div>
            <?php
                if(isset($_SESSION['login_user'])){
                    ?>
                    <a href="./src/sessionuser_end.php">
                        <?php
                            echo $_SESSION['login_user'];
                        ?>
                    </a>
                    <?php
                }
                else{
                    ?>
                        <div class="database">
                            <button class="hamburger">☰</button>
                        </div>
                    <?php
                }
            ?>
        </div>
        <div class="login_page lg">
            <div class="login_cover">
                <form action="" method="post">
                    <div class="top">
                        <h1>How would you like to continue?</h1>
                        <i class="fa fa-close close"></i>
                    </div>
                    <div class="mid">
                        <div class="user">
                            <input type="email" placeholder="Email Address" spellcheck="false" autocomplete="off" required name="email">
                        </div>
                        <div class="pass">
                            <input type="password" placeholder="Password" spellcheck="false" autocomplete="off" required name="password">
                        </div>
                    </div>
                    <div class="authorization">
                        <div class="a1">
                            <input type="checkbox" checked>
                            <span>Keep me signed in?</span>
                        </div>
                        <div class="a2">
                            <h3>Forgot Password?</h3>
                        </div>
                    </div>
                    <div class="login_btn">
                        <button name="login">Log in</button>
                        <h3>Don't have an account? <span class="login_side"><a href="#" style="color : #1354A9;">Sign Up</a></span></h3>
                    </div>
                    <div class="guest">
                        <a href="./admin.php"><h2>Continue as Admin</h2></a>
                    </div>
                    <div class="login_text">
                        <h2>New User?</h2><br>
                        <h3>By logging in to your account on an e-library, you can gain access to a wealth of knowledge and information that can help you with your studies, research, or personal interests.</h3>
                    </div>
                </form>
            </div>
        </div>

        <?php
            if(isset($_POST['login'])){
                $content_connect = mysqli_query($db,"SELECT * from `users` WHERE email='$_POST[email]' && password='$_POST[password]';");
                $count = 0;
                $count = mysqli_num_rows($content_connect);
                if($count == 0){
                    ?>
                    <div id='login-error'>
                        <h2>Username or Password doesn't match</h2>
                    </div>
                <?php
                }
                else{
                    if($content_connect){
                        $_SESSION['login_user'] = $_POST['email'];
                        echo "<script>window.location.href = '../index.php'</script>";
                    }
                }
            }
        ?>
        <div class="signup_page ss">
            <div class="signup_cover">
                <div class="top">
                        <h1>Create an account</h1>
                        <i class="fa fa-close close_register"></i>
                    </div>
                <form action="#" method="post">
                    <div class="mid">
                        <div class="user">
                            <input type="text" placeholder="Username" spellcheck="false" autocomplete="off" required name="username">
                        </div>
                        <div class="phonenumber">
                            <input type="number" placeholder="Phone Number" spellcheck="false" autocomplete="off" required name="phonenumber">
                        </div>
                        <div class="email">
                            <input type="email" placeholder="Email Address" spellcheck="false" autocomplete="off" required name="email">
                        </div>
                        <div class="dob">
                            <input type="date" spellcheck="false" autocomplete="off" required name="dob">
                        </div>
                        <div class="pass">
                            <input type="password" placeholder="Password" spellcheck="false" autocomplete="off" required name="password">
                        </div>
                    </div>
                    <div class="signup_btn">
                        <button name="register" style="cursor:pointer;">Register</button>
                        <h2 class="cypertext"></h2>
                        <h4 style="color:red;cursor:pointer;" class="generate">Generate a secured password</h4>
                        <h3>Already have an account? <span class="back_side"><a href="#" style="color : #1354A9;">Log in</a></span></h3>
                    </div>
                </form>
                    <div class="guest">
                        <a href="./admin.php"><h2>Continue as Admin</h2></a>
                    </div>
            </div>
        </div>
    </header>
    <?php
        if(isset($_POST['register'])){
            mysqli_query($db, "INSERT INTO `users` VALUES ('','$_POST[username]','$_POST[phonenumber]','$_POST[email]','$_POST[dob]','$_POST[password]');");
            echo "<script>window.location.href = '../index.php'</script>";
        }
    ?>
    
    <div id="date">
        <div class="date-cover">
            <ul>
                <li class="month"></li>
                <li class="datetime" style="margin : 0px 8px;"></li>
                <li class="year" style="margin-right : 8px;"></li>
                <li class="datehour" style="margin : 0px 4px;"></li>
                <li class="dateminute" style="margin-right : 4px;"></li>
                <li class="datesecond"></li>
                <li class="ampm"></li>
            </ul>
        </div>
    </div>


    <div id="pomodoro-timer">
        <div class="pomodoro-cover">
            <div class="pomodoro-list">
                <p class="pomo-active">Focus</p>
                <p class="">Break</p>
                <p class="">Cycles</p>
            </div>
            <div class="pomodoro-counter">
                <div class="work-timer">
                </div>
            </div>
            <div class="pomodoro-buttons">
                <h3 class="start">Start Timer</h3>
                <div class="buttons-cover">
                    <h3 class="stop">STOP</h3>
                    <h3 class="reset">RESET</h3>
                </div>
            </div>
        </div>
    </div>

    <div id="todo-error">
        <h2>Invalid entry. Please try again with a valid entry</h2>
    </div>
    <div id="todo">
        <div class="todo-cover">
            <h1>To Do list</h1>
            <div class="list">
                <ul class="ullist">
                    <li>30min Focus</li>
                    <li>Exam Prep</li>
                    <li>Presentation</li>
                    <li>Roadmap</li>
                    <li>7:30 Class</li>
                </ul>
            </div>
            <div class="enter">
                <input type="text" class="userinput">
                <!-- autofocus -->
                <button class="addlist">Add Item</button>
                <button class="hidelist">Hide List</button>
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

<script src="./scripts/common.js" defer type="text/javascript"></script>
<script src="./scripts/study.js" defer type="text/javascript"></script>
</body>
</html>