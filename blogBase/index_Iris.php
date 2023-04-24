<?php
include 'logic.php';
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->


<html lang="eng">
    <head>
        <meta charset="utf-8"><!-- comment -->
        <meta name="viewport" content="width=device-width, intitial-scale=0.3">
        <title>Blog Base e-newspaper</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>                 
        <link rel="stylesheet" href="index_Iris.css">

    </head>

    <body>
        
        this is the test part.
        <div class ="container">
            <div class = "row" style = "margin: 0px; background: #efefef">
                <div class ="col-md-2"></div> 
                <div class ="col-md-8">
                    <img class ="logoImage" src = "Blogbaselogo.png" >
                </div>                
                <div class ="col-md-2"></div>                 

            </div>  
            

            <nav class="flex-div" >
                <div class="nav-left flex-div" >
                    <img class="menu-icon" src="menu_icon.png">
                </div>
                <div class="nav-mid flex-div" >
                    <div class="search-box" >
                        <form action="search-proc.php" method="POST" id="searchForm">
                            <input type="text/submiit" name="search" placeholder="search?"/> <img src="search.png">
                        </form>
                    </div>
                </div>
                <?php
                session_start();
                if (isset($_SESSION["username"])) {
                    $loggedInUser = $_SESSION["username"];
                    ?>
                    <div class="nav-right flex-div">
                        <a href="admin.php"><img src="admin_img.png"></a>
                        <a href="graphDes.php"><img src="gd.png"></a>
                        <a href="create.php"><img src="editor_img.png"></a>
                        <a href="ad_design.php"><img src="ad.png"></a>
                        <a href="user_profile.php" style="padding: 10px"><img src="follow.png"></a>
                        <u ><?php echo $_SESSION['username'] ?></u>
                        <a href="logout.php" style="padding: 10px">Logout</a>
                        <?php
                    } else {
                        ?>
                        <div class="nav-right flex-div">
                            <a href="admin.php"><img src="admin_img.png"></a>
                            <a href="graphDes.php"><img src="gd.png"></a>
                            <a href="create.php"><img src="editor_img.png"></a>
                            <a href="ad_design.php"><img src="ad.png"></a>
                            <a href="user_profile.php"><img src="follow.png"></a>
                            <a href="login.php"  style = "padding: 8px;font-size: 13px;">Login</a><!-- comment -->
                            <a href="register.php" style="font-size: 13px;">Sign Up</a>
                        </div>
                        <?php
                    }
                    ?>
            </nav>

            <!--------------------- side bar --------------------->
            <div class="sidebar">
                <div class="shortcut-links">
                    <a  style="color: orange" href="index.php"><img src="home.png"> Home </a></p>
                    <a href="hot.php"><p><img src="hot.png"> Hot! </a></p>
                    <a href="viewSaved.php"><p><img src="saved.png"> Saved </a></p>
                    <a href="archived.php"><p><img src="history.png"> Archived </a></p>
                    <hr>
                </div>
                <div class="Authors">
                    <center>
                        <p><a href="social.php">Social</a></p>
                    </center>
                    <?php
                    if (isset($_SESSION["username"])) {
                        $loggedInUser = $_SESSION["username"];
                        $getUserID = "SELECT userid FROM users WHERE username='$loggedInUser'";
                        $loggedOn = $con->query($getUserID);
                        if ($loggedOn->num_rows > 0) {
                            while ($row = $loggedOn->fetch_assoc()) {
                                $realUserID = $row["userid"];
                                $followList = "SELECT username FROM users, social_follow WHERE username!='$loggedInUser' and follower_id='$realUserID' and follow_id=1 and followed_user_id=userid";
                                $getFollowList = $con->query($followList);
                                if ($getFollowList->num_rows > 0) {
                                    while ($row1 = $getFollowList->fetch_assoc()) {
                                        ?>
                                        <a href=""><p><img src="follow.png"><?php echo $row1["username"]; ?></a></p>
                                        <?php
                                    }
                                }
                            }
                        }
                    } else {
                        ?>
                        <center>
                            <p>Not following anyone</p><br>
                            <p>or</p><br>
                            <p>Need to login</p>
                        </center>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class ='main'>
                <div class ="row" style = "height: 300px;">
                    <div class ="col-md-4" style ="height: 300px;">1</div>
                    <div class ="col-md-4" style ="height: 300px;">2</div>
                    <div class ="col-md-4" style ="height: 300px;">3</div>                   
                </div>    
                    
            </div>
                <div class ="row" style ="height: 300px;">
                    
                    
                </div>                


            <script src="script.js"></script>
            </div>
        </div>
    </body>
</html>


