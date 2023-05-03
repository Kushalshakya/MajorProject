<?php
if(isset($_POST['srcbtn'])){
    $userquery = mysqli_query($database, "SELECT * FROM `users` WHERE name LIKE'% " .$_POST['usersearch']. "%'");
    if(mysqli_num_rows($userquery) == 0){
        ?>
        <h2>No Users Found.</h2>
        <?php
    }
    else{
        echo "<table>";
            echo "<tr>";
              echo "<th>"; echo "Date"; echo "</th>";
              echo "<th>"; echo "username"; echo "</th>";
              echo "<th>"; echo "phonenumber"; echo "</th>";
              echo "<th>"; echo "email"; echo "</th>";
              echo "<th>"; echo "dateofbirth"; echo "</th>";
              echo "<th>"; echo "status"; echo "</th>";
            echo "</tr>";
        while($searchfetcher = mysqli_fetch_assoc($userquery)){}
        echo "</table>";
    }
}
            ?>