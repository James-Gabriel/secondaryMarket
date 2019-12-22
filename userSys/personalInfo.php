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

$userName = $_SESSION['name'];

$sql = "select id, name, password, birthday, gender, email, phone, isadmin from user where name = '$userName'";
$result = $con->query($sql);

print '<form action="alterUserInfo.php" method="POST">';

while($row = $result->fetch_assoc()){
    print 'id:<br>';
    print '<input type="text" name="id" readonly="readonly" value="'.$row[id].'"><br><br>';

    print 'name:<br>';
    print '<input type="text" name="name" value="'.$row[name].'"><br><br>';

    print 'password:<br>';
    print '<input type="text" name="password" value="'.$row[password].'"><br><br>';

    print 'birthday:<br>';
    print '<input type="date" name="birthday" value="'.$row[birthday].'"><br><br>';

    print 'gender:<br>';
    if($row[gender] == 'female'){
        print '<input type="radio" name="gender" value="female" checked>Female<br>';
        print '<input type="radio" name="gender" value="male">Male<br><br>'; 
    }else{
        print '<input type="radio" name="gender" value="female" >Female<br>';
        print '<input type="radio" name="gender" value="male" checked>Male<br><br>'; 
    }

    print 'email:<br>';
    print '<input type="text" name="email" value="'.$row[email].'"><br><br>';

    print 'phone:<br>';
    print '<input type="text" name="phone" value="'.$row[phone].'"><br><br>';

    print '<input type="submit" value="Submit"><br><br>';
    print '<input type="reset" value="Clear Form">';
}
print '</form>';

print '<br><a href="../index.php">Main Page</a>';

$con->close();
?>
