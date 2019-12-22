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

$commodityid = $_POST["commodityid"];
$review = $_POST["review"];

$sql = "insert into user(name, password, birthday, gender, email, phone, isadmin) values('$name','$password','$birthday','$gender', '$email', '$phone', '0')";
$sql = "update commodity set evaluation = '$review' where id = '$commodityid'";
if ($con->query($sql) === TRUE){
        print "update sucessfully";
}else{
        print "error:".$sql."<br>".$con->error;
}
$con->close();

print '<br><a href="buy.php">Buy Page</a>';
?>
