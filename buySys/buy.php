<?php session_start(); 
print 'current user:'.$_SESSION['name'] .'<br>';
?>

<html>
    <body>
        <a href="showCommodity.php">showCommodity</a><br>
        <a href="showShopCart.php">showShopCart</a><br>
        <a href="showHaveBuyCommodity.php">showHaveBuyCommodity</a><br>
        <a href="../index.php">Main Page</a>
    </body>
</html>