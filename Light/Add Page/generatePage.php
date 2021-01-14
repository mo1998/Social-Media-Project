<?php 

include('../database_connection/database_connection.php');
session_start();

//$page = $_SESSION['post_in_page'];
$page = 26;
$usr=$_SESSION['userid'];
$query = "SELECT * FROM pages WHERE pageid = $page ";
$stmt = $db->prepare($query);
$stmt->execute();
$rels = $stmt->fetchAll();
foreach($rels as $rel){
    if($rel['pageid']==$page){ 
        $_SESSION['pagename']=$rel['pagename'];
        $_SESSION['pagetype']=$rel['pagetype'];
        $_SESSION['pageadmin']=$rel['pageadmin'];
    } 
  }

$sql = "SELECT * FROM pageposts WHERE post_in_page = :post_in_page ORDER BY Time DESC";
$stmt = $db->prepare($sql);
$stmt->execute(['post_in_page' => $page]);
$result = $stmt->fetchAll();

  $query = "SELECT * FROM pagesmem WHERE pageid = $page";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $rs = $stmt->fetchAll();
  foreach($rs as $r){
    if($r['pageid']==$page  && $r['userid'] == $usr){ 
        $_SESSION['pesing']=$r['Joining'];
    } 
    else{
        $_SESSION['pesing']=0;
    }
  }
  ?>
<script>

        function change(){
                var url = "../../Dark/Add Page/generatePage.php";
                window.location = url;
            }
        function Un_Join(){
                document.getElementById("Join").src="../Icons/Pes Unpressed.png";
        }
        function Join(){
                document.getElementById("Join").src="../Icons/Pes Pressed.png";
        }
        var fn1 = (function() {var f1 = true; return function() {f1 ? Join() : Un_Join();
        $_SESSION['pesing'] = f1;f1 = !f1;}})();
        function Un_Pes(){
            document.getElementById("Pes").src="../Icons/Pes Pressed.png";
        }
        function Pes(){
                document.getElementById("Pes").src="../Icons/Pes Unpressed.png";
        }
        var fn3 = (function() {var f2 = false;return function() {f2 ? Pes() : Un_Pes();f2 = !f2;}})();
            
        function Function1() {
                document.getElementById("myDropdown").classList.toggle("show");
        }
            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
            function myFunction() {
                document.getElementById("Dropdown").classList.toggle("show");
            }
            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.options')) {
                    var dropdowns = document.getElementsByClassName("drop-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }

           /* $(document).ready(function(){

                make_post();
                function make_post(){
                    $.ajax({
                url:"generateGroupPost.php",
                method:"POST",
                success:function(data){
                    $('#postshit').html(data);
                }
                })
                }

            }); */
</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name="description"content="fixed">
        <title>Page</title>
        <link rel="stylesheet"href="generatePage7.css">
        <link rel="icon" href="../Icons/Groups.png">
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
                    <a class="User" href="../Profile Picture/profile.php" style="text-decoration: none;"><?php echo $_SESSION['username']; ?></a>
                    <a class="Log" href="../Login and register/logout.php" style="text-decoration: none;">Log out</a>
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
                    <ul class="List">
                      <!--  <li><a class="MList" href="../Profile Picture/profilelight.php">Mohamed Ali</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mostafa Mohsen</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mostafa Samir</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Ahmed Atef</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mohamed Fathy</a></li>
                        -->
                    </ul>
                </div>
                
                <form action="/action_page.php">
                    <input class="AddFriend" type="text" name="search" width="140px" placeholder=" Type Friend Name">
                    <div class="Mask"> @</div>
                    <button class="Add"><img class="AddImage" src="../Icons/Add.png"></button>
                    <button class="Delete"><img class="DeleteImage" src="../Icons/Delete.png"></button>
                </form>
                <div class="ChangeTheme">
                    <!-- Rounded switch -->
                    <label class="Text">Dark Mode</label>
                    <button class="BTN" onclick="change()">Switch to Dark Theme</button>
                </div>
            </div>
            <div class="AddPost">
                <a href="AddPostpage.php">
                    <img src="../Icons/addPost.png" width="90" height="90" alt="New Post">
                 </a>
            </div>
            <div class="Chat">
                <a href="../Chat/Chat.php">
                    <img src="../Icons/Chat.png" width="90" height="90" alt="New Post">
                </a>
            </div>
            <div class="Orange3"></div>
            <div class="Gray"></div>
        <div class="change" style="overflow-y:auto;position: absolute;top: 50px;left: 260px;">
            <div style="top: 10px;left: 15px; background-color: white;width:800px;height:245px;border-radius:30px;position: relative;">
                    <a href="../Group/LightGroup.php" style="padding: 5px;width: 200px;height:200px;position:absolute;top: 15px;left: 17px;border-radius: 30px;"><img src="../../FB_IMG_1593901625006.jpg" style="border-radius: 60px;width: 200px;height:200px;"/></a>
                    <a style="position:absolute;top: 30px;left: 250px;padding: 5px;font-size: 30px;font-weight: bold;color: black;text-decoration: none;" href="../Group/LightGroup.php"><?php  echo $_SESSION['pagename']; ?></a><!--no word exceed 16 letters and no page name exceeds two lines -->
                    <br><br>
                    <div style="position: absolute;left: 255px;top: 95px;width:150px;">
                        <div class="type"><img src="../Icons/type.png"width="18"height="18" title="Group Type"> <?php echo $_SESSION['pagetype']; ?></div><br>
                        <div class="admin"><img src="../Icons/admin.png"width="18"height="18" title="Admin Name" style="display:Inline;"> <?php echo $_SESSION['pageadmin']; ?></div>
                    </div>
                    <button style="height: 60px;width: 60px;right: 40px;bottom: 25px;background-color: white;cursor:pointer;border-style: none;position: absolute;" onclick="fn1()">
                        <?php if($_SESSION['pesing'] == 1){ ?>
                            <img id="Join" class="like" src="../Icons/Pes Pressed.png"width="26"height="26" alt="">
                    <?php }else{?>
                        <img id="Join" class="like" src="../Icons/Pes Unpressed.png"width="26"height="26" alt="">
                    <?php }?>
                    </button>
                    <div style="position: absolute;display: inline-block;">
                        <input type="image" src="../Icons/options.png" onclick="Function1()" class="dropbtn">
                        <div id="myDropdown" style="display: none;position: absolute;top: 40px;right: 70px;background-color: #f1f1f1;min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 1;">
                            <a href="#">Edit Group</a>
                        </div>
                    </div>
            </div>
        </div> 
        <div id="posts">
                <?php foreach($result as $one){ ?>
                    <section class="post" style="overflow:hidden;padding: 20px;font-size: 30px;align-items: center;justify-content: center;top: 350px;left:270px;grid-area: name;position: relative;background-color: white;margin: 10px;border: 1px solid white;border-radius: 30px;width: 760px;height: 350px;font-size: 30px;align-items: center;position: relative;">
                        <p class="photo" style="width: 100px;height:100px;top: 60px;left:1000px;"><img src="../Icons/Default Profile in Posts.png" alt="" style="width: 70px;height:70px;left:60px;"></p>
                        <div class="head" style = "color: black;position: absolute;left: 130px;top: 40px;font-size: 30px;"><?php echo $_SESSION['pagename']; ?></div>
                        <p class="info" style="grid-area: content;padding:15px;margin-bottom:25px;margin-top: 35px;margin-left: 50px;margin-right: 10px;color:black;font-size: 25px;"><?php echo $one['post_caption']; ?></p>
                        <button  onclick="fn3()" class="pes" style = "grid-area: like;border-top:4px solid  #d8d7d6;padding: 5px;height: 116px;border-radius: 0px 0px 0px 30px;background-color: white;border-right: #2d2d2d;border-bottom: #2d2d2d;border-left: #2d2d2d;position: absolute;bottom: 0px;left: 0px;width: 100px;">
                            
                            <?php if($one['pecset'] == 1){ ?>
                                <img id="Pes" src="../Icons/Pes Pressed.png" alt="" style="position: absolute;left: 10px;bottom: 0px;height: 70px;width: 50px;background-color: white;">
                            <?php }else{?>
                                <img id="Pes" src="../Icons/Pes Unpressed.png" alt="" style="position: absolute;left: 10px;bottom: 0px;height: 70px;width: 50px;background-color: white;">
                            <?php }?>
                        </button>
                        <button class="share" style="border-top: 4px solid  #d8d7d6;grid-area: share;padding: 5px;height: 116px;border-radius: 0px 0px 30px 0px;background-color: white;border-right: #2d2d2d;border-bottom: #2d2d2d;border-left: #2d2d2d;position: absolute;bottom: 0px;left: 0px;width: 100px;"><img src="../Icons/Share.png" alt=""></button>
                        <input class="options" type="image" src="../Icons/options.png" width="40px"; height=40px; left: 20px; onclick="myFunction() " style="position: relative;padding: 16px;font-size: 16px;border: none;cursor: pointer;margin: 15px;width: 40px;height: 40px;left: 600px;">
                        <div id="Dropdown" class="drop-content" style="top: 30px;right: 55px;display: none;position: absolute;background-color: white;min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 1;">
                            <a href="../Add Post/AddPost.html">Edit Post</a>
                            <a href="#">Save Post</a>
                        </div>
                        <form method="POST" class="Frm" style = "grid-area:comment;border-top: 4px solid  #d8d7d6">
                            <input type="text" id="comment" name="comment" placeholder="Discuss Here ..." style="font-size: 16px;background-color: white;color: #d8d7d6;width: 100%;padding: 20px 20px;margin: 20px 0;box-sizing: border-box;font-size:30px;border-color: #d8d7d6;border-radius:0 0 30px 30px;">
                            <input class="BTN1" type="submit" name = "post" value="Comment"/>
                        </form>
                    </section>
                <?php } ?>  
        </div>
       
     </div>
    </body>
</html>
