<?php


$db = new PDO("mysql:host=localhost;dbname=registration;charset=utf8mb4", "root", "");

function fetch_user_last_activity($userid, $db)
{
 $query = "SELECT * FROM login_details WHERE userid = '$userid' ORDER BY lastactivity DESC LIMIT 1";
 
 $stmt=$db->prepare($query);
 $stmt->execute();
 $result = $stmt->fetchAll();
 foreach($result as $row)
 {
  return $row['lastactivity'];
 }
}
function fetch_user_chat_history($from_user_id, $to_user_id, $db){
    $query = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."') ORDER BY timestamp DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '<ul class="list-unstyled">';

    foreach($result as $row){
        $user_name = '';
        $dynamic_background = '';
        $chat_message = '';
        if($row["from_user_id"] == $from_user_id)
        {
            if($row["status"] == '2')
            {
                $chat_message = '<em>This message has been removed</em>';
                $user_name = '<b class="text-success">You</b>';
            }
            else
            {
                $chat_message = $row['chat_message'];
                $user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success">You</b>';

            }
            
            $dynamic_background = 'background-color:#ffe6e6;';
        }
        else
        {
            if($row["status"] == '2')
            {
                $chat_message = '<em>This message has been removed</em>';

            }
            else
            {
                $chat_message = $row["chat_message"];

            }

            $user_name = '<b class="text-danger">'. get_user_name ($row['from_user_id'], $db).'</b>';
            $dynamic_background = 'background-color:#ffffe6;';
        }
        $output .= '
        <li style="border-bottom:1px dotted #ccc">
        <p>'.$user_name.' - '.$chat_message.'
            <div align="right">
            - <small><em>'.$row['timestamp'].'</em></small>
            </div>
        </p>
        </li>
        ';
    }
    $output .= '</ul>';
    $query = "UPDATE chat_message SET status = '0' WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."' AND status = '1'";
    $statement = $db->prepare($query);
    $statement->execute();
    
    return $output;
}

function get_user_name($userid, $db){
    $query = "SELECT username FROM users WHERE userid = '$userid'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        return $row['username'];

    }
}
function count_unseen_message($from_user_id, $to_user_id, $db)
{
    $query = "SELECT * FROM chat_message WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' AND status = '1'"; //1 mean the message is unseen yet
    $statement = $db->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $output = '';
    if($count > 0)
    {
    $output = '<span class="label label-success">'.$count.'</span>';
    }
    return $output;
}

function fetch_is_type_status($userid, $db)
{

    $query = "SELECT istype FROM login_details WHERE userid = '".$userid."' ORDER BY lastactivity DESC LIMIT 1"; 
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row){
        if($row["istype"] == 'yes'){
            $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
        }
    }
    return $output;
}

function fetch_group_chat_history($db)
{

    $query = "SELECT * FROM chat_message WHERE to_user_id = '0'  ORDER BY timestamp DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $output = '<ul class="list-unstyled">';
    foreach($result as $row){
        $user_name = '';
        $chat_message = '';
        $dynamic_background = '';
        if($row["from_user_id"] == $_SESSION["userid"])
        {
            if($row["status"] == '2')
            {
                $chat_message = '<em>This message has been removed</em>';
                $user_name = '<b class="text-success">You</b>';
            }
            else
            {
                $chat_message = $row['chat_message'];
                $user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success">You</b>';
            }
            
            $dynamic_background = 'background-color:#ffe6e6;';
        }
        else
        {
            if($row["status"] == '2')
            {
                $chat_message = '<em>This message has been removed</em>';
            }
            else
            {
                $chat_message = $row['chat_message'];
            }
        $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $db).'</b>';
        }

        $output .= '

        <li style="border-bottom:1px dotted #ccc">
         <p>'.$user_name.' - '.$chat_message.' 
          <div align="right">
           - <small><em>'.$row['timestamp'].'</em></small>
          </div>
         </p>
        </li>
        ';
    }
    $output .= '</ul>';
    return $output;
}

?>
