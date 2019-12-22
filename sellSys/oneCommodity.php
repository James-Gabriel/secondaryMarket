<?php

$config = require('../config.php');
$dbuser = $config['dbuser'];
$dbpassword = $config['dbpassword'];
$dbname = $config['dbname'];

$con = new mysqli("127.0.0.1", $dbuser, $dbpassword, $dbname);

if(!$con){
        print "can't connect to mysql server\n";
        exit;
}


$id = $_POST['alter'];

$sql = "select id, class, name, descrip, seller, price, evaluation, issold from commodity where id = '$id'";
$result = $con->query($sql);

while($row = $result->fetch_assoc()){
        print '<form action="alterCommodity.php" method="POST">';
        print 'id:<br>';
        print '<input type="text" name="id" readonly="readonly" value="'.$row[id].'"><br><br>';

        print 'class:<br>';
        if($row['class'] == 'cloth'){
            print '<input type="radio" name="class" value="cloth" checked>cloth<br>';
            print '<input type="radio" name="class" value="food">food<br>';
            print '<input type="radio" name="class" value="toy">toy<br>';
            print '<input type="radio" name="class" value="other">other<br><br>'; 
        }else if($row['class'] == 'food'){
            print '<input type="radio" name="class" value="cloth">cloth<br>';
            print '<input type="radio" name="class" value="food" checked>food<br>';
            print '<input type="radio" name="class" value="toy">toy<br>';
            print '<input type="radio" name="class" value="other">other<br><br>'; 
        }else if($row['class'] == 'toy'){
                print '<input type="radio" name="class" value="cloth>cloth<br>';
            print '<input type="radio" name="class" value="food">food<br>';
            print '<input type="radio" name="class" value="toy" checked>toy<br>';
            print '<input type="radio" name="class" value="other">other<br><br>'; 
        }else{
                print '<input type="radio" name="class" value="cloth">cloth<br>';
            print '<input type="radio" name="class" value="food">food<br>';
            print '<input type="radio" name="class" value="toy">toy<br>';
            print '<input type="radio" name="class" value="other" checked>other<br><br>'; 
        }

        print 'name:<br>';
        print '<input type="text" name="name" value="'.$row[name].'"><br><br>';

        print 'descrip:<br>';
        print '<textarea rows="3" cols="20" name="descrip">'.$row[descrip].'</textarea><br><br>';

        print 'price:<br>';
        print '<input type="number" name="price" min="0.00" max="100000.00" step="0.01" value="'.$row[price].'"><br><br>';

        print '<input type="submit" value="Submit"><br><br>';
        print '<input type="reset" value="Clear Form">';

        print '</form>';

}
$con->close();
?>
