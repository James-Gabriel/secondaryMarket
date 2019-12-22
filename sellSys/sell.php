<?php session_start(); 
print 'current user:'.$_SESSION['name'] .'<br>';
?>

<html>
    <body>
        <a href="addCommodity.html">addCommodity</a><br>
        <a href="showCommodity.php">showCommodity</a><br>

        <a href="../index.php">Main Page</a>
    </body>
</html>