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
        height : 150px;
        background-color: #fff;
        padding : 10px 15px;
        /* border : 1px solid red; */
        box-shadow: 4px 4px 6px #eee;
    }
    h2{
        font-size : 18px;
        color : #3498DB;
    }
</style>
<body>
    <!-- <div id="loader"></div> -->
    <div id="header-nav">
        <div class="header-nav-cover">
            <h1>E-Library</h1>
            <div class="lists">
                <ul class="m-nav">
                    <li><a href="src/books.html">Book</a></li>
                    <li><a href="#">Showcase</a></li>
                    <li><a href="#">Community</a></li>
                    <li><a href="src/curriculum.html">Curriculum</a></li>
                    <li><a href="src/study.html">Study</a></li>
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
                    <li><a href="./books.html">Book</a></li>
                    <li><a href="#">Showcase</a></li>
                    <li><a href="#">Community</a></li>
                    <li><a href="./curriculum.html">Curriculum</a></li>
                    <li><a href="./study.html">Study</a></li>
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
                        <input type="text" placeholder="Search notes & questions" name="result_search">
                        <!-- <input type="text" placeholder="Subject"> -->
                        <button name="search_question">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $db = mysqli_connect("localhost","root","","elibrary");
            $search_for = "SELECT * FROM `papers`";
            $sp = mysqli_query($db,$search_for);

            if(isset($_POST['search_question'])){
                $storing = mysqli_query($db,"SELECT * FROM `papers` WHERE name LIKE'%$_POST[result_search]%'");
                if(mysqli_num_rows($storing) == 0)
                    ?><h2>Nothing Found</h2>
                <?php
                }
                else{

                }
        ?>
        <div class="question">
            <div class="question-container">
                <div class="dcom common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering FIRST SEMESTER</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
                <div class="dce common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering SECOND SEMESTER</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
                <div class="ha common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering THIRD SEMESTER</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
                <div class="ha common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering FOURTH SEMESTER</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
                <div class="ha common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering FIFTH SEMESTER</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
                <div class="ha common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering SIZTH SEMESTER</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
                <div class="ha common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering Computer EngineeringComputer Engineering</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
                <div class="ha common">
                    <div class="question-split">
                        <h2>Diploma in Computer Engineering</h2>
                        <p><span>Engineering</span><span>Computer</span></p>
                        <button>Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        // Loader
        const loaderEl = document.querySelector('#loader');
        window.addEventListener('load', ()=>{
            setTimeout(() => {
                loaderEl.style.display = "none";
            }, 2000);
        })

        // Mobile Nav
        const headerNavEl = document.querySelector('#header-nav')
        const hamBurgerMidScreen = document.querySelector('.hamburger')

        hamBurgerMidScreen.addEventListener('click',()=>{
            headerNavEl.classList.toggle('active')
        })

    </script>
</body>
</html>