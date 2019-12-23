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

$sql = "select id, class, name, descrip, seller, price, evaluation from commodity";
$result = $con->query($sql);

print '<form action="deleteCommodity.php" method="POST">';

print '<table border="1">';

	print "<tr>";
	print '<th>id</th>';
	print '<th>class</th>';
	print '<th>name</th>';
	print '<th>descrip</th>';
	print '<th>seller</th>';
	print '<th>price</th>';
	print '<th>evaluation</th>';
	print '<th>check</th>';
	print "</tr>";

while($row = $result->fetch_assoc())
{
	print "<tr>";
	
	print '<td>'.$row[id].'</td>';
	print '<td>'.$row['class'].'</td>';
	print '<td>'.$row[name].'</td>';
	print '<td>'.$row[descrip].'</td>';
	print '<td>'.$row[seller].'</td>';
	print '<td>'.$row[price].'</td>';
	print '<td>'.$row[evaluation].'</td>';
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
