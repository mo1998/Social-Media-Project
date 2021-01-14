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
        <title>Help</title>
        <style></style>
        <link rel="stylesheet" href="Home Page/DarkStyle.css">
        <link rel="stylesheet" href="Home Page/posts-profile.css">
        <link rel="icon" href="Icons/Home Page1.png">    
        <style type="text/css">
            .help p{
                color: #fff333;
            }
            .help img{
                width: 400px;
                height: 200px;
                margin: 10px;
            }
        </style>    
        <script>
            function change(){
                var url = "../Light/help.php";
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
                    <a href="Profile Picture/profile.php">
                        <img class="PP" src="Icons/Default-Profile-Picture1.png" title="Default Profile Picture">
                    </a>
                    <a class="User" href="Profile Picture/profile.php"><?php echo $_SESSION['username'];?></a>
                    <a class="Log" href="Login and register/Logout.php">Log out</a>
                </div>
            </div>
            <div class="Orange2">
                <div class="Icons">
                    <a href="Home Page/HomePage.php">
                        <img class="HomePageIcon" src="Icons/Home-Page.png" width="300" title="Home Page">
                    </a>
                    <a href="Notifications/Notification.php">
                        <img class="NotificationIcon" src="Icons/Notifications.png" width="300" title="Notifications">
                    </a>
                    <a href="pages/DarkPages.php">
                        <img class="PagesIcon" src="Icons/Pages.png" width="300" title="Pages">
                    </a>
                    <a href="groups/DarkGroups.php">
                        <img class="GroupsIcon" src="Icons/Groups1.png" width="300" title="Groups">
                    </a>
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
                <div class="help" style="text-align: center;">
                    <h2 style="margin-top: 30px; color: #ffffff;">Add post</h2>
                    <p>To add post you should click the + button in Home page and you will be directed to add post page, write what you think about it and click post.</p>
                    <img src="Icons/Screenshot (353).png">
                    <img src="Icons/Screenshot (354).png">
                    <p>Post will be added successffully.</p>
                    <img src="Icons/Screenshot (355).png">
                    <h2 style="margin-top: 30px; color: #ffffff;">Search</h2>
                    <p>To search for persons or groups or pages just write the name in search box and click search.</p>
                    <img src="Icons/Screenshot (356).png">
                    <img src="Icons/Screenshot (357).png">
                    <h2 style="margin-top: 30px; color: #ffffff;">Add friends</h2>
                    <p>Click send request friend in profile page and request will be sent to your friend if he/she accepted you will be friends. </p>
                    <img src="Icons/Screenshot (358).png">
                    <img src="Icons/Screenshot (359).png">
                    <h2 style="margin-top: 30px; color: #ffffff;">Delete friends</h2>
                    <p>Click delete friend in friends page and your friend will be removed from your friends list. </p>
                    <img src="Icons/Screenshot (360).png">
                    <h2 style="margin-top: 30px; color: #ffffff;">Add to mention list</h2>
                    <p>Click Add to mention list in mentions page and friend will be added successfully to your mention list.</p>
                    <img src="Icons/Screenshot (362).png">
                    <img src="Icons/Screenshot (363).png">
                    <h2 style="margin-top: 30px; color: #ffffff;">Add comment and mention</h2>
                    <p>To add comment write your comment in text area(Discuss here) and click discuss, comment will be added successfuly. </p>
                    <p>To mention friends click mention and your friends in your mention list will be mentioned.</p>
                    <img src="Icons/Screenshot (364).png">
                    <img src="Icons/Screenshot (365).png">
                    <img src="Icons/Screenshot (366).png">
                    <h2 style="margin-top: 30px; color: #ffffff;">Save and share posts</h2>
                    <img src="Icons/Screenshot (368).png">
                    <p>To Share posts click share button and post will be shared in your timeline. </p>
                    <img src="Icons/Screenshot (369).png">
                    <p>To Save posts click save button and post will be saved in your saved posts archive.</p>
                    <img src="Icons/Screenshot (370).png">
                    <h2 style="margin-top: 30px; color: #ffffff;">FAQ</h2>
                    <p>What is the maximun length of user name? 10 chracters.</p>
                    <p>What should i do if server failed to load? Just refresh page or sign in again. </p>
                </div>
            </div>
        </div>
    </body>
</html>