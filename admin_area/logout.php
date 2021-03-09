  
<?php
include('includes/db1.php');
session_start();
unset($_SESSION['email']);
header("location:login.php");

?>