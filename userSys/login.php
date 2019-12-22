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


$name = $_POST["name"];
$password = $_POST["password"];

$sql = "select * from user where name = '$name' and password = '$password' ";

$result = $con->query($sql);

$cnt = 0;
while($result->fetch_assoc()){
    $cnt = $cnt + 1;
}
if($cnt == 1){
    print "login sucessfully";
    $_SESSION['name'] = $name;
}else{
    print "login unsucessfully";
}

$con->close();

print '<br><a href="../index.php">Main Page</a>';
?>
