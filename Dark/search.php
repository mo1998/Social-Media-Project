<?php
require'functions.php';
session_start();
if(!isset($_SESSION['userid']))
{
 header('location:login.php');
}
$conn = connect();
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Comunicazione website created by team in 3rd cse department in ain shams university">
        <title>Comunicazione</title>
        <style></style>
        <link rel="stylesheet" href="Home Page/DarkStyle.css">
        <link rel="stylesheet" href="Home Page/posts-profile.css">
        <link rel="icon" href="Icons/Home Page1.png">        
        <script>
            function change(){
                var url = "Light/Home Page/HomePage.php";
                window.location = url;
            }
            function Un_Pes(){
                if (document.getElementById("Pes").src="Icons/Pes Pressed.png") {
                    document.getElementById("Pes").src="Icons/Pes Unpressed.png";
                }
                else if (document.getElementById("Pes").src = "Icons/Pes Unpressed.png") {
                    document.getElementById("Pes").src="Icons/Pes Pressed.png";
                }
            }
        </script>
    </head>
    <body>
        <div class="Main">
            <div Class="Orange1">
                <a href="Home Page/HomePage.php">
                    <img class="Logo" src="Icons/Logo.png" width="300" title="Communicazione">
                </a>
                <form method="get" action="search.php" onsubmit="return validateField()">
                    <input class="Search" type="text" name="names" width="500px" placeholder="     Search here ...">
                    <input class="SearchIcon" type="image" name="Search" src="Icons/Search.png" title="search"> 
                </form>
                <div class="Profile">
                    <a href="Home Page/HomePage.php">
                        <img class="PP" src="Icons/Default-Profile-Picture1.png" title="Default Profile Picture">
                    </a>
                    <a class="User" href="Home Page/HomePage.php"><?php echo $_SESSION['username'];?></a>
                    <a class="Log" href="Sign/sign-in-form.php">Log out</a>
                </div>
            </div>
            <div class="Orange2">
                <div class="Icons">
                    <a href="Home Page/HomePage.php">
                        <img class="HomePageIcon" src="Icons/Home-Page.png" width="300" title="Home Page">
                    </a>
                    <a href="Notification/Notification.php">
                        <img class="NotificationIcon" src="Icons/Notifications.png" width="300" title="Notifications">
                    </a>
                    <a href="pages/DarkPages.php">
                        <img class="PagesIcon" src="Icons/Pages.png" width="300" title="Pages">
                    </a>
                    <a href="groups/DarkGroups.php">
                        <img class="GroupsIcon" src="Icons/Groups1.png" width="300" title="Groups">
                    </a>
                </div>
                <div style="position: absolute;top:300px;left: 90px;font-size: 40px;">
                    <a href="help.php">?</a>
                </div>
                <div class="ChangeTheme">
                    <!-- Rounded switch -->
                    <label class="Text">Light Mode</label>
                    <button class="BTN" onclick="change()">Switch to Light Theme</button>
                </div>
            </div>
            <div class="Orange3"></div>
            <div class="Gray"></div>
            <div class="change">
                <div style="text-align: center;">
                    <h1 style="margin-top: 30px; color: #ffffff;">Search Results</h1>
            <?php
           
                $key = $_GET['names'];
                $sql = "SELECT * FROM users WHERE users.username = '$key'";
                include 'userquery.php';
                $query = mysqli_query($conn, $sql);
                if(!$query){
                    echo mysqli_error($conn);
                }
                if(mysqli_num_rows($query) == 0){
                    echo '<div class="post">';
                    echo 'There is no results';
                    echo '</div>';
                    echo '<br>';
                }
            ?>
                </div>
            </div>
        </div>
        <script>
       
            function validateField(){
                var query = document.getElementById("query");
                var button = document.getElementById("querybutton");
                if(query.value == "") {
                    query.placeholder = 'Type something!';
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>