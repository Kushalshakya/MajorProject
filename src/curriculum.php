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
    <title>E-Library | Curriculum</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./assets/logo/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    /* #EBF0EF */
    #curriculum{
        font-family : 'Poppins', sans-serif;
        /* background-color: #EBF0EF; */
    }
    #curriculum h1{
        font-size : 30px;
        margin-bottom : 20px;
    }
    .cover{
        background-color: #EBF0EF;
        padding : 30px 0px;

    }
    .curriculum-container{
        width : 90%;
        margin : auto;
    }
    .curriculum-search{
        display : flex;
        flex-wrap : wrap;
        flex-direction : row;
        gap : 20px;
    }
    input{
        font-family : 'Poppins', sans-serif;
        width : 340px;
        height : 35px;
        outline : none;
        padding-left : 10px;
        border : 1px solid rgba(0,0,0,0.3)
    }
    button{
        width : 100px;
        height : 35px;
        border : 1px solid rgba(0,0,0,0.3);
        font-family : 'Poppins', sans-serif;
        cursor : pointer;
    }
    button:nth-child(1){
        margin : 0px 10px;
    }
    .question-container{
        width : 90%;
        margin : auto;
        display : grid;
        padding : 40px 0px;
        grid-template-columns: repeat(auto-fill,minmax(360px,1fr));
        gap : 50px;
    }
    .common{
        /* width : 400px; */
        height : 200px;
        background-color: #fff;
        padding : 10px 15px;
        /* border : 1px solid red; */
        box-shadow: 4px 4px 6px rgba(0,0,0,0.1);
        /* box-shadow: 4px 4px 6px #eee; */
    }
    .common p{
        color : blue;
        /* width : 120px; */
        /* text-align : center; */
        padding : 5px;
        margin-top : 20px;
        border-radius : 20px;
        font-size : 15px;
    }
    .common button{
        margin-top : 30px;
        margin-bottom : 10px;
    }
    h2{
        font-size : 18px;
        color : #3498DB;
    }
    h5{
        font-size : 18px;
        color : #3498DB;
        color : #000;
        margin : 40px 0px 10px 80px;
    }
    #help{
        align-items : center;
        display : flex;
        position : fixed;
        bottom : 0;
        right : 10px;
        font-family : 'Poppins' , sans-serif;
        border : 2px solid #15A7FF;
        border-radius : 5px 5px 0px 0px;
        z-index : 99;
    }
    #help:hover{
        cursor : pointer;
    }
    #help h1{
        font-size : 13px;
        padding : 5px 13px 5px 13px;
        color : #FDFCFD;
        background-color : #15A7FF;
        font-weight : 500;
    }
    #help i{
        font-size : 14px;
        background-color : #0293EA;
        color : #FDFCFD;
        padding: 7.8px 10px 7.4px 10px;
        font-weight : 400;
    }
    #donate-popup {
        width : 80%;
        height : 0vh;
        opacity : 0;
        position : fixed;
        top : 50%;
        left : 50%;
        transform : translate(-50%,-50%);
        z-index : 81;
        font-family : 'Poppins', sans-serif;
        background-color : #f2f2f2;
        border-raidius : 12px;
        transition : all .5s ease-in-out;
    }
    #donate-popup.active {
        height : 90vh;
        opacity : 1;
    }
    #donate-popup p{
        width : 60%;
        margin : auto;
        text-align : center;
        font-size : 18px;
        font-weight : 600;
        padding : 0px 15px 0px 25px;
    }
    #donate-popup h4{
        text-align : center;
        font-size : 28px;
        font-weight : 600;
        margin : 100px 15px 0px 25px;
    }
    #donate-popup i{
        position : fixed;
        right : 10px;
        top : 25px;
        font-size : 18px;
        color : red;
        cursor : pointer;
    }
    #donate-popup .donation-container{
        width : 90%;
        height : 60vh;
        margin : auto;
        border: 1px solid red;
    }
    #donate-popup .donation-form{
        height : 50vh;
        display : flex;
        flex-direction : column;
        align-items : center;
        justify-content: center;
        gap : 20px;
    }
    #donate-popup input{
        border : none;
        padding : 5px 5px 5px 10px;
        outline : none;
        font-family : 'Poppins', sans-serif;

    }
    #donate-popup button{
        font-size : 18px;
        border : none;
        outline : none;
        width : 200px;
        height : 50px;
        font-weight : 600;
        text-transform : uppercase;
        padding : 10px;
    }
    #donate-popup input[type="file"]{   
        font-size : 20px;
    }
</style>
<body>
    <div id="loader"></div>
    
    <!-- Donate Us -->
    <div id="help">
        <i class="fa fa-heart"></i>
        <h1>Donate Us</h1>
    </div>
    <div id="donate-popup">
        <i class="fa fa-close"></i>
        <h4>Sharing is Caring</h4>
        <p>Donating your class notes can help other students learn and succeed, while also improving your own understanding and retention of the material.</p>
        <div class="donate-container">
            <form method="post" class="donation-form">
                <input name="donate_topic" type="text" placeholder="Note Topic" required spellcheck="false" autocomplete="off" class="tst">
                <input name="donate_faculty" type="text" placeholder="Faculty" required spellcheck="false" autocomplete="off">
                <input name="donate_file" type="file" required>
                <input type="text" name="datetime" value="<?php echo date('M d, Y g:i a');?>" style="display:none">
                <button name="donate">Donate Us</button>
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['donate'])){
            mysqli_query($db , "INSERT INTO `donate` VALUES ('','$_POST[donate_topic]','$_POST[donate_faculty]','$_POST[donate_file]','$_POST[datetime]');");
            echo "<script>alert('Success')</script>";
            header("Location: ./curriculum.php");
        }
    ?>

    <!-- End -->

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

    <div id="curriculum">
        <div class="cover">
            <div class="curriculum-container">
                <h1>Study Notes & Question papers</h1>
                <div class="curriculum-search">
                    <form action="" method="post">
                        <input type="text" placeholder="Search notes & questions" name="result_search" autocomplete="off" spellcheck="false">
                        <button name="search_question">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $db = mysqli_connect("localhost","root","","elibrary");
            $search_for = "SELECT * FROM `papers` WHERE id = 1";
            $sp = mysqli_query($db,$search_for);
            $extra = mysqli_query($db,"SELECT * FROM `papers` WHERE id >= 2 AND id <= (SELECT MAX(id) from papers)");

            if(isset($_POST['search_question'])){
                $storing = mysqli_query($db,"SELECT * FROM `papers` WHERE name LIKE'%$_POST[result_search]%'");
                if(mysqli_num_rows($storing) == 0){
                    ?><h2 style="text-align:center;margin-top:150px;">No search result found</h2>
                <?php
                }
                else{
                    ?>
                        <!-- <h5>Search results for </h5> -->
                    <?php
                    while($paper = mysqli_fetch_assoc($storing)){
                        $down = $paper['name'];
                        $pdf = base64_encode($paper["file"]);
                        echo "<div class='question'>";
                            echo "<div class='question-container'>";
                                echo "<div class='common' data-aos='fade-up' data-aos-duration='1000'>";
                                    echo "<div class='question-split'>";
                                        echo "<h2>"; echo $paper['name']; echo "</h2>";
                                        echo "<p>"; echo $paper['faculty']; echo "</p>";
                                        echo '<a href="data:application/pdf;base64,' . $pdf . '" download="'.$down.'"><button>Download</button></a>';
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
            }
            else{
                while($paper = mysqli_fetch_assoc($sp)){
                    $down = $paper['name'];
                    $pdf = base64_encode($paper["file"]);
                    echo "<div class='question'>";
                        echo "<div class='question-container'>";
                            echo "<div class='common' data-aos='fade-up' data-aos-duration='1000'>";
                                echo "<div class='question-split'>";
                                    echo "<h2>"; echo $paper['name']; echo "</h2>";
                                    echo "<p>"; echo $paper['faculty']; echo "</p>";
                                    // echo "<a href='curri_view.php?view=$paper[id]' target='_blank'><button>View</button>";
                                    echo '<a href="data:application/pdf;base64,' . $pdf . '" download="'.$down.'"><button>Download</button></a>';
                                echo "</div>";
                            echo "</div>";
                            while($paperextra = mysqli_fetch_assoc($extra)){
                                $pdf = base64_encode($paperextra["file"]);
                                $down = $paperextra['name'];
                                echo "<div class='common' data-aos='fade-up' data-aos-duration='1000'>";
                                    echo "<div class='question-split'>";
                                        echo "<h2>"; echo $paperextra['name']; echo "</h2>";
                                        echo "<p>"; echo $paperextra['faculty']; echo "</p>";
                                        // echo "<a href='curri_view.php?view=$paperextra[id]' target='_blank'><button>View</button>";
                                        echo '<a href="data:application/pdf;base64,' . $pdf . '" download="'.$down.'"><button>Download</button></a>';
                                    echo "</div>";
                                echo "</div>";
                            }
                        echo "</div>";
                    echo "</div>";
                }
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
    <script src="./scripts/curriculum.js" defer type="text/javascript"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>