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
        <style>
            .sidebar{
                visibility: visible;
                background: #fff;
                width: 100%;
                height: 100vh;
                position: relative;
                top: 0;
                padding-left: 2%;
                padding-top: 40px;
            }
            .card {
              color: #ba986e;
              border:solid 0.2px #ba986e;
              font-size:40px;
              margin:25%;
              padding: 13% 15%;
              width: 50%;
              height:50%;
              box-shadow: 0 4px 8px 0 rgba(178, 178, 178,0.6);
              transition: 0.3s;
              border-radius: 15px; /* 5px rounded corners */
              text-align: center;
              align-items: center;
              font-family:"Times New Roman", Times, serif
            }            
        </style>


    </head>

    <body>
        <div class ="container" style = "background-color: black;">
            <div class = "row" style = "margin: 0px; background: #efefef;border-bottom: solid 3px black">
                <div class ="col-md-2"></div> 
                <div class ="col-md-8">
                    <img class ="logoImage" src = "Blogbaselogo.png" >
                </div>                
                <div class ="col-md-2"></div>                 
            </div>       
gggfghg
            <nav class="flex-div" style = "background:#ba986e;">
                <div class="nav-left flex-div">
                    <img class="menu-icon" src="menu_icon.png">
                </div>
                <div class="nav-mid flex-div" >
                    <div class="search-box flex-div" style = "background: whitesmoke;">
                        <form action="search-proc.php" method="POST" id="searchForm">
                            <input type="text/submiit" name="search" placeholder="search"/> <img src="search.png">
                        </form>
                    </div>
                </div>
                <?php
                //session_start();
                if (isset($_SESSION["username"])) {
                    $loggedInUser = $_SESSION["username"];
                    ?>
                    <div class="nav-right flex-div">
                        <a href="admin.php"><img src="admin_img.png"></a>
                        <a href="graphDes.php"><img src="gd.png"></a>
                        <a href="create.php"><img src="editor_img.png"></a>
                        <a href="ad_design.php"><img src="ad.png"></a>
                        <a href="user_profile.php" style="padding: 10px;"><img src="follow.png"></a>
                        <button type ="button" style = "color:#ba986e;border-radius: 25px;"><?php echo $_SESSION['username'] ?> </button>
                        <button type = "button" href = "logout.php" style = "color:#ba986e;border-radius: 25px; padding: 0px 10px"> 
                            <a href="logout.php">Logout</a>
                        </button>

                    </div>
                    <?php
                } else {
                    ?>
                    <div class="nav-right flex-div">
                        <a href="admin.php"><img src="admin_img.png"></a>
                        <a href="graphDes.php"><img src="gd.png"></a>
                        <a href="create.php"><img src="editor_img.png"></a>
                        <a href="ad_design.php"><img src="ad.png"></a>
                        <a href="user_profile.php"><img src="follow.png"></a>
                        <button type ="button" style = "color:#ba986e;border-radius: 25px;padding: 10px">
                            <a href="login.php" >Login</a>
                        </button>
                        <button type ="button" style = "color:#ba986e;border-radius: 25px;padding: 10px">
                            <a href="register.php">SignUp</a>                            
                        </button>                                                
                    </div>
                    <?php
                }
                ?>
            </nav>

            <!--------------------- side bar --------------------->
            <div class ="row" style ="height: 700px; border-top:solid 3px black;">
                <div class ="col-md-2">
                    <div class="sidebar">
                        <div class="shortcut-links">
                            <a  style="color: orange" href="index.php"><img src="home.png"> Home </a></p>
                            <a href="hot.php"><p><img src="hot.png"> Hot! </a></p>
                            <a href="viewSaved.php"><p><img src="saved.png"> Saved </a></p>
                            <a href="archived.php"><p><img src="history.png"> Archived </a></p>
                        </div>
                        <div class="Authors">
                            <center>
                                <p><a href="social.php" style="color:#a28557">Social</a></p>
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
                                                <a href="" style ="color:#a28557"><p><img src="follow.png"><?php echo $row1["username"]; ?></p></a>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            } else {
                                ?>
                                <center>
                                    <p>Please Login</p><br>
                                </center>
                                <?php
                            }
                            ?>
                        </div>
                    </div>                                             
                </div>
                
               <!--main-->
                
                
                <div class ="col-md-3" style ="width:27.7%;">
                    <div class ="row" style ="height: 50%;border: solid #ba986e 0.2px">
                        <div class = "card" style ="background:#ba986e;color:whitesmoke;"> <a href="business.php">business</div></a> 
                    </div>
                    <div class ="row" style ="height: 50%;border: solid #ba986e 0.2px;">
                        <div class = "card" style ="background:black;color:#ba986e;"><a href="Travel.php">Travel</div></a>  
                    </div>                                      
                </div>
                <div class ="col-md-3" style ="width:27.7%;">
                    <div class ="row" style ="height: 50%;border: solid #ba986e 0.2px;">
                        <div class = "card" style ="background:black;color:#ba986e;"><a href="politics.php">Politics</div></a>   
                    </div>  
                    <div class ="row" style ="height: 50%;border: solid #ba986e 0.2px">
                        <div class = "card" style ="background:#ba986e;color:whitesmoke;"><a href="science.php">Science</div></a>    
                    </div>                                         
                </div>                
                <div class ="col-md-3" style ="width:27%;">
                    <div class ="row" style ="height: 50%;border: solid #ba986e 0.2px">
                        <div class = "card" style ="background:#ba986e;color:whitesmoke;"><a href="style.php">Style</div></a>
                    </div>  
                    <div class ="row" style ="height: 50%;border: solid #ba986e 0.2px;">
                        <div class = "card" style ="background:black;color:#ba986e;"><a href="health.php">Health</div><a>
                    </div>                                          
                </div>                               
            </div>
        </div>                
</body>
</html>