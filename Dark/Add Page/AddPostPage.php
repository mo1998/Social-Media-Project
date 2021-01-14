<?php

include('../database_connection/database_connection.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Jay Skript and the Domsters</title>
<link rel="stylesheet" media ="screen" href = "AddPostPage.css"/>

</head>
<body>
<header>
<nav>
    Adding a new discussion.
</nav>
</header>
<form method="POST" action="" enctype="multipart/form-data">
    <textarea cols="45" rows="7" id="post" name="caption" required="required" placeholder="Write your discussion here."></textarea>
    <input type="file" id="myFile" name="image">
    <input id = "sumbitPost" type="submit" name = "post" value="Post"/>
</form>
<script src="script.js"></script>
<script>
        // Invoke preview when an image file is choosen.
        $(document).ready(function(){
            $('#imagefile').change(function(){
                preview(this);
            });
        });
        // Preview function
        function preview(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (event){
                    $('#preview').attr('src', event.target.result);
                    $('#preview').css('display', 'initial');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if($_SESSION['pageadmin'] == $_SESSION['username']){
        $caption = $_POST['caption'];
        $page_name= $_SESSION['pagename'];
        $query = "SELECT pageid  FROM pages WHERE pagename = :pagename ";
        $statement = $db->prepare($query);
        $statement->execute(['pagename' => $page_name]);
        $rows = $statement->fetchAll();
        foreach($rows as $row){
            $result=$row['pageid'];
        }
        $query = "INSERT INTO pageposts (post_caption, post_in_page) VALUES('$caption', '$result')";
        $statement = $db->prepare($query);
        $statement->execute();
        if($statement){
            $_SESSION['post_in_page']= $result ;
            echo $page_name;
            header('location: generatePage.php');

        }
    }

}
?>
