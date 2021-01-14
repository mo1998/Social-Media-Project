<?php 

include('../database_connection/database_connection.php');
session_start();
//add group name in groupsmem table

$id_us=$_SESSION['userid'];
$query = "SELECT * FROM PagesMem WHERE userid = :userid  ";
$statement = $db->prepare($query);
$statement->execute(['userid' => $id_us]);
$rows = $statement->fetchAll();

$query = "SELECT * FROM pagesmem WHERE userid != :userid  ";
$statement = $db->prepare($query);
$statement->execute(['userid' => $id_us]);
$relates = $statement->fetchAll();
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Comunicazione website created by team in 3rd cse department in ain shams university">
        <title>Pages</title>
        <style></style>
        <link rel="stylesheet" href="LightStyle.css">
        <link rel="icon" href="../Icons/Page.png">        
        <script>
            function change(){
                var url = "../../Dark/Pages/DarkPages.php";
                window.location = url;
            }
            function Un_Pes(){
                if (document.getElementById("Pes").src="../Icons/Pes Pressed.png") {
                    document.getElementById("Pes").src="../Icons/Pes Unpressed.png";
                }
                else if (document.getElementById("Pes").src == "../Icons/Pes Unpressed.png") {
                    document.getElementById("Pes").src="../Icons/Pes Pressed.png";
                }
            }
        </script>
    </head>
    <body>
        <div class="Main">
            <div Class="Orange1">
                <a href="../Home Page/HomePage.php">
                    <img class="Logo" src="../Icons/Logo.png" width="300" title="Communicazione">
                </a>
                <form action="/action_page.php">
                    <input class="Search" type="text" name="search" width="500px" placeholder="     Search here ...">
                    <input class="SearchIcon" type="image" name="Search" src="../Icons/Search.png" title="search"> 
                </form>
                <div class="Profile">
                    <a href="../Profile Picture/profile.php">
                        <img class="PP" src="../Icons/Default Profile Picture1.png" title="Default Profile Picture">
                    </a>
                    <a class="User" href="../Profile Picture/profile.php"><?php echo $_SESSION['username'];?></a>
                    <a class="Log" href="../Login and register/logout.php">Log out</a>
                </div>
            </div>
            <div class="Orange2">
                <div class="Icons">
                    <a href="../Home Page/HomePage.php">
                        <img class="HomePageIcon" src="../Icons/Home-Page.png" width="300" title="Home Page">
                    </a>
                    <a href="../Notifications/Notification.php">
                        <img class="NotificationIcon" src="../Icons/Notification.png" width="300" title="Notifications">
                    </a>
                    <a href="../pages/LightPages.php">
                        <img class="PagesIcon" src="../Icons/Pages.png" width="300" title="Pages">
                    </a>
                    <a href="../groups/LightGroups.php">
                        <img class="GroupsIcon" src="../Icons/Groups.png" width="300" title="Groups">
                    </a>
                </div>
                <div class="MentionList">
                    <ul class="List" id="list">
                        <!--<li><a class="MList" href="../Profile Picture/profilelight.php">Mohamed Ali</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mostafa Mohsen</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mostafa Samir</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Ahmed Atef</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mohamed Fathy</a></li>-->
                    </ul>
                </div>
                
                <form action="">
                    <input class="AddFriend" id="idea" type="text" name="search" width="140px" placeholder=" Type Friend Name">
                    <div class="Mask"> @</div>
                    <button class="Add" value="add to list" id="add"><img class="AddImage" value="add to list" id="add" src="../Icons/Add.png"></button>
                    <button class="Delete"><img class="DeleteImage" src="../Icons/Delete.png"></button>
                </form>
                <div class="ChangeTheme">
                    <!-- Rounded switch -->
                    <label class="Text">Dark Mode</label>
                    <button class="BTN" onclick="change()">Switch to Dark Theme</button>
                </div>
            </div>
            <div class="AddPost">
                <a href="../Add Page/addpage.php">
                    <img src="../Icons/addPost.png" width="90" height="90" alt="New Post">
                </a>
            </div>
            <div class="Chat">
                <a href="../Chat/Chat.php">
                    <img src="../Icons/Chat.png" width="90" height="90" alt="Chat">
                </a>
            </div>
            <div class="Orange3"></div>
            <div class="Gray"></div>
            <div class="change">
                <label class="FirstLabel">Liked Pages</label><br>
                <ul class="Upper">
                    <?php foreach($rows as $row){ ?>
                        <li class="Card">
                            <?php $_SESSION['post_in_page']=$row['pageid']; ?>
                            <a href="../Add Page/generatePage.php">
                                <img class="ImgPage" src="../../FB_IMG_1593901625006.jpg">
                            </a>
                            <br>
                            <a class="PageName" href="../Add Page/generatePage.php"><?php echo $row['page_name']; ?></a>
                            <button class="Like" onclick="Un_Pes()">
                                <?php if($row['Joining']){ ?>
                                    <img src="../Icons/Pes Pressed.png" id="Pes" width="30px" height="30px">
                                <?php }else{?>
                                    <img src="../Icons/Pes Unpressed.png" id="Pes" width="30px" height="30px">
                                <?php }?>
                            </button>
                        </li>
                    <?php } ?>
                </ul>
                <label class="SecondLabel">Related Pages</label><br>
                <ul class="Lower">
                    <?php foreach($relates as $relate){ ?>
                        <li class="Card">
                            <?php $_SESSION['post_in_page']=$relate['pageid']; ?>
                            <a href="../Add Page/generatePage.php">
                                <img class="ImgPage" src="../../FB_IMG_1593901625006.jpg">
                            </a>
                            <br>
                            <a class="PageName" href="../Add Page/generatePage.php"><?php echo $relate['page_name']; ?></a>
                            <button class="Like" onclick="Un_Pes()">
                                <?php if(!$relate['Joining']){ ?>
                                    <img src="../Icons/Pes Pressed.png" id="Pes" width="30px" height="30px">
                                <?php }else{?>
                                    <img src="../Icons/Pes Unpressed.png" id="Pes" width="30px" height="30px">
                                <?php }?>
                            </button>
                        </li>
                    <?php } ?>
                </ul>
            </div>
    </body>
</html>