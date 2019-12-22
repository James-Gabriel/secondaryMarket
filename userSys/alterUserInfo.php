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
$name = $_POST["name"];
$password = $_POST["password"];
$birthday = $_POST["birthday"];
$gender =  $_POST["gender"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$sql = "update user set name='$name', password='$password', birthday='$birthday', gender='$gender', email='$email', phone='$phone' where id = '$id'";
if ($con->query($sql) === TRUE){
        print "update sucessfully";
        $_SESSION['name'] = $name;
}else{
        print "error:".$sql."<br>".$con->error;
}
$con->close();

print '<br><a href="../index.php">Main Page</a>';
?>
