<?php session_start();

$config = require('../config.php');
$dbuser = $config['dbuser'];
$dbpassword = $config['dbpassword'];
$dbname = $config['dbname'];

$con = new mysqli("localhost", $dbuser, $dbpassword, $dbname);

if(!$con){
        print "can't connect to mysql server\n";
        exit;
}

$userName = $_SESSION['name'];

$sql = "select id, name, password, birthday, gender, email, phone, isseller, isadmin from user where name = '$userName'";
$result = $con->query($sql);

while($row = $result->fetch_assoc()){
    print "id:";
    print $row[id]."</br>\n";
    
    print "name:";
    print $row[name]."</br>\n";

	print '<br><a href="../userSys/personalInfo.php">Alter Personal Information</a>';
	
	if($row[isseller]==='0'){
    	print '<br><a href="../userSys/applySeller.php">Apply to be a Seller</a>';
    }else if($row[isseller]==='2'){
    	print '<br>application in process';
    }
    
    if($row[isadmin]==='1'){
    	print '<br><a href="../adminSys/listUsers.php">List Users</a>';
    }
    
}

print '<br><a href="../userSys/logout.php">Logout</a>';
print '<br><a href="../index.php">Main Page</a>';

$con->close();
?>
