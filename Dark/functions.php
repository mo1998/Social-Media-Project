<?php
// Establish Connection to Database
if(!function_exists('connect')){
   function connect(){
    static $conn;
    if ($conn === NULL){ 
        $conn = mysqli_connect('localhost','root','','registration');
    }
    return $conn;
} 
}
?>