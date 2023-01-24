<?php
    session_start();
    if(isset($_SESSION['admin_user'])){
        unset($_SESSION['admin_user']);
    }
    echo "<script>window.location.href = './admin.php'</script>";
    // header("Location : ./admin.php");
?>