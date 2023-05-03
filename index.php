<?php
    include "./src/connection.php";
    date_default_timezone_set('Asia/Kathmandu');
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="E-Library Management System">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MYSQL">
    <title>E-Library</title>
    <link rel="stylesheet" href="src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="src/assets/logo/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<style>
    #login-error{
        font-family : 'Poppins', sans-serif;
        position : fixed;
        bottom : 10px;
        left : 10px;
        padding : 10px;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        font-size : 9px;
        background-color : red;
        display : none;
        display : block;
        transition : all .5s ease-in-out;
    }
    #login-error h2{
        color : #fff;
        font-weight: 400;
    }
    #error-user{
        font-family : 'Poppins', sans-serif;
        position : fixed;
        bottom : 10px;
        left : 10px;
        padding : 10px;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        font-size : 9px;
        background-color : red;
        display : none;
        display : block;
        transition : all .5s ease-in-out;
    }
    #error-user h2{
        color : #fff;
        font-weight: 400;
    }
    #login-success{
        font-family : 'Poppins', sans-serif;
        position : absolute;
        bottom : 10px;
        left : 10px;
        padding : 10px;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        font-size : 9px;
        background-color : #1354A9;
        /* display : block; */
        display : none;
        transition : all .5s ease-in-out;
    }
    #login-success h2{
        color : #fff;
        font-weight: 400;
    }
</style>
<body>
    <div id="loader"></div>
    <a href="#">
        <i class="fa fa-angle-double-up fa-3x" id="arrow"></i>
    </a>

    <!-- Navigation Header for Mobiles & Tablets -->
    <div id="header-nav">
        <div class="header-nav-cover">
            <h1>E-Library</h1>
            <div class="lists">
                <ul class="m-nav">
                    <li><a href="src/books.php">Book</a></li>
                    <li><a href="src/showcase.php">Showcase</a></li>
                    <li><a href="src/curriculum.php">Curriculum</a></li>
                    <li><a href="src/study.php">Study</a></li>
                    <li><a href="src/userlogin.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div id="header">
            <div class="logo">
                <h1>E-Library</h1>
            </div>
            <div class="lists">
                <ul class="midscreen-display">
                    <li><a href="src/books.php">Book</a></li>
                    <li><a href="src/showcase.php">Showcase</a></li>
                    <li><a href="src/curriculum.php">Curriculum</a></li>
                    <li><a href="src/study.php">Study</a></li>
                </ul>
            </div>
            <?php
                if(isset($_SESSION['login_user'])){
                    ?>
                    <a href="./src/sessionuser_end.php">
                        <?php
                            echo "<h2 style='font-size:20px;'>" . $_SESSION['login_user'] . "</h2>";
                        ?>
                    </a>
                    <?php
                }
                else{
                    ?>
                        <div class="database">
                            <button class="btnlg">Login</button>
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
                        <a href="src/admin.php"><h2>Continue as Admin</h2></a>
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
                if($count == 1 ){
                    $ftch = mysqli_fetch_assoc($content_connect);
                    // print_r($ftch);
                    if($ftch['status'] == 0){
                        ?>
                            <div id='login-error'>
                                <h2>Not Approved Yet! Please try again later.</h2>
                            </div>
                            <?php
                            // header("Location: ./study.php");
                    }
                else{
                    $_SESSION['login_user'] = $ftch['username'];
                    header("Location: ./src/books.php");
                }
                }
                
                 else{
                        ?>
                            <div id="login-error">
                                <h2>Username or Password doesn't match</h2>
                            </div>
                        <?php
                    // header("Location: ./index.php");
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
                        <input type="text" name="datetime" value="<?php echo date('M d, Y g:i a');?>" style="display:none">
                    </div>
                    <div class="signup_btn">
                        <button name="register" style="cursor:pointer;">Register</button>
                        <h2 class="cypertext"></h2>
                        <h4 style="color:red;cursor:pointer;" class="generate">Generate a secured password</h4>
                        <h3>Already have an account? <span class="back_side"><a href="#" style="color : #1354A9;">Log in</a></span></h3>
                    </div>
                </form>
                    <div class="guest">
                        <a href="src/admin.php"><h2>Continue as Admin</h2></a>
                    </div>
            </div>
        </div>
    </header>
    <?php
        $statusnum = 0;
        if(isset($_POST['register'])){
            $query="INSERT INTO `users` VALUES ('','$_POST[username]','$_POST[phonenumber]','$_POST[email]','$_POST[dob]','$_POST[password]',$statusnum,'$_POST[datetime]')";
            // print_r($query);
            $checker = mysqli_query($db, $query);
            if(!$checker){
                ?>
                <div id="login-error">
                    <h2>Oops! Something went wrong. Please try again later.</h2>
                </div>                
                <?php
            }
            else{
                ?>
                <div id="login-success">
                    <h2>Your account registration has been successful!</h2>
                </div>                
                <?php
            }
        }
    ?>

    <div id="main-content">
        <div class="content-container">
            <h1>Unleash the power of learning<br>with our all-in-one e-library platform</h1>
            <p>offering endless possibilities for discovery, engagement and growth</p>
            <div class="main-search">
                <i class="fa fa-search search-icon"></i>
                <input type="text" placeholder="Looking for a book">
                <i class="fa fa-angle-right search-right"></i>
            </div>
            <!-- <img src="./src/assets/extra.png" alt="" style="width:100%;padding-top:30px;padding-bottom:50px;"> -->
        </div>
    </div>

    <div id="feature">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,288L48,250.7C96,213,192,139,288,138.7C384,139,480,213,576,208C672,203,768,117,864,96C960,75,1056,117,1152,117.3C1248,117,1344,75,1392,53.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg> -->
        <div class="feature-container" style="margin-top : 80px;">
            <div class="featureinfo">
                <h3>Elevating Learning</h3>
                <h1>Get Quality Education</h1>
                <p>With a focus on developing students critical thinking and problem-solving skills<br/>We brought you a website that is inclusive and culturally responsive, and the use of modern<br>technology and teaching methods to enhance the learning experience</p>
            </div>
            <div class="featurebox">
                <div class="flexboxfeature1 flexboxfeature" data-aos="fade-up" data-aos-duration="2000">
                    <img src="src\assets\courses.svg" alt="feature-img" />
                    <h2>24 / 7 Active</h2>
                    <div class="line"></div>
                    <p>24/7 Active E-Library</p>
                </div>
                <div class="flexboxfeature2 flexboxfeature" data-aos="fade-down" data-aos-duration="2000">
                    <img src="src\assets\expert.svg" alt="feature-img" />
                    <h2>Explore</h2>
                    <div class="line"></div>
                    <p>Your Guide to New Content & Resources</p>
                </div>
                <div class="flexboxfeature3 flexboxfeature unique"  data-aos="fade-up" data-aos-duration="2000">
                    <img src="src\assets\lab.svg" alt="feature-img" />
                    <h2>Resources</h2>
                    <div class="line lineunique"></div>
                    <p class="punique">Projects, Arts & different resources for free</p>
                </div>
                <div class="flexboxfeature4 flexboxfeature" data-aos="fade-down" data-aos-duration="2000">
                    <img src="src\assets\access.svg" alt="feature-img" />
                    <h2>Lifetime access</h2>
                    <div class="line"></div>
                    <p>Unlimited, permanent access to a resource or service.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="features">
        <div class="feature-cover">
            <div class="feature-grid">
                <div class="feature1 grid-feature" data-aos="fade-right" data-aos-duration="1000">
                    <img src="src/assets/feature1.svg" alt="feature-img">
                    <h2>Digital</h2>
                    <p>The Future of Libraries:<br>Navigating the Digital E-Library</p>
                    <!-- <button>Learn more <span><i class="fa fa-arrow-right"></i></span></button> -->
                </div>
                <div class="feature2 grid-feature"  data-aos="fade-right" data-aos-duration="1000">
                    <img src="src/assets/feature2.svg" alt="feature-img">
                    <h2>E-Resources</h2>
                    <p>Access to various e-resources such<br>as books, notes and question papers.</p>
                    <!-- <button>Learn more <span><i class="fa fa-arrow-right"></i></span></button> -->
                </div>
                <div class="feature3 grid-feature" data-aos="fade-right" data-aos-duration="1000">
                    <img src="src/assets/feature3.svg" alt="feature-img">
                    <h2>Personalization</h2>
                    <p>Users can create an account and<br>save their preferences.</p>
                    <!-- <button>Learn more <span><i class="fa fa-arrow-right"></i></span></button> -->
                </div>
                <div class="feature4 grid-feature" data-aos="fade-left" data-aos-duration="1000">
                    <img src="src/assets/feature4.svg" alt="feature-img">
                    <h2>Community feature</h2>
                    <p>Users can interact with<br>librarians through chat<br></p>
                    <!-- <button>Learn more <span><i class="fa fa-arrow-right"></i></span></button> -->
                </div>
                <div class="feature5 grid-feature" data-aos="fade-left" data-aos-duration="1000">
                    <img src="src/assets/feature5.svg" alt="feature-img">
                    <h2>Preference</h2>
                    <p>Personalizing Your E-Library<br>Experience</p>
                    <!-- <button>Learn more <span><i class="fa fa-arrow-right"></i></span></button> -->
                </div>
                <div class="feature6 grid-feature" data-aos="fade-left" data-aos-duration="1000">
                    <img src="src/assets/feature6.svg" alt="feature-img">
                    <h2>No Time Constraints</h2>
                    <p>Breaking Free from Time Constraints<br>Unlimited Access to E-Library</p>
                    <!-- <button>Learn more <span><i class="fa fa-arrow-right"></i></span></button> -->
                </div>
            </div>
        </div>
    </div>


    <div id="images-example">
        <div class="example-cover">
            <div class="example-header">
                <!-- <h1>One platform, endless possibilities</h1>            -->
                <h1>Accessible Anytime, Anywhere</h1>
                <!-- <button>See more examples <span><i class="fa fa-arrow-right"></i></span></button> -->
            </div>
            <div class="examples-images">
                <div class="image-box1 image-box">
                    <img src="src/assets/img1-min.webp" alt="images">
                    <h2>A service that provides "new books every day" for free without a subscription</h2>
                </div>
                <div class="image-box2 image-box">
                    <img src="src/assets/img2-min.webp" alt="images" class="imgfit">
                    <h2>It is a great way to make learning more engaging and interactive</h2>
                </div>
                <div class="image-box3 image-box">
                    <img src="src/assets/img3-min.webp" alt="images" class="imgfit">
                    <h2>Digital collection of books and other materials that can be accessed online.</h2>
                </div>
                <div class="image-box4 image-box">
                    <img src="./src/assets/img44.jpg" alt="images" class="imgfit">
                    <h2>Books, Study notes question papers and many more</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="testimonials-cover">
        <div id="testimonials">
            <!-- <div class="image">
                <img src="bxs-message-alt-dots.svg" class="comment">
            </div> -->
            <div class="description">
                <h1>What our users are saying</h1>
            </div>
            <div class="testi">
                <div class="grid1 grid" data-aos="fade-up" data-aos-duration="1000">
                    <h2>"As a busy college student, the library website has been a lifesaver for me. I can easily search for and reserve books, as well as access online resources for research, I can study efficiently without having to physically go to the library all the time."</h2>
                    <h3>Emily</h3>
                </div>
                <div class="grid2 grid" data-aos="fade-down" data-aos-duration="1000">
                    <h2>"The library website has made it possible for me to access a wide variety of books and other resources from the comfort of my own home. It's been a great way for me to continue learning and expanding my knowledge, even with a busy schedule."</h2>
                    <h3>Sarah</h3>
                </div>
                <div class="grid3 grid" data-aos="fade-up" data-aos-duration="1000">
                    <h2>"I've always loved visiting the library to browse the shelves and find new books to read. However, the pandemic made it difficult for me to go out as much as I used to. The library website has been a fantastic resource for me to continue accessing new books and materials."</h2>
                    <h3>John</h3>
                </div>
                <div class="grid4 grid" data-aos="fade-down" data-aos-duration="1000">
                    <h2>"As a high school student, I often have to complete assignments and projects that require me to access certain resources or materials. The library website has made it so easy for me to find and access the resources I need."</h2>
                    <h3>Rachel</h3>
                </div>
                <div class="grid5 grid" data-aos="fade-up" data-aos-duration="1000">
                    <h2>"The website is well-organized and easy to navigate, and I've been able to find exactly what I'm looking for every time. It's been a great resource for me, and I'm grateful to have it available."</h2>
                    <h3>Kyle</h3>
                </div>
                <div class="grid6 grid" data-aos="fade-down" data-aos-duration="1000">
                    <h2>"As a busy professional, I don't always have time to visit the library in person. The library website has made it possible for me to access books, resources, and materials from my office or on the go."</h2>
                    <h3>Jessica</h3>
                </div>
            </div>
        </div>
    </div>



    <div id="newsletter">
        <div class="subscribe">
            <form method="post" action="#">
                <h3>Newsletter</h3>
                <input type="email" id="email" name="email" placeholder="Email" required autocomplete="off" spellcheck="false">
                <button name="subscribe">SUBSCRIBE</button>
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST["subscribe"])){
            mysqli_query($db,"INSERT INTO `newsletter` VALUES ('','$_POST[email]');");
        }
    ?>

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
    <script src="./src/scripts/index.js" defer type="text/javascript"></script>
    <script src="./src/scripts/common.js" defer type="text/javascript"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>