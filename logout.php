<?php 
session_start();
?>
<?php
 $_SESSION["is_user_logged_in"]=false;
 unset($_SESSION);
 header("Location: /login.php");
?>