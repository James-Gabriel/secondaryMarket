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

require('verify.php');
verify($userName, $con);

if(!array_key_exists("check", $_POST)){
	print "Empty Request\n";
	exit;
}
$checkList = $_POST["check"];

$flag=2;
if($_REQUEST['decline']){
	$flag=0;
}

$sql = "update user set isseller=".$flag." where id in (".implode(",", $checkList).")";

if ($con->query($sql) === TRUE){
        print "update sucessfully";
}else{
        print "error:".$sql."<br>".$con->error;
}

$con->close();

print '<br><a href="../index.php">Main Page</a>';
?>
