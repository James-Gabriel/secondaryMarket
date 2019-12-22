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


print '<form action="showCommodity.php" method="POST">';
print 'class:<br>';
print '<input type="radio" name="class" value="all">all<br>';
print '<input type="radio" name="class" value="cloth">cloth<br>';
print '<input type="radio" name="class" value="food">food<br>';
print '<input type="radio" name="class" value="toy">toy<br>';
print '<input type="radio" name="class" value="other">other<br><br>';
print '<input type="submit" value="Submit"><br><br>';
print '<input type="reset" value="Clear Form">';
print '</form>';


$userid;
$username = $_SESSION['name'];
$sql = "select id from user where name = '$username'";
$result = $con->query($sql);
while($row = $result->fetch_assoc()){
    $userid = $row['id'];
}

$sql = "select id, class, name, descrip, seller, price, evaluation from commodity where seller != '$userid' and issold = 0 and id not in (select commodityid from shopcart where userid='$userid')";
$result = $con->query($sql);

print 'only add the last choosed one<br>';
print '<form action="addInShopCart.php" method="post">';
print '<table border=1>';
print '<tr>';
print '<th>id</th>';
print '<th>class</th>';
print '<th>name</th>';
print '<th>descrip</th>';
print '<th>seller</th>';
print '<th>price</th>';
print '<th>evaluation</th>';
print '<th>addInShopCart</th>';
print '</tr>';
while($row = $result->fetch_assoc()){
        if($_POST['class'] == "cloth" && $row['class'] != "cloth"){
            continue;
        }
        if($_POST['class'] == "food" && $row['class'] != "food"){
            continue;
        }
        if($_POST['class'] == "toy" && $row['class'] != "toy"){
            continue;
        }
        if($_POST['class'] == "other" && $row['class'] != "other"){
            continue;
        }

        print '<tr>';
        print '<td>'.$row['id'].'</td>';
        print '<td>'.$row['class'].'</td>';
        print '<td>'.$row['name'].'</td>';
        print '<td>'.$row['descrip'].'</td>';
        print '<td>'.$row['seller'].'</td>';
        print '<td>'.$row['price'].'</td>';
        print '<td>'.$row['evaluation'].'</td>';
        print '<td><input type="checkbox" name=addInShopCart value='.$row['id'].'></td>';
        print '</tr>';

}
print '</table><br>';
print '<input type="submit" value="Submit">';
print '</form>';

print $cnt;
print '<br><a href="buy.php">Buy Page</a>';

$con->close();
?>