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


$sql = "select id, name, password, birthday, gender, email, phone, isadmin from user";
$result = $con->query($sql);

print '<form action="deleteUser.php" method="POST">';

print '<table border="1">';

	print "<tr>";
	print '<th>id</th>';
	print '<th>name</th>';
	print '<th>birthday</th>';
	print '<th>gender</th>';
	print '<th>email</th>';
	print '<th>phone</th>';
	print '<th>isadmin</th>';
	print '<th>check</th>';
	print "</tr>";

while($row = $result->fetch_assoc())
{
	print "<tr>";
	
	print '<td>'.$row[id].'</td>';
	print '<td>'.$row[name].'</td>';
	print '<td>'.$row[birthday].'</td>';
	print '<td>'.$row[gender].'</td>';
	print '<td>'.$row[email].'</td>';
	print '<td>'.$row[phone].'</td>';
	print '<td>'.$row[isadmin].'</td>';
	print "<td><input type=\"checkbox\" name=\"check[]\" value=\"".$row[id]."\"></td>";
	
	print "</tr>";
}

print '</table>';

print '<input type="submit" value="Delete"><br>';

print '<input type="reset" value="Clear Form">';
    
print '</form>';

print '<br><a href="../index.php">Main Page</a>';

$con->close();
?>
