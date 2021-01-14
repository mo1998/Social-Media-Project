<?php

$query = mysqli_query($conn, $sql);
if(!$query){
    echo mysqli_error($conn);
}
$width = '168px';
$height = '168px';
if(mysqli_num_rows($query) == 0){
    echo '<div class="userquery">';
    echo 'We couldn\'t find any results';
    echo '<br><br>';
    echo '</div>';
} else {
    while($row = mysqli_fetch_assoc($query)){
        echo '<a class="profilelink" style="color:#e57417;" href="Profile Picture/profile.php?id=' . $row['userid'] .'">' . $row['username'] .  '<a>';
        echo '</div>';
        echo '<br>';
    }
}


?>