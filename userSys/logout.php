<?php session_start();

if(isset($_SESSION['name'])){
    unset($_SESSION['name']);
}
print 'logout successfully<br>';
print '<br><a href="../index.php">Main Page</a>';
?>
