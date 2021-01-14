<?php


include('../database_connection/database_connection.php');
session_start();

if(!isset($_SESSION['userid']))
{
 header('location:../Login and register/login.php');
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Comunicazione website created by team in 3rd cse department in ain shams university">
        <title>Chat</title>
        <style></style>
        <link rel="stylesheet" href="chat.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="icon" href="../Icons/Chat.png">        
        <script>
            function change(){
                var url = "../../Dark/chat/chat.php";
                window.location = url;
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
                    <ul class="List" id="list">
                        <!--<li><a class="MList" href="../Profile Picture/profilelight.php">Mohamed Ali</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mostafa Mohsen</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mostafa Samir</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Ahmed Atef</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight.php">Mohamed Fathy</a></li>
                        -->
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
            <div class="Chat">
                <a href="Chat.php">
                    <img src="../Icons/Chat.png" width="90" height="90" alt="New Post">
                </a>
            </div>
            <div class="Orange3"></div>
            <div class="Gray"></div>
            <div class="change">
                    <div style=" width:800px;margin-top: 50px;">
                        <div class="table-responsive">
                            <div>
                            <input type="hidden" id="is_active_group_chat_window" value="no" />
                            <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Group Chat</button>
                            </div>
                            <br />
                            <div id="user_details"></div>
                            <div id="user_model_details"></div>
                        </div>
                    </div>
            </div>
        </div>  
    </body>
</html>


<div id="group_chat_dialog" title="Group Chat Window">
    <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;"></div>
    <div class="form-group">
        <textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>
    </div>
    <div class="form-group" align="right">
        <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
    </div>
</div>

<script>  


$(document).ready(function(){

 fetch_user();


 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
  fetch_group_chat_history();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').php(data);
   }
  })
 }
 
 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).php(data);
   }
  })
 }
 function make_chat_dialog_box(to_user_id, to_user_name){

  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').php(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
  //$('#chat_message_'+to_user_id).emojioneArea({pickerPosition:"top",toneStyle: "bullet"});
 });



 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).php(data);
   }
  })
 });


 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).php(data);
   }
  })
 }
 
 
 function update_chat_history_data()
 {
    $('.chat_history').each(function(){
    var to_user_id = $(this).data('touserid');
    fetch_user_chat_history(to_user_id);
    });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });


 $(document).on('focus', '.chat_message', function(){
  var istype = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{istype:istype},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var istype = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{istype:istype},
   success:function()
   {
    
   }
  })
 });

 $('#group_chat_dialog').dialog({
 autoOpen:false,
 width:400
});

$('#group_chat').click(function(){
 $('#group_chat_dialog').dialog('open');
 $('#is_active_group_chat_window').val('yes');
 fetch_group_chat_history();
});

$('#send_group_chat').click(function(){
 var chat_message = $('#group_chat_message').val();
 var action = 'insert_data';
 if(chat_message != '')
 {
  $.ajax({
   url:"group_chat.php",
   method:"POST",
   data:{chat_message:chat_message, action:action},
   success:function(data){
    $('#group_chat_message').val('');
    $('#group_chat_history').php(data);
   }
  })
 }
});

function fetch_group_chat_history()
{
 var group_chat_dialog_active = $('#is_active_group_chat_window').val();
 var action = "fetch_data";
 if(group_chat_dialog_active == 'yes')
 {
  $.ajax({
   url:"group_chat.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#group_chat_history').php(data);
   }
  })
 }
}

$(document).on('click', '.remove_chat', function(){
  var chat_message_id = $(this).attr('id');
  if(confirm("Are you sure you want to remove this chat?"))
  {
   $.ajax({
    url:"remove_chat.php",
    method:"POST",
    data:{chat_message_id:chat_message_id},
    success:function(data)
    {
     update_chat_history_data();
    }
   })
  }
 });

});  
</script>