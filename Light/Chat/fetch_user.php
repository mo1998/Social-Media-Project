<?php

include('../database_connection/database_connection.php');

session_start();
$sql = "SELECT * FROM users WHERE userid != '".$_SESSION['userid']."' ";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
$output = '
<table class="table table-bordered table-hover">
    <thead> 
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>

    </thead>
';
foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['userid'], $db);
if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">Online</span>';
 }
 else
 {
  $status = '<span class="label label-danger">Offline</span>';
 }

 $output .= '
 <tbody>
    <tr>
        <td>'.$row['username'].' '.count_unseen_message($row['userid'], $_SESSION['userid'], $db).' '.fetch_is_type_status($row['userid'], $db).'</td>
        <td>'.$status.'</td>
        <td><button type="button" class="btn btn-info btn-xs start_chat"data-touserid="'.$row['userid'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
    </tr>
</tbody>    
 ';
}
$output .= '</table>';
echo $output;
?>