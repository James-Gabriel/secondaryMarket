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

$userid;
$username = $_SESSION['name'];
$sql = "select id from user where name = '$username'";
$result = $con->query($sql);
while($row = $result->fetch_assoc()){
    $userid = $row['id'];
}
$commodityid = $_POST["addInShopCart"];

$sql = "insert into shopcart(userid, commodityid) values('$userid','$commodityid')";

if ($con->query($sql) === TRUE){
        print "insert sucessfully";

}else{
        print "error:".$sql."<br>".$con->error;
}
$con->close();

print '<br><a href="buy.php">Buy Page</a>';
?>
