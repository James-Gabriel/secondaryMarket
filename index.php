<?php session_start(); 
print 'current user:'.$_SESSION['name'] .'<br>';
?>

<html>
    <body>
        <a href="userSys/login.html">login</a><br>
        <a href="userSys/register.html">register</a><br>
        <a href="userSys/logout.php">logout</a><br>
        <a href="userSys/personalInfo.php">personalInfo</a><br>

        <a href="sellSys/sell.php">sell something</a><br>
        <a href="buySys/buy.php">buy something</a><br>

        
    </body>
</html>