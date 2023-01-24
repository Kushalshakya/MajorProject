<?php
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
    <title>E-Library | Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/logo/android-chrome-512x512.png">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    *{
        margin : 0;
        padding : 0;
    }
    #loader{
        background: #FFF url('assets/loader.gif') no-repeat center center;
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

    .login-cover{
        font-family: 'Poppins', sans-serif;
        display : flex;
        justify-content : center;
        align-items : center;
        height : 100vh;
        width : 100%;
        background-color : #0D1117;
    }
    .login-form{
        /* width : 30%; */
        max-width: 400px;
        margin: 0 auto;
        border-radius: 4px;
        padding: 20px;
        background-color : #fff;
    }
    .login-form h1 {
      margin-bottom: 20px;
      text-align: center;
      font-size: 28px;
    }
    .login-form input{
        outline : none;
        font-family: 'Poppins', sans-serif;
    }
    .login-form input[type="email"],
    .login-form input[type="password"] {
      width: 100%;
      border: 1px solid #ccc;
      padding: 12px;
      margin-bottom: 20px;
      box-sizing: border-box;
      font-size: 16px;
    }
    .login-form .access{
      background-color: #4caf50;
      color: #fff;
      font-size: 16px;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      font-family : 'Poppins', sans-serif;
    }
    

    /* Error Message */
    #login-error{
        font-family : 'Poppins', sans-serif;
        position : absolute;
        bottom : 10px;
        left : 10px;
        padding : 10px;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        font-size : 9px;
        background-color : red;
        display : none;
        transition : all .5s ease-in-out;
    }
    #login-error h2{
        color : #fff;
        font-weight: 400;
    }

    @media (max-width: 768px) {
        .login-form {
            width: 85%;
        }
        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
        }

        #login-error{
            width : 90%;
            left : 50%;
            transform : translate(-50%);
            top : 8px;
            height : 17px;
            display : none;
            transition : all .5s ease-in-out;
        }
    }
</style>
<body>
   
    <div id="loader"></div>
    <div class="login-cover">
        <div class="login-form">
            <h1>Admin Login</h1>
            <form method="post">
                <input type="email" placeholder="Email" required name="email" autocomplete="off">
                <input type="password" placeholder="Password" required name="password" autocomplete="off">
                <button class="access" name="access">Log In</button>
            </form>
            <a href="../index.php" style="text-decoration:none;cursor:pointer;color:#000;"><h2 style="font-size:15px;text-align:center;margin-top:20px;">Back to home page</h2></a>
            <!-- ../../ for two level up location files -->
        </div>
    </div>
    
    <?php
        $db = mysqli_connect("localhost","root","","elibrary");
        
        if(isset($_POST['access'])){
            $count = 0;
            $username='';
            $res = mysqli_query($db,"SELECT `username` from `admin` WHERE email='$_POST[email]' && password='$_POST[password]';");
            $count = mysqli_num_rows($res);

            if($count == 0){
                ?>
                <div id='login-error'>
                    <h2>Wrong Credentials. Please leave if you dont have admin access.</h2>
                </div>
            <?php
            }
            else{
                if($res){
                    while($row= mysqli_fetch_assoc($res)){
                        $username=$row['username'];
                    }
                    // $_SESSION['admin_user'] = $_POST['username'];   
                    // $_SESSION['admin_user'] = $_POST['email'];   
                    $_SESSION['admin_user'] = $username;   
                    // echo "<script> window.location.href = '/index.html'  </script>";
                    header('Location: ./adminpage/dashboard.php');
                }
            }            
        }
    ?>
    <script src="./script.js" type="text/javascript"></script>
    <script type="text/javascript">
        const loginError = document.querySelector('#login-error')

        loginError.style.display = "block"
        setTimeout(()=>{
            loginError.style.display = "none"
        },4000)
    </script>
</body>