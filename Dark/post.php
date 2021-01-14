<?php
	$output = '<section class="post" style="padding: 20px;font-size: 30px;align-items: center;justify-content: center;margin-top: auto;grid-area: name;position: relative;background: #2d2d2d;
    margin: 10px;
  border: 1px solid #2d2d2d;
  border-radius: 30px;
  width: 800px;
  height: auto;
  padding: 20px;
    font-size: 30px;
    align-items: center;
  
    position: relative;">
    <p class="photo" style="grid-area: photo;
    width: 100px;
    height:100px;
    align-items: center;
    justify-content: center;
    margin-top: auto;"><img src="../Icons/Default Profile in Posts.png" alt="" style="width: 70px;
    height:70px;"></p>
                    <div class="head" style = "color: #a3a3a3;
    position: absolute;
    left: 130px;
    top: 60px;
    font-size: 30px;">' . $row['username'] . '</div>
                    <p class="info" style="grid-area: content;
    padding:15px;
    margin-bottom:25px;
    margin-top: 35px;
    margin-left: 50px;
    margin-right: 10px;
    font-size: 25px;
    color: #a3a3a3;">' . $row['post_caption'] . '</p>
    <button  onclick="Un_Pes()" class="pes" style = "grid-area: like;
    border-top:4px solid #121212;
    padding: 5px;
    height: 117px;
    border-radius: 0px 0px 0px 30px;
    background-color: #2d2d2d;
    border-right: #2d2d2d;
    border-bottom: #2d2d2d;
    border-left: #2d2d2d;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100px;"><img id="Pes" src="../Icons/Pes Unpressed.png" alt="" style="position: absolute;
     left: 10px;
     bottom: 0px;
     height: 70px;
     width: 50px;
     background-color: #2d2d2d;"></button>
                    
                    
                    <button class="share" style="border-top: 4px solid #121212;
    grid-area: share;
    padding: 5px;
    height: 117px;
    border-radius: 0px 0px 30px 0px;
    background-color: #2d2d2d;
    border-right: #2d2d2d;
    border-bottom: #2d2d2d;
    border-left: #2d2d2d;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100px;"><img src="../Icons/Share.png" alt=""></button>
                    <input class="options" type="image" src="../Icons/options.png" width="40px"; height=40px; left: 20px; onclick="myFunction() style="position: relative;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    margin: 15px;
    width: 40px;
    height: 40px;
    left: 20px;">
                    <div id="Dropdown" class="drop-content" style="top: 30px;
    right: 55px;
    display: none;
    position: absolute;
    background-color: #f1f1f1b0;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;">
                        <a href="../Add Post/AddPost.html">Edit Post</a>
                        <a href="#">Save Post</a>
                    </div>
                    <form method="POST" class="Frm" style = "grid-area:comment;   
    border-top: 4px solid #121212;">
                        <input type="text" id="comment" name="comment" placeholder="Discuss Here ..." style="font-size: 16px;
    background-color: #2d2d2d;
    color:gray;
    width: 100%;
    padding: 20px 20px;
    margin: 20px 0;
    box-sizing: border-box;
    font-size:30px;
    border-color:#a3a3a3;
    border-radius:0 0 30px 30px;">
    <input type="submit" name="comm" value="Discuss" style="width: 100px; height: 80px; position: absolute;right:100px ;top:230px; border-radius:0px 0px 40px 0px; background-color:#2d2d2d; color:#A3a3a3; ">
                    </form>
                </section>';
    echo $output;
?>  
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post'])) { // Form is Posted
    // Assign Variables
    $comm = $_POST['comment'];
    $poster = $_SESSION['userid'];
    $postid = $row['post_id'];
    // Apply Insertion Query
    $s = "INSERT INTO `comments` (`comment_id`, `body`, `comment_time`, `comment_by`, `post_id`) VALUES (NULL, '$comm', NOW(), '$poster', '$postid')"
    ;
    $q = mysqli_query($conn, $s);
}
else{
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>error";
}
?>