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

$class = $_POST["class"];
$name = $_POST["name"];
$descrip = $_POST["descrip"];
$price = $_POST["price"];
$userid;

$username = $_SESSION['name'];
$sql = "select id from user where name = '$username'";
$result = $con->query($sql);

while($row = $result->fetch_assoc()){
    $userid = $row['id'];
}

$sql = "insert into commodity(class, name, descrip, seller, price, issold) values('$class', '$name','$descrip','$userid','$price','0')";

if ($con->query($sql) === TRUE){
        print "insert sucessfully";
}else{
        print "error:".$sql."<br>".$con->error;
}
$con->close();

print '<br><a href="sell.php">Main Page</a>';
?>
