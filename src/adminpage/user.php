<?php
  include "../connection.php";
  session_start();
  ob_start();
  if($_SESSION['admin_user']){

  }
  else{
    header("Location: ../admin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library | Admin Users</title>
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../assets/logo/android-chrome-512x512.png">
</head>
<style>
    .user-container{
        margin : 20px 40px;
    }
    #user table,tr,td,th{
        border-collapse: collapse;
        border : 1px solid black;
        padding : 10px;
    }
    #user th{
        text-transform : uppercase;
    }
    #user td:nth-child(1){
        text-align : center;
        width : 10%;
    }
    th:nth-child(2){
        text-align : left;
    }
    #user td:nth-child(2){
        width : 50%;
    }
    #user{
        background-color : var(--dashboard-alice-blue);
        width : 85%;
        height: auto;
        position : absolute;
        top : 66px;
        right : 0;
        font-family : 'Poppins', sans-serif;
        transition : all .5s ease-in-out;
        transform : translateX(0%);
    }
    #user.active{
      transform : translateX(-0%);
      width : 100%;
    }
    #user .search_existing{
        padding : 8px 10px;
        font-family : Poppins;
        outline : none;
        border : 1px solid rgba(0,0,0,0.6);
        width : 30%;
    }
    #user .search_cover_user{
        display : flex;
        margin : 10px 0px;
        gap : 10px;
    }
    .search_cover_user button{
        font-family : Poppins;
        background-color : #fff;
        color : #000;
        padding : 10px;
        border : 1px solid rgba(0,0,0,0.6);
    }
    .admin-info h1{
        margin : 20px 0px 20px 0px;
    }
    .admin-info .admin-data{
        display : flex;
        flex-direction : column;
        gap : 10px;
    }
    .admin-info{
        width : 93%;
        margin : auto;
    }
    .admin-info input{
        padding : 8px 5px 8px 10px;
        border : 1px solid rgba(0,0,0,0.3);
        font-family : 'Poppins', sans-serif;
        outline : none;
        width : 400px;
    }
    .admin-info input:focus{
        border : 1px solid rgba(0,0,0,0.6);
    }
    .admin-info button{
        font-family : 'Poppins', sans-serif;
        width : 400px;
        border : none;
        background-color : #111;
        color : #fff;
        padding : 10px;
    }
    .pendingbtn{
        border : 1px solid transparent;
        background-color : #0099FF;
        color : #fff;
        font-size : 16px;
        font-family : 'Poppins', sans-serif;
        width : 100px;
        padding : 6px;
    }
    .rejectbtn{
        border : 1px solid transparent;
        color : #fff;
        background-color : red;
        font-size : 16px;
        font-family : 'Poppins', sans-serif;
        width : 100px;
        padding : 6px;
        z-index : 50;
        margin-top: 10px;
    }
    .approvebtn{
        border : 1px solid transparent;
        color : #fff;
        background-color : #3EC70B;
        font-size : 16px;
        font-family : 'Poppins', sans-serif;
        width : 100px;
        padding : 6px;
        margin: 10px 0px;
    }
</style>
<body>
    <div id="loader"></div>
    <svg style="display:none;">
        <symbol id="logo" viewBox="0 0 140 59">
            <g>
                <path
                    d="M6.8 57c0 .4-.1.7-.2.9-.1.2-.3.4-.4.5-.1.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.2 0-.4-.2-.5-.4-.1-.2-.2-.5-.2-.9V44.7h-2c-.3 0-.6-.101-.8-.2-.2-.1-.3-.2-.5-.4s-.2-.3-.2-.4v-.4c0-.1 0-.2.1-.399 0-.2.1-.301.2-.4.1-.1.3-.3.5-.4.1 0 .4-.1.7-.1h2.1v-3.5c0-1 .1-1.9.3-2.7C4.1 35 4.5 34.3 5 33.7c.5-.6 1.1-1.1 1.9-1.4.8-.3 1.7-.5 2.7-.5.9 0 1.5.101 1.8.4.3.3.5.6.5 1.1 0 .3-.1.601-.3.9-.2.3-.6.4-1.2.4h-.6c-.6 0-1.1.101-1.5.301-.4.199-.7.5-.9.8C7.2 36 7 36.5 7 37c-.1.5-.1 1-.1 1.6V42h2.7c.3 0 .6.1.8.2.2.1.3.2.5.399.1.101.2.301.2.401 0 .2.1.3.1.4 0 .1 0 .3-.1.399 0 .2-.1.3-.2.4-.1.1-.3.3-.5.399-.2.101-.5.2-.8.2H6.8V57z" />
                <path
                    d="M30.4 50.2c0 1.3-.2 2.5-.7 3.5-.5 1.1-1.1 2-1.9 2.8-.8.8-1.8 1.4-2.8 1.8-1.1.4-2.3.601-3.5.601-1.3 0-2.4-.2-3.5-.601-1.1-.399-2-1-2.8-1.8-.8-.8-1.4-1.7-1.9-2.8-.5-1.101-.7-2.2-.7-3.5s.2-2.4.7-3.5c.5-1.101 1.1-2 1.9-2.7.8-.8 1.7-1.4 2.8-1.8 1.1-.4 2.3-.601 3.5-.601 1.3 0 2.4.2 3.5.601 1.1.399 2 1 2.8 1.8.8.8 1.4 1.7 1.9 2.7.5 1.1.7 2.3.7 3.5zm-3.4 0c0-.8-.1-1.5-.4-2.3-.2-.7-.6-1.4-1.1-1.9s-1-1-1.7-1.3c-.7-.3-1.5-.5-2.4-.5s-1.7.2-2.4.5-1.3.8-1.7 1.3c-.5.5-.8 1.2-1.1 1.9-.2.699-.4 1.5-.4 2.3s.1 1.5.4 2.3c.2.7.6 1.4 1.1 1.9.5.6 1 1 1.7 1.3s1.5.5 2.4.5 1.7-.2 2.4-.5 1.3-.8 1.7-1.3c.5-.601.8-1.2 1.1-1.9.3-.7.4-1.5.4-2.3z" />
                <path
                    d="M38.1 44.8h.1c.4-.899 1-1.7 1.9-2.3s1.8-.9 2.9-.9c.5 0 1 .101 1.3.301.4.199.6.6.6 1.1 0 .6-.2 1-.6 1.2-.4.2-.8.3-1.4.3h-.2c-1.3 0-2.4.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.4.5-.2.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.1-.2-.3-.301-.4-.5C35 57.7 35 57.4 35 57V43.5c0-.4.1-.7.2-.9.1-.199.3-.399.4-.5.2-.1.3-.199.5-.199s.3-.101.5-.101c.1 0 .3 0 .4.101.2 0 .3.1.5.199.2.101.3.301.4.5.1.2.2.5.2.9v1.3z" />
                <path
                    d="M49.2 51.3c0 .7.2 1.4.5 2 .3.601.7 1.2 1.2 1.601.5.5 1.1.8 1.7 1.1s1.3.4 2 .4c1 0 1.8-.2 2.5-.5.7-.4 1.2-.801 1.8-1.2.2-.2.4-.3.6-.4.2-.301.3-.301.5-.301.4 0 .7.1 1 .4.3.199.4.6.4 1 0 .1 0 .3-.1.5s-.2.4-.4.7c-1.6 1.7-3.7 2.5-6.3 2.5-1.3 0-2.4-.199-3.5-.6s-2-1-2.8-1.8c-.8-.8-1.4-1.7-1.8-2.7-.4-1.1-.7-2.3-.7-3.6 0-1.301.2-2.5.6-3.5.4-1.101 1-2 1.8-2.801.8-.8 1.7-1.399 2.7-1.8 1-.399 2.2-.6 3.4-.6 2.1 0 3.8.6 5.2 1.8s2.3 2.9 2.6 5.2c0 .3.1.5.1.6v.5c0 1.101-.6 1.7-1.7 1.7H49.2V51.3zm9.9-2.5c0-.7-.1-1.3-.3-1.8-.2-.6-.5-1.1-.9-1.5s-.9-.7-1.4-1c-.6-.2-1.2-.4-2-.4-.7 0-1.4.101-2 .4-.6.2-1.2.6-1.6 1-.5.4-.8.9-1.1 1.5-.3.6-.5 1.2-.5 1.8h9.8z" />
                <path
                    d="M77.9 55.1c.399-.3.8-.5 1.199-.5.4 0 .7.101 1 .4.2.3.4.6.4.9 0 .199 0 .5-.1.699a1.856 1.856 0 01-.599.701c-.7.5-1.399.9-2.3 1.2s-1.8.4-2.7.4c-1.3 0-2.5-.2-3.5-.601-1.1-.399-2-1-2.8-1.8s-1.4-1.7-1.8-2.7c-.4-1.1-.7-2.3-.7-3.6s.2-2.5.7-3.601c.4-1.1 1.1-2 1.8-2.8.8-.8 1.7-1.399 2.8-1.8 1.101-.4 2.2-.6 3.5-.6.9 0 1.7.1 2.601.399C78.2 42 79 42.4 79.6 43l.7.7c.101.2.2.5.2.7 0 .399-.1.8-.4 1-.3.3-.6.399-1 .399-.199 0-.399 0-.5-.1-.2-.099-.4-.199-.7-.499-.301-.3-.7-.5-1.2-.7s-1-.3-1.7-.3c-.9 0-1.6.2-2.3.5s-1.2.8-1.7 1.3-.8 1.2-1.1 1.9c-.2.699-.4 1.5-.4 2.3s.1 1.5.3 2.2c.2.699.6 1.3 1 1.899.5.5 1 1 1.7 1.3.7.301 1.4.5 2.3.5.7 0 1.3-.1 1.8-.3.4-.099.9-.299 1.3-.699z" />
                <path
                    d="M94.6 56.2h-.1c-.6.899-1.4 1.6-2.3 2.1-.9.5-2 .7-3.3.7-.7 0-1.301-.1-2-.3-.7-.2-1.4-.5-1.9-.9-.6-.399-1.1-.899-1.4-1.6-.4-.7-.6-1.5-.6-2.4 0-1.3.3-2.2 1-3 .7-.7 1.6-1.3 2.7-1.7 1.1-.399 2.3-.6 3.7-.699 1.399-.101 2.8-.2 4.199-.2v-.5c0-1.2-.399-2.101-1.1-2.7s-1.7-.9-3-.9c-.7 0-1.4.101-2 .301-.6.199-1.3.5-1.9 1-.3.199-.699.3-1 .3-.3 0-.6-.101-.899-.4-.2-.2-.4-.6-.4-.899 0-.2.101-.5.2-.7s.3-.4.6-.601c.7-.5 1.601-1 2.5-1.3 1-.3 2-.5 3.2-.5s2.2.2 3.101.5c.899.3 1.6.8 2.199 1.4.601.6 1 1.3 1.301 2.1.3.8.399 1.601.399 2.5V56.9c0 .3-.1.6-.2.899-.1.201-.2.401-.4.501-.2.101-.3.2-.5.2s-.3.1-.4.1c-.1 0-.3 0-.399-.1-.2 0-.301-.1-.5-.2-.201-.1-.301-.3-.401-.5s-.2-.5-.2-.899v-.7h-.2zm-.9-5.5c-.8 0-1.7 0-2.5.1-.9.101-1.7.2-2.4.4s-1.3.5-1.8.9-.7 1-.7 1.7c0 .5.101.9.3 1.2.2.3.5.6.801.8.3.2.699.4 1.1.4.4.1.8.1 1.2.1 1.5 0 2.7-.5 3.5-1.399.8-.9 1.2-2.101 1.2-3.5v-.9h-.7v.199z" />
                <path
                    d="M111.4 45.4c-.5-.5-1-.801-1.5-1-.5-.2-1.101-.301-1.601-.301-.399 0-.7 0-1.1.101-.4.1-.7.2-1 .399-.3.2-.5.4-.7.7s-.3.601-.3 1c0 .7.3 1.2.899 1.601.601.3 1.601.6 2.801.899.8.2 1.5.4 2.199.7.7.3 1.301.6 1.801 1s.899.8 1.199 1.4c.301.5.4 1.199.4 1.899 0 1-.2 1.8-.6 2.5-.4.7-.9 1.2-1.5 1.7-.601.4-1.301.7-2.101.9-.8.199-1.6.3-2.399.3-1 0-2-.2-2.9-.5-1-.3-1.8-.8-2.5-1.4-.3-.3-.5-.5-.6-.7-.098-.198-.098-.398-.098-.598 0-.4.101-.8.4-1 .3-.3.6-.4 1-.4.399 0 .8.2 1.2.5.5.5 1.1.801 1.699 1.101.601.3 1.2.399 1.9.399.4 0 .8 0 1.2-.1.399-.1.7-.2 1-.4.3-.199.6-.399.8-.699.2-.301.3-.7.3-1.2 0-.8-.399-1.3-1.1-1.7s-1.8-.7-3.2-1c-.6-.1-1.1-.3-1.7-.5-.6-.2-1.1-.5-1.6-.8s-.8-.8-1.101-1.3c-.3-.5-.399-1.2-.399-2 0-.9.2-1.601.5-2.301.401-.6.801-1.2 1.401-1.6.601-.4 1.2-.7 2-.9.7-.199 1.5-.3 2.301-.3.899 0 1.699.101 2.6.4.8.3 1.6.7 2.2 1.2.3.3.5.5.6.699.101.2.101.4.101.601 0 .399-.101.7-.4 1s-.6.399-1 .399c-.402-.199-.802-.399-1.102-.699z" />
                <path
                    d="M126 58.4c-.6.3-1.3.399-2.1.399-1.601 0-2.801-.399-3.601-1.3s-1.2-2.2-1.2-3.9v-9H117.2c-.3 0-.601 0-.8-.1-.2-.1-.4-.2-.5-.3-.101-.101-.2-.3-.2-.4 0-.2-.101-.3-.101-.399 0-.101 0-.2.101-.4 0-.2.1-.3.2-.4.1-.1.3-.3.5-.399.199-.101.5-.2.8-.2h1.899v-3.2c0-.399.101-.7.2-.899.101-.2.3-.4.4-.601.2-.1.399-.2.5-.3.2 0 .3-.1.5-.1.1 0 .3 0 .5.1.2 0 .3.1.5.3.2.101.3.3.399.601.101.199.2.6.2.899V42h3.2c.3 0 .6.1.8.2.2.1.3.2.5.399.102.101.202.301.202.401 0 .2.1.3.1.4 0 .1 0 .3-.1.399 0 .2-.1.3-.2.4-.1.1-.3.3-.5.3-.2.1-.5.1-.8.1h-3.2V53.2c0 1 .2 1.7.5 2.1.4.4.8.601 1.4.601.2 0 .5 0 .7-.101.199-.1.399-.1.6-.1.4 0 .7.1.9.399.199.301.3.601.3.9s-.101.5-.2.7c0 .401-.2.601-.5.701z" />
                <path
                    d="M133.2 44.8h.1c.4-.899 1-1.7 1.9-2.3.899-.6 1.8-.9 2.899-.9.5 0 1 .101 1.301.301.4.199.6.599.6 1.099 0 .6-.2 1-.6 1.2-.4.2-.801.3-1.4.3h-.2c-1.3 0-2.399.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.399.5-.101.1-.4.199-.5.3-.2 0-.3.1-.5.1-.101 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.2-.101-.3-.301-.4-.5-.1-.2-.2-.5-.2-.9V43.5c0-.4.101-.7.2-.9.101-.199.3-.399.4-.5.2-.1.3-.199.5-.199s.3-.101.5-.101c.1 0 .3 0 .399.101.2 0 .301.1.5.199.2.101.301.301.4.5.1.2.2.5.2.9v1.3z" />
            </g>
            <g>
                <g>
                    <path fill="#08A6DF"
                        d="M70 32.9c-9.1 0-16.5-7.4-16.5-16.5 0-4.8 2.1-9.3 5.7-12.4.5-.4 1.2-.4 1.6.1.4.5.4 1.2-.1 1.6-3.1 2.7-4.9 6.6-4.9 10.7 0 7.8 6.4 14.2 14.2 14.2s14.2-6.4 14.2-14.2c0-7.8-6.4-14.1-14.2-14.1-1.9 0-3.7.4-5.4 1.1-.6.2-1.3 0-1.5-.6-.2-.6 0-1.3.6-1.5C65.7.4 67.8 0 70 0c9.1 0 16.5 7.4 16.5 16.5S79.1 32.9 70 32.9z" />
                </g>
                <g>
                    <path fill="#7C2A8A"
                        d="M70 28.4c-6.6 0-11.9-5.4-11.9-11.9 0-6.6 5.4-11.9 11.9-11.9 5 0 9.5 3.2 11.2 7.9.5 1.3.7 2.6.7 4 0 .6-.5 1.1-1.101 1.1-.6 0-1.1-.5-1.1-1.1 0-1.1-.2-2.2-.601-3.3-1.399-3.8-5-6.4-9.1-6.4-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6c.6 0 1.1.5 1.1 1.1.002.8-.498 1.3-1.098 1.3z" />
                </g>
                <g>
                    <path fill="#EC1848"
                        d="M70 23.9c-4.1 0-7.4-3.3-7.4-7.4s3.3-7.4 7.4-7.4c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-2.8 0-5.1 2.3-5.1 5.1s2.3 5.1 5.1 5.1 5.1-2.3 5.1-5.1c0-.6.5-1.1 1.101-1.1.6 0 1.1.5 1.1 1.1.099 4.2-3.201 7.5-7.301 7.5z" />
                </g>
            </g>
        </symbol>
        <symbol id="down" viewBox="0 0 16 16">
            <polygon points="3.81 4.38 8 8.57 12.19 4.38 13.71 5.91 8 11.62 2.29 5.91 3.81 4.38" />
        </symbol>
        <symbol id="users" viewBox="0 0 16 16">
            <path
                d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,15a7,7,0,0,1-5.19-2.32,2.71,2.71,0,0,1,1.7-1,13.11,13.11,0,0,0,1.29-.28,2.32,2.32,0,0,0,.94-.34,1.17,1.17,0,0,0-.27-.7h0A3.61,3.61,0,0,1,5.15,7.49,3.18,3.18,0,0,1,8,4.07a3.18,3.18,0,0,1,2.86,3.42,3.6,3.6,0,0,1-1.32,2.88h0a1.13,1.13,0,0,0-.27.69,2.68,2.68,0,0,0,.93.31,10.81,10.81,0,0,0,1.28.23,2.63,2.63,0,0,1,1.78,1A7,7,0,0,1,8,15Z" />
        </symbol>
        <symbol id="collection" viewBox="0 0 16 16">
            <rect width="7" height="7" />
            <rect y="9" width="7" height="7" />
            <rect x="9" width="7" height="7" />
            <rect x="9" y="9" width="7" height="7" />
        </symbol>
        <symbol id="charts" viewBox="0 0 16 16">
            <polygon
                points="0.64 7.38 -0.02 6.63 2.55 4.38 4.57 5.93 9.25 0.78 12.97 4.37 15.37 2.31 16.02 3.07 12.94 5.72 9.29 2.21 4.69 7.29 2.59 5.67 0.64 7.38" />
            <rect y="9" width="2" height="7" />
            <rect x="12" y="8" width="2" height="8" />
            <rect x="8" y="6" width="2" height="10" />
            <rect x="4" y="11" width="2" height="5" />
        </symbol>
        <symbol id="comments" viewBox="0 0 16 16">
            <path d="M0,16.13V2H15V13H5.24ZM1,3V14.37L5,12h9V3Z" />
            <rect x="3" y="5" width="9" height="1" />
            <rect x="3" y="7" width="7" height="1" />
            <rect x="3" y="9" width="5" height="1" />
        </symbol>
        <symbol id="pages" viewBox="0 0 16 16">
            <rect x="4" width="12" height="12" transform="translate(20 12) rotate(-180)" />
            <polygon points="2 14 2 2 0 2 0 14 0 16 2 16 14 16 14 14 2 14" />
        </symbol>
        <symbol id="appearance" viewBox="0 0 16 16">
            <path
                d="M3,0V7A2,2,0,0,0,5,9H6v5a2,2,0,0,0,4,0V9h1a2,2,0,0,0,2-2V0Zm9,7a1,1,0,0,1-1,1H9v6a1,1,0,0,1-2,0V8H5A1,1,0,0,1,4,7V6h8ZM4,5V1H6V4H7V1H9V4h1V1h2V5Z" />
        </symbol>
        <symbol id="trends" viewBox="0 0 16 16">
            <polygon
                points="0.64 11.85 -0.02 11.1 2.55 8.85 4.57 10.4 9.25 5.25 12.97 8.84 15.37 6.79 16.02 7.54 12.94 10.2 9.29 6.68 4.69 11.76 2.59 10.14 0.64 11.85" />
        </symbol>
        <symbol id="settings" viewBox="0 0 16 16">
            <rect x="9.78" y="5.34" width="1" height="7.97" />
            <polygon points="7.79 6.07 10.28 1.75 12.77 6.07 7.79 6.07" />
            <rect x="4.16" y="1.75" width="1" height="7.97" />
            <polygon points="7.15 8.99 4.66 13.31 2.16 8.99 7.15 8.99" />
            <rect x="1.28" width="1" height="4.97" />
            <polygon points="3.28 4.53 1.78 7.13 0.28 4.53 3.28 4.53" />
            <rect x="12.84" y="11.03" width="1" height="4.97" />
            <polygon points="11.85 11.47 13.34 8.88 14.84 11.47 11.85 11.47" />
        </symbol>
        <symbol id="options" viewBox="0 0 16 16">
            <path d="M8,11a3,3,0,1,1,3-3A3,3,0,0,1,8,11ZM8,6a2,2,0,1,0,2,2A2,2,0,0,0,8,6Z" />
            <path
                d="M8.5,16h-1A1.5,1.5,0,0,1,6,14.5v-.85a5.91,5.91,0,0,1-.58-.24l-.6.6A1.54,1.54,0,0,1,2.7,14L2,13.3a1.5,1.5,0,0,1,0-2.12l.6-.6A5.91,5.91,0,0,1,2.35,10H1.5A1.5,1.5,0,0,1,0,8.5v-1A1.5,1.5,0,0,1,1.5,6h.85a5.91,5.91,0,0,1,.24-.58L2,4.82A1.5,1.5,0,0,1,2,2.7L2.7,2A1.54,1.54,0,0,1,4.82,2l.6.6A5.91,5.91,0,0,1,6,2.35V1.5A1.5,1.5,0,0,1,7.5,0h1A1.5,1.5,0,0,1,10,1.5v.85a5.91,5.91,0,0,1,.58.24l.6-.6A1.54,1.54,0,0,1,13.3,2L14,2.7a1.5,1.5,0,0,1,0,2.12l-.6.6a5.91,5.91,0,0,1,.24.58h.85A1.5,1.5,0,0,1,16,7.5v1A1.5,1.5,0,0,1,14.5,10h-.85a5.91,5.91,0,0,1-.24.58l.6.6a1.5,1.5,0,0,1,0,2.12L13.3,14a1.54,1.54,0,0,1-2.12,0l-.6-.6a5.91,5.91,0,0,1-.58.24v.85A1.5,1.5,0,0,1,8.5,16ZM5.23,12.18l.33.18a4.94,4.94,0,0,0,1.07.44l.36.1V14.5a.5.5,0,0,0,.5.5h1a.5.5,0,0,0,.5-.5V12.91l.36-.1a4.94,4.94,0,0,0,1.07-.44l.33-.18,1.12,1.12a.51.51,0,0,0,.71,0l.71-.71a.5.5,0,0,0,0-.71l-1.12-1.12.18-.33a4.94,4.94,0,0,0,.44-1.07l.1-.36H14.5a.5.5,0,0,0,.5-.5v-1a.5.5,0,0,0-.5-.5H12.91l-.1-.36a4.94,4.94,0,0,0-.44-1.07l-.18-.33L13.3,4.11a.5.5,0,0,0,0-.71L12.6,2.7a.51.51,0,0,0-.71,0L10.77,3.82l-.33-.18a4.94,4.94,0,0,0-1.07-.44L9,3.09V1.5A.5.5,0,0,0,8.5,1h-1a.5.5,0,0,0-.5.5V3.09l-.36.1a4.94,4.94,0,0,0-1.07.44l-.33.18L4.11,2.7a.51.51,0,0,0-.71,0L2.7,3.4a.5.5,0,0,0,0,.71L3.82,5.23l-.18.33a4.94,4.94,0,0,0-.44,1.07L3.09,7H1.5a.5.5,0,0,0-.5.5v1a.5.5,0,0,0,.5.5H3.09l.1.36a4.94,4.94,0,0,0,.44,1.07l.18.33L2.7,11.89a.5.5,0,0,0,0,.71l.71.71a.51.51,0,0,0,.71,0Z" />
        </symbol>
    </svg>
    <header class="page-header">
        <nav>
            <a aria-label="forecastr logo" class="logo">
                <h1>E-Library</h1>
            </a>
            <ul class="admin-menu">
                <li class="menu-heading">
                    <h3>Admin</h3>
                </li>
                <li>
                    <a href="./dashboard.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgb(255,255,255);">
                            <path
                                d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z">
                            </path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
              <a href="./books.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255);" class="book">
                  <path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2zm0 14H5V5c0-.806.55-.988 1-1h13v12z">
                  </path>
                </svg>
                <span>Books</span>
              </a>
            </li>
                <li>
                    <a href="./user.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(255, 255, 255);">
                            <path
                                d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                            </path>
                        </svg>
                        <span>Accounts</span>
                    </a>
                </li>
                <li>
                  <a href="./donation.php">
                    <i class="fa fa-heart"></i>
                    <span>Donation</span>
                  </a>
                </li>
               
                <li>
                    <a href="./notes.php">
                        <img src="../assets/note.svg">
                        <span style="margin-left:5px;">Notes</span>
                    </a>
                </li>
                <li>
              <a href="./newsletter.php">
              <svg style="fill: rgba(255, 255, 2555);" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="_x31_3_x2C__newsletter_x2C__newspaper_x2C__article_x2C__blog_x2C__news_paper"><g id="XMLID_858_"><g id="XMLID_148_">
                <path d="M363.5,233.5h-270c-2.761,0-5-2.239-5-5v-75c0-2.761,2.239-5,5-5h270c2.762,0,5,2.239,5,5v75     C368.5,231.261,366.262,233.5,363.5,233.5z M98.5,223.5h260v-65h-260V223.5z" id="XMLID_598_"/></g><g id="XMLID_147_">
                <path d="M183.5,338.5h-90c-2.761,0-5-2.238-5-5v-60c0-2.762,2.239-5,5-5h90c2.761,0,5,2.238,5,5v60     C188.5,336.262,186.261,338.5,183.5,338.5z M98.5,328.5h80v-50h-80V328.5z" id="XMLID_595_"/></g><g id="XMLID_146_">
                <path d="M273.5,338.5h-90c-2.761,0-5-2.238-5-5v-60c0-2.762,2.239-5,5-5h90c2.762,0,5,2.238,5,5v60     C278.5,336.262,276.262,338.5,273.5,338.5z M188.5,328.5h80v-50h-80V328.5z" id="XMLID_592_"/></g><g id="XMLID_145_">
                <path d="M363.5,338.5h-90c-2.762,0-5-2.238-5-5v-60c0-2.762,2.238-5,5-5h90c2.762,0,5,2.238,5,5v60     C368.5,336.262,366.262,338.5,363.5,338.5z M278.5,328.5h80v-50h-80V328.5z" id="XMLID_589_"/></g><g id="XMLID_144_">
                <path d="M168.5,363.5h-65c-2.761,0-5-2.238-5-5s2.239-5,5-5h65c2.761,0,5,2.238,5,5S171.261,363.5,168.5,363.5z" id="XMLID_588_"/></g><g id="XMLID_143_">
                <path d="M263.5,363.5h-65c-2.761,0-5-2.238-5-5s2.239-5,5-5h65c2.762,0,5,2.238,5,5S266.262,363.5,263.5,363.5z" id="XMLID_587_"/></g><g id="XMLID_142_">
                <path d="M358.5,363.5h-65c-2.762,0-5-2.238-5-5s2.238-5,5-5h65c2.762,0,5,2.238,5,5S361.262,363.5,358.5,363.5z" id="XMLID_586_"/></g><g id="XMLID_141_">
                <path d="M168.5,388.5h-65c-2.761,0-5-2.238-5-5s2.239-5,5-5h65c2.761,0,5,2.238,5,5S171.261,388.5,168.5,388.5z" id="XMLID_585_"/></g><g id="XMLID_140_">
                <path d="M263.5,388.5h-65c-2.761,0-5-2.238-5-5s2.239-5,5-5h65c2.762,0,5,2.238,5,5S266.262,388.5,263.5,388.5z" id="XMLID_584_"/></g><g id="XMLID_139_"><path d="M358.5,388.5h-65c-2.762,0-5-2.238-5-5s2.238-5,5-5h65c2.762,0,5,2.238,5,5S361.262,388.5,358.5,388.5z" id="XMLID_583_"/></g><g id="XMLID_138_"><path d="M168.5,413.5h-65c-2.761,0-5-2.238-5-5s2.239-5,5-5h65c2.761,0,5,2.238,5,5S171.261,413.5,168.5,413.5z" id="XMLID_582_"/></g><g id="XMLID_137_"><path d="M263.5,413.5h-65c-2.761,0-5-2.238-5-5s2.239-5,5-5h65c2.762,0,5,2.238,5,5S266.262,413.5,263.5,413.5z" id="XMLID_581_"/></g><g id="XMLID_136_"><path d="M358.5,413.5h-65c-2.762,0-5-2.238-5-5s2.238-5,5-5h65c2.762,0,5,2.238,5,5S361.262,413.5,358.5,413.5z" id="XMLID_580_"/></g><g id="XMLID_135_"><path d="M413.5,448.5h-370c-2.761,0-5-2.238-5-5v-325c0-2.761,2.239-5,5-5h370c2.762,0,5,2.239,5,5v325     C418.5,446.262,416.262,448.5,413.5,448.5z M48.5,438.5h360v-315h-360V438.5z" id="XMLID_577_"/></g><g id="XMLID_134_"><path d="M468.5,398.5h-55c-2.762,0-5-2.238-5-5s2.238-5,5-5h50v-315h-360v45c0,2.761-2.239,5-5,5s-5-2.239-5-5     v-50c0-2.761,2.239-5,5-5h370c2.762,0,5,2.239,5,5v325C473.5,396.262,471.262,398.5,468.5,398.5z" id="XMLID_576_"/></g></g></g><g id="Layer_1"/>
              </svg>


                <span>Newsletter</span>
              </a>
            </li>
                <li>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(255, 255, 255, 1);">
                            <path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path>
                            <path
                                d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z">
                            </path>
                        </svg>
                        <span><a href="../session_end.php">Logout</a></span>
                    </button>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Start of contentHeader -->
    <div id="content-header">
        <div class="content-cover">
            <div class="content-split">
                <button class="hambtn">
                    ☰
                </button>
                <h1>Accounts</h1>
            </div>
            <div class="content-notification">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(0, 0, 0, 1);" class="darkmode">
                    <path
                        d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z">
                    </path>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(0, 0, 0, 1);">
                    <path
                        d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                    </path>
                </svg>
            </div>
            <div class="content-split-bio">
                <h1>
                    <?php
                echo $_SESSION['admin_user'];
              ?>
                </h1>
                <h2>Admin</h2>
            </div>
        </div>
    </div>
    <!-- End of contentHeader -->

    <div id="user">
      <div class="admin-info">
        <h1>Create an Admin Account</h1>
        <form method="post" class="admin-data">
            <input type="text" name="admin_username" placeholder="Username" required spellcheck="false" autocomplete="off">
            <input type="email" name="admin_email" placeholder="Email" required spellcheck="false" autocomplete="off">
            <input type="password" name="admin_password" placeholder="Password" required spellcheck="false" autocomplete="off">
            <button name="admin_go">Go</button>
        </form>
        <?php
            if(isset($_POST['admin_go'])){
                mysqli_query($db, "INSERT INTO `admin` VALUES ('','$_POST[admin_username]','$_POST[admin_email]','$_POST[admin_password]');");
            }
        ?>
      </div>
      <div class="user-container">
        
        <h1>Users</h1>
        <form method="post">
        <div class="search_cover_user">
                <input type="search" placeholder="Search existing user" class="search_existing" name="usersearch" autocomplete="off" spellcheck="false">
                <button name="srcbtn">Search</button>
            </div>
        </form>
        <?php
          $database = mysqli_connect('localhost','root','','elibrary');
          $user_data = "SELECT * FROM `users`;";
          $user_connect = mysqli_query($database,$user_data);  


           
                echo "<table>";
                    echo "<tr>";
                      echo "<th>"; echo "Date"; echo "</th>";
                      echo "<th>"; echo "username"; echo "</th>";
                      echo "<th>"; echo "phonenumber"; echo "</th>";
                      echo "<th>"; echo "email"; echo "</th>";
                      echo "<th>"; echo "dateofbirth"; echo "</th>";
                      echo "<th>"; echo "status"; echo "</th>";
                    echo "</tr>";
                while($user_data = mysqli_fetch_Assoc($user_connect)){
                // $removerow = "DELETE FROM `users` WHERE id = $user_data['id']";
                  echo "<tr>";
                    echo "<td>"; echo $user_data['date']; echo "</td>";
                    echo "<td>"; echo $user_data['username']; echo "</td>";
                    echo "<td>"; echo $user_data['phonenumber']; echo "</td>";
                    echo "<td>"; echo $user_data['email']; echo "</td>";
                    echo "<td>"; echo $user_data['dob']; echo "</td>";

                    echo "<td>";
                    if($user_data['status'] == 0){
                        echo "<form method='post'>";
                            echo "<button class='pendingbtn' name='pendingbtn' value='" . $user_data['id'] . "'>Pending</button>";
                            echo "<button class='rejectbtn' name='rejectbtn' value='" . $user_data['id'] . "'>Reject</button>";
                        echo "</form>";
                    }
                    else{
                      echo "<button class='approvebtn'>Approved</button>";
                    }
                    echo "</td>";
                    if(isset($_POST['rejectbtn'])){
                        $rejectid = $_POST['rejectbtn'];
                        $reset = "DELETE FROM `users` WHERE id = " . $rejectid;
                        $conn = mysqli_query($db,$reset);
                        header('Location: ./user.php');
                    }
                    if(isset($_POST['pendingbtn'])){
                        $updateid = $_POST['pendingbtn'];
                        $statusapproved = 1;
                        $update = "UPDATE `users` SET `status` = '$statusapproved' WHERE id = $updateid";
                        $updatestart = mysqli_query($db,$update);
                        header('Location: ./user.php');
                    }
                  echo "</tr>";
                }
          echo "</table>";


        ?>
      </div>
      <div class="upload_newsletter">
        
      </div>
    </div>

  </body>
  <script src="./adminscripts/user.js" defer type="text/javascript"></script>

</html>