<?php
session_start();
ob_start();
    // if(isset($_SESSION['login_user'])){
        
    // }
    // else{
    
    //     header("Location:../");
    // }
    

    include "./connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library | Books</title>
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
    #books{
        width : 100%;
        height : auto;
        background-image : url('assets/2019-christmas-bg.png');
    }
    .books_showcase{
        padding : 40px 0px;
        width : 100%;
        height : auto;
    }
    #books .books_showcase_container{
        display : flex;
        font-family : 'Poppins', sans-serif;
        gap : 20px;
        width : 95%;
        margin: auto;
        word-break: break-all;
    }
    .display1{
        background-color : #F7C8E0;
    }
    .display2{
        background-color : #B4E4FF;
    }
    .display3{
        /* background-color : #DFFFD8; */
        background-color : #c8edc0;
    }
    .display1 img,
    .display3 img{
        animation : image-slide-a 20s linear infinite;
    }
    .display2 img{
        animation : image-slide-b 20s linear infinite;
    }
    #books .display_common{
        width : 400px;
        /* height : 400px; */
        padding : 10px 12px;
        display : flex;
        flex-direction : row;
        gap : 20px;
        border-radius : 2px;
        /* background-color : #F3F6FD; */
    }
    #books img{
        box-shadow: 0px 1px 7px 2px #c7c9d3;
        border-radius: 2px;
        width: 160px;
        transform : translateY(-30px);
        transition : all .5s ease-in-out;
    }
    @keyframes image-slide-a{
        0%,100%{
            transform : translateY(-30px);
        }
        50%{
            transform : translateY(0px);
        }
    }
    @keyframes image-slide-b{
        0%,100%{
            transform : translateY(0px);
        }
        50%{
            transform : translateY(-30px);
        }
    }
    #books h2{
        font-size: 20px;
    }
    #books h3{
        font-size : 14px;
        margin : 6px 0px;
    }
    #books p{
        padding : 5px 0px;
        font-size : 11px;
    }
    #books .books_showcase button{
        padding : 10px 12px;
        outline : none;
        border : none;
        margin : 20px 0px;
        font-family : Poppins;
        font-weight : 600;
        font-size : 13px;
        z-index : 50
    }
    @media (max-width : 999px){
        #books .books_showcase_container{
            flex-direction : column;
            gap : 20px;
            width : 90%;
            margin : auto;
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
            <form action="" method="post">
            <div class="search">
                    <input type="search" placeholder="Search for books by keyword / title / author / ISBN" name="searched_book" autocomplete="off" spellcheck="false">
                    <div class="search_query">
                        <button name="search_book">Search</button>
                        <button class="advance_btn">Advanced Search</button>
                    </div>                
            </div>
            </form>
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
            <i class="fa fa-close advance-close"></i>
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
    </div>

<?php
$globaldb = mysqli_connect("localhost","root","","elibrary");
if(isset($_POST['search_book'])){
    $bookquery = mysqli_query($globaldb,"SELECT * FROM `books` WHERE name LIKE'%$_POST[searched_book]%'");
        if(mysqli_num_rows($bookquery) == 0){
            ?>
                <h2 style="height : 400px;font-size : 30px;font-family:'Poppins',sans-serif;text-align:center;margin-top: 70px;">No search result found</h2>
            <?php
        }
        else{
        ?>
        <div id="database-books" style="min-height : 400px;">
        <div class="database-container">
            <?php
                $database = mysqli_connect("localhost","root","","elibrary");
                $sql = "SELECT * FROM `books`";
                $bookquery = mysqli_query($globaldb,"SELECT * FROM `books` WHERE name LIKE'%$_POST[searched_book]%'");
                $res = mysqli_query($database,$sql);
            
                while($first = mysqli_fetch_assoc($bookquery)){
                    $book_id = $first['id'];
                    $dsp = mysqli_query($database,"SELECT * FROM `book_images` WHERE book_id = $book_id");
                    while($ig = mysqli_fetch_assoc($dsp)){
                       echo "<a href='image_response.php?view=$book_id' target='_blank'>"; echo '<img src="data:image;base64,' .base64_encode($ig['imagefile']).'">'; echo "</a> <span> ". $first['name']." </span>";
                    }
                }
            ?>
            </div>
        </div>
        <?php
        }
    }
else{
?>
    <div id="books">
        <div class="books_showcase">
            <div class="books_showcase_container">
                <div class="display1 display_common">
                    <div class="image">
                        <!-- <img src="https://images-na.ssl-images-amazon.com/images/I/81UWB7oUZ0L.jpg"> -->
                        <img src="../Books/itendswithus.jpg">
                    </div>
                    <div class="books_short_description">
                        <h2>It Ends With Us</h2>
                        <h3>Colleen Hoover</h3>
                        <p>"It Ends With Us" by Colleen Hoover is a contemporary romance novel that explores the complexities of love, family, and domestic abuse. The story revolves around Lily Bloom, a young woman who moves to Boston to start her own business and escape her difficult past.</p>
                        <button><a href="../Books/It-Ends-With-Us.pdf" target="_blank">Read More</a></button>
                    </div>
                </div>
                <div class="display2 display_common">
                    <div class="image">
                        <img src="../Books/theparisapartment.jpg">
                    </div>
                    <div class="books_short_description">
                        <h2>The Paris Apartment</h2>
                        <h3>Lucy Foley</h3>
                        <p>"The Paris Apartment" by Lucy Foley is a gripping historical mystery novel that takes readers on a journey from present-day London to the glitz and glamour of 1920s Paris. The story follows the lives of two women, Liv and Miranda to the world's most beautiful cities.</p>
                        <button><a href="../Books/The-Paris-Apartment.pdf" target="_blank">Read More</a></button>
                    </div>
                </div>
                <div class="display3 display_common">
                    <div class="image">
                        <img src="../Books/thesalientpatient.jpg">
                    </div>
                    <div class="books_short_description">
                        <h2>The Silent Patient</h2>
                        <h3>Alex Michaelides</h3>
                        <p>"The Silent Patient" is a thrilling and suspenseful novel that follows the story of Alicia Berenson, a successful artist who is convicted of murdering her husband and subsequently becomes mute. The story is narrated by Theo Faber, a psychotherapist.</p>
                        <button><a href="../Books/The-Silent-Patient.pdf" target="_blank">Read More</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="database-books">
        <div class="database-container">
    <?php
        $database = mysqli_connect("localhost","root","","elibrary");
        $sql = "SELECT * FROM `books`";
        $res = mysqli_query($database,$sql);

        while($first = mysqli_fetch_assoc($res)){
            $book_id = $first['id'];
            $dsp = mysqli_query($database,"SELECT * FROM `book_images` WHERE book_id = $book_id");
            while($ig = mysqli_fetch_assoc($dsp)){
               echo "<a href='image_response.php?view=$book_id' target='_blank'>"; echo '<img src="data:image;base64,' .base64_encode($ig['imagefile']).'">'; echo "</a> <span> ". $first['name']." </span>";
            }
        }
        ?>
            </div>
    </div>

<?php
}
?>


    

    

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
    <script src="./scripts/book.js" type="text/javascript"></script>

    <!--
    Advance Search Guide
    To create an advanced search query that searches for data using the '%like%' operator, you can use the following SQL query:
    
    SELECT * FROM books 
    WHERE (title LIKE '%search_term%' OR author LIKE '%search_term%' OR category LIKE '%search_term%');

    In this query, you would replace "books" with the name of the table where you have stored the list of books. The 'search_term' variable would be replaced with the value that the user enters in the search box.
    The above query searches for books where the title, author or category contains the search term entered by the user. The '%like%' operator is used with the search term to search for any matching values that contain the search term, even if it appears in the middle of a word or in a different order.
    You can modify the query based on the specific fields in your table that you want to search on. Additionally, you can add more search conditions to the query to narrow down the results. For example, you can add a condition to search for books published within a specific date range.
    -->
</body>
</html>