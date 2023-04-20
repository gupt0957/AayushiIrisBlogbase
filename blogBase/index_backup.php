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
                height: 80vh;
                position: relative;
                top: 0;
                padding-left: 2%;
                padding-top: 40px;
            }
            .card {
              color: #ba986e;
              background-color: whitesmoke;
              border:solid 5px #ba986e;
              font-size:40px;
              margin:20%;
              padding: 15% 15%;
              width: 60%;
              height:50%;
              box-shadow: 0 4px 8px 0 rgba(178, 178, 178,0.6);
              transition: 0.3s;
              border-radius: 15px; /* 5px rounded corners */
              text-align: center;
              align-items: center;
            }            
        </style>


    </head>

    <body>
        <div class ="container" style = "background-color: #242124;">
            <div class = "row" style = "margin: 0px; background: #efefef;border-bottom: solid 3px black">
                <div class ="col-md-2"></div> 
                <div class ="col-md-8">
                    <img class ="logoImage" src = "Blogbaselogo.png" >
                </div>                
                <div class ="col-md-2"></div>                 
            </div>       

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
                session_start();
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
                        <button type ="button" style = "color:#ba986e;border-radius: 25px;">
                            <a href="login.php" >Login</a>
                        </button>
                        <button type ="button" style = "color:#ba986e;border-radius: 25px;padding: 10px">
                            <a href="register.php">Sign Up</a>                            
                        </button>                                                
                    </div>
                    <?php
                }
                ?>
            </nav>

            <!--------------------- side bar --------------------->
            <div class ="row" style ="height: 700px;">
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
                                                <a href=""><p><img src="follow.png"><?php echo $row1["username"]; ?></p></a>
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
                </div>
                <div class ="col-md-3">
                    
                    <div class ="row" style ="height:330px;border:solid 1px whitesmoke;">
                        <div class = "card">business</div>                        
                    </div> 
                        
                    
                    <div class ="row" style ="height:330px;">

                        <div class = "card">Travel</div>                        
                    </div> 
                        
                </div> 
                <div class ="col-md-4">
                    <div class ="row" style ="height:330px;">

                        <div class = "card" style = "padding:10% 15%;">Technology</div>
                    </div>     
                    <div class ="row" style ="height:330px;border:solid 1px whitesmoke;">
                        <div class = "card" style = "padding:10% 15%;">Science</div>
                    </div> 

                </div>  
                <div class ="col-md-3">
                    <div class ="row" style ="height:330px;border:solid 1px whitesmoke;">
                        <div class = "card">Politics</div>
                    </div>     
                    <div class ="row" style ="height:330px;">

                        <div class = "card">Style</div>



                    </div> 

                </div>                 



            </div>







            <?php
            try {
                $stmt = $con->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts WHERE is_approved=1 ORDER BY postID DESC');
                ?><table class="main-space" style = "background: yellow;"><?php
                    $i = 0;
                    $stmt->fetch_assoc();
                    foreach ($stmt as $row) {

                        echo "<center>1111<td>";
                        echo '<div class="card" style = "background: green;">';
                        echo '<div class="container" style = "background: pink;">';
                        echo '<h1 style = "background: orange;"><a href="viewpost.php?id=' . $row['postID'] . '">' . $row['postTitle'] . '</a></h1>';
                        echo '</div>';
                        echo '<p style = "background: purple;">Posted on ' . $row['postDate'] . '</p><br>';
                        echo '<p>' . $row['postDesc'] . '</p>';
                        echo '<p style = "background: gold;><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
                        echo '</div>';
                        echo "</td></center>";
                        $i = $i + 1;
                        if ($i % 3 == 0) {
                            echo "<tr></tr>";
                            echo "<tr></tr>";
                        }
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }echo "</table>";
                ?>



                <script src="script.js"></script>

        </div>                



    </div>

</div>






</body>
</html>