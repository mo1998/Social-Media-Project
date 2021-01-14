<?php 

session_start();
include('../database_connection/database_connection.php');
$pageerrors = array(); 
$pagename="";
$pagetype="";

if (isset($_POST['AddPage'])) 
{
  $pagename =  $_POST['pageName'];
  $pagetype =  $_POST['pageType'];
  $adminName = $_SESSION['username'];
  if (empty($pagename)) {
    array_push($pageerrors, "Page Name is required");
  }
  if (empty($pagetype)) {
    array_push($pageerrors, "Page Type is required");
  }
  if (count($pageerrors) == 0) 
  {
    $query = "INSERT INTO Pages (pagename, pagetype, pageadmin) VALUES('$pagename', '$pagetype', '$adminName')";
    $statement = $db->prepare($query);
    $statement->execute();

    $query ="SELECT * FROM Pages  ";
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $userid = $_SESSION['userid'];
    foreach($rows as $row ){
      if($row['pagename']== $pagename){ 
        $id = $row['pageid'];
      } 
    }
    $v1 = 1;
    $query = "INSERT INTO pagesmem (page_name, pageid, userid, Joining) VALUES('$pagename', '$id', '$userid', '$v1')";
    $statement = $db->prepare($query);
    $statement->execute();

    $_SESSION['pagename']=$pagename;
    $_SESSION['pagetype']=$pagetype;
    $_SESSION['pageadminName']=$adminName;
    header('location: generatePage.php');

  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name="description"content="sign-in form">
        <link rel="stylesheet"href="addpage.css">
        <title>
            Add Page
        </title>
        <style>
        </style>
        <script></script>
    </head>
    <body>
        <div class="container">
            <div class="sign-in-up-container">
                <form class="sign-in-form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                 <?php include('pageerrors.php'); ?>  
                    <h2 class="head">Add Page</h2>
                        <br>
                        <br>
                        <div class="input">
                        <i class="fa fa-envelope icon">   <img src="../Icons/type.png"width="16" height="16"></i>
                        <input type="text" name="pageName" placeholder="PageName">
                        </div>
                        <div class="input">
                            <i class="fa fa-envelope icon">   <img src="../Icons/admin.png" width="16" height="16"></i>
                            <input type="text" name="pageType" placeholder="pagetype">
                        </div>
                        <button type="submit" class="sign-in" name="AddPage">AddPage</button>
                        <br>
                        <br>
                        <br>
                        <br>
                    <span></span>
                    <br>
                    <br>
                    </form>
                </div>
        </div>
        <script>
        </script>
    </body>
</html>