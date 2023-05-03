<?php
    $db = mysqli_connect('localhost','root','','elibrary');
    $id = $_GET['view'];
    $conn = mysqli_query($db,"SELECT * FROM `books` WHERE id = $id");    

    while($row = mysqli_fetch_assoc($conn)){
        $file_name = $row['name'];
        
        header("Content-Type:application/pdf");
        header("Content-Length:" . strlen($row['file']));
        header("Content-Disposition:inline; filename=$file_name");
        echo $row['file'];
    }
?>