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

$commodityid = $_POST['review'];
if($commodityid != ""){
    print '<form action="addReview.php" method="POST">';
    print 'commodityid:<br>';
    print '<input type="text" name="commodityid" readonly="readonly" value="'.$commodityid.'"><br><br>';
    print 'review:<br>';
    print '<input type="text" name="review" readnoly="readonly"><br><br>';
    print '<input type="submit" value="Submit"><br><br>';
    print '<input type="reset" value="Clear Form">';
    print '</form>';
    exit;
}

$commodityid = $_POST['return'];
$sql = "delete from shoporder where userid='$userid' and commodityid='$commodityid'";
if($con->query($sql) != TRUE){
    print "error:".$sql."<br>".$con->error;
    exit;
}
$sql = "update commodity set issold = 0 where id = '$commodityid'";
if($con->query($sql) != TRUE){
    print "error:".$sql."<br>".$con->error;
    exit;
}
$sql = "update commodity set evaluation = NULL where id = '$commodityid'";
if($con->query($sql) != TRUE){
    print "error:".$sql."<br>".$con->error;
    exit;
}
print "return sucessfully";

$con->close();

print '<br><a href="buy.php">Buy Page</a>';
?>
