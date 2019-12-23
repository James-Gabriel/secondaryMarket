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

$userName = $_SESSION['name'];

if(!$userName){
	print "please <a href=\"../userSys/login.html\">Login</a> first<br>\n";
	exit;
}

$sql = "update user set isseller='2' where name = '$userName'";
if ($con->query($sql) === TRUE){
        print "apply sucessfully";
}else{
        print "error:".$sql."<br>".$con->error;
}
$con->close();

print '<br><a href="../index.php">Main Page</a>';
?>
