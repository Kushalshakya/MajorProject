<!-- We will be making this dynamic by using php and mysql later on --> -->
<?php
                if($_SESSION['login_user']){
                    ?>
                        <div class="user-status">
                            <h2><?php echo $_SESSION['login_user'];?></h2><br>
                            <a href="sessionuser_end.php" style="color:#000;font-size:16px;"><h3><i class="fa fa-sign-out"></i><span style="margin-left:20px;">Logout</span></h3></a>
                        </div>
                    <?php
                }
            ?>