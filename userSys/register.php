<?php session_start();

$config = require('../config.php');
$dbuser = $config['dbuser'];
$dbpassword = $config['dbpassword'];
$dbname = $config['dbname'];

$con = new mysqli("localhost", $dbuser, $dbpassword, $dbname);

if($con->connect_errno){
        print "can't connect to mysql server\n";
        exit;
}

$name = $_POST["name"];
$password = $_POST["password"];
$birthday = $_POST["birthday"];
$gender =  $_POST["gender"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$sql = "insert into user(name, password, birthday, gender, email, phone, isseller, isadmin) values('$name','$password','$birthday','$gender', '$email', '$phone', '0', '0')";

if ($con->query($sql) === TRUE){
        print "insert sucessfully";
        $_SESSION['name'] = $name;

}else{
        print "error:".$sql."<br>".$con->error;
}
$con->close();

print '<br><a href="../index.php">Main Page</a>';
?>
