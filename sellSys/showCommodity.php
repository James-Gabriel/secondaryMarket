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

$sql = "select id, class, name, descrip, seller, price, evaluation, issold from commodity where seller=$userid";
$result = $con->query($sql);

print 'only change the last choosed one<br>';
print '<form action="oneCommodity.php" method="post">';
print '<table border=1>';
print '<tr>';
print '<th>id</th>';
print '<th>class</th>';
print '<th>name</th>';
print '<th>descrip</th>';
// print '<th>seller</th>';
print '<th>price</th>';
print '<th>evaluation</th>';
print '<th>issold</th>';
print '<th>alter</th>';
print '</tr>';
while($row = $result->fetch_assoc()){
        print '<tr>';
        print '<td>'.$row['id'].'</td>';
        print '<td>'.$row['class'].'</td>';
        print '<td>'.$row['name'].'</td>';
        print '<td>'.$row['descrip'].'</td>';
        // print '<td>'.$row['seller'].'</td>';
        print '<td>'.$row['price'].'</td>';
        print '<td>'.$row['evaluation'].'</td>';
        print '<td>'.$row['issold'].'</td>';
        print '<td><input type="checkbox" name=alter value='.$row['id'].'></td>';
        print '</tr>';

}
print '</table><br>';
print '<input type="submit" value="Submit">';
print '</form>';


print '<br><a href="sell.php">Sell Page</a>';

$con->close();
?>
