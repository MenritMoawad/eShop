<?php
//ini_set('display_errors', 'Off');
//session_unset();
if (!isset($_SESSION))
  {
    session_start();
  }

//echo $_SESSION['email'];          
 SESSION_UNSET();  
 SESSION_DESTROY();
header("Location:http://localhost/eShop/Login.html");
exit();
// destroy the session
//session_destroy();
//echo $_Session['name'];


?>