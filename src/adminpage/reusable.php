<!-- Chat -->
<div id="chat">
      <div class="chat-container">
        <div class="dashboard-search">
          <form action="" method="post">
            <input type="search" placeholder='Search users' name="user_name" autocomplete="off" spellcheck="false">
            <button name="user_search"><i class='fa fa-search'></i></button>
          </form>
        </div>

        <div class="users-display">
          
        <?php
            include "./connection.php";
                $users = "SELECT * FROM `users` Orders Limit 5;";
                $store = mysqli_query($db,$users);

                if(isset($_POST['user_search'])){
                  $search_user = mysqli_query($db,"SELECT * FROM `users` WHERE name LIKE'%$_POST[user_name]%'");
                  if(mysqli_num_rows($search_user) == 0){
                    ?><h2>No User Found</h2>
                  <?php
                  }
                  else{
                  echo "<table>";
                    echo "<tr>";
                      echo "<th>"; echo "id";  echo "</th>";
                      echo "<th>"; echo "username";  echo "</th>";
                      echo "<th>"; echo "phonenumber";  echo "</th>";
                      echo "<th>"; echo "email";  echo "</th>";
                      echo "<th>"; echo "dob";  echo "</th>";
                    echo "</tr>";
                    while($check = mysqli_fetch_assoc($search_user)){
                      echo "<tr>";
                        echo "<td>"; echo $check['id']; echo "</td>";
                        echo "<td>"; echo $check['username']; echo "</td>";
                        echo "<td>"; echo $check['phonenumber']; echo "</td>";
                        echo "<td>"; echo $check['email']; echo "</td>";
                        echo "<td>"; echo $check['dob']; echo "</td>";
                      echo "</tr>";
                    }
                  echo "</table>";
                  }
                }
                else{
                  echo "<table>";
                    echo "<tr>";
                      echo "<th>"; echo "id";  echo "</th>";
                      echo "<th>"; echo "username";  echo "</th>";
                      echo "<th>"; echo "phonenumber";  echo "</th>";
                      echo "<th>"; echo "email";  echo "</th>";
                      echo "<th>"; echo "dob";  echo "</th>";
                    echo "</tr>";
                    while($check = mysqli_fetch_assoc($store)){
                      echo "<tr>";
                        echo "<td>"; echo $check['id']; echo "</td>";
                        echo "<td>"; echo $check['username']; echo "</td>";
                        echo "<td>"; echo $check['phonenumber']; echo "</td>";
                        echo "<td>"; echo $check['email']; echo "</td>";
                        echo "<td>"; echo $check['dob']; echo "</td>";
                      echo "</tr>";
                    }
                  echo "</table>";
                  }
              ?>


        </div>
      </div>
    </div>
<!-- Chat End -->
