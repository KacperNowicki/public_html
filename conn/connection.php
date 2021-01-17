<?php 
$host = "localhost"; // database host
$user = "id15835441_admin"; // database username
$db_password = "S{-C7JLk)f<Lc<Kb"; // database password
$db_name = "id15835441_waitlist"; // table



// we connect over to MySQL using MySQLi
$conn= mysqli_connect($host,$user,$db_password,$db_name);
if($conn){
    // display a message if connected
}
else{
    echo"not connected";
}

?>