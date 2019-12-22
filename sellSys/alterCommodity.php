<?php session_start();

$config = require('../config.php');
$dbuser = $config['dbuser'];
$dbpassword = $config['dbpassword'];
$dbname = $config['dbname'];

$con = new mysqli("127.0.0.1", $dbuser, $dbpassword, $dbname);
if(!$con){
        print "can't connect to mysql server\n";
        exit;
}

$id = $_POST["id"];
$class = $_POST["class"];
$name = $_POST["name"];
$descrip = $_POST["descrip"];
$price =  $_POST["price"];

$sql = "update commodity set class='$class',name='$name', descrip='$descrip', price='$price' where id = '$id'";
if ($con->query($sql) === TRUE){
        print "update sucessfully";
}else{
        print "error:".$sql."<br>".$con->error;
}
$con->close();

print '<br><a href="sell.php">Main Page</a>';
?>
