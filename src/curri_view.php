<?php
    $db = mysqli_connect('localhost','root','','elibrary');
    $id = $_GET['view'];
    $conn = mysqli_query($db,"SELECT * FROM `papers` WHERE id = $id");    

    while($row = mysqli_fetch_assoc($conn)){
        $paper_name = $row['name'];
        
        header("Content-Type:application/pdf");
        header("Content-Length:" . strlen($row['file']));
        header("Content-Disposition:inline; filename=$paper_name");
        echo $row['file'];
    }
?>