<?php
//ini_set('display_errors', 'Off');
mysql_connect('localhost','root','');
mysql_selectdb('eShop');

session_start();
//echo $_SESSION['purchased_id'];
$user_id=$_SESSION['user_id'];
$product_id=$_POST['product'];
$purchased_id=$_POST['remove'];

  //  $_SESSION['purchased_id'];
//echo $purchased_id."p" ;
//echo $user_id."u" ;
//echo $product_id."r" ;
/*
$query3="SELECT purchased_id FROM purchased
WHERE user_id = '$user_id'AND
product_id = '$product_id'AND bought=0";
$result=mysql_query($query3) or die(mysql_error());
$row =mysql_fetch_array($result);

$_SESSION['purchased_id'] = $row['purchased_id'] ;*/
//echo $_SESSION['purchased_id'];
//echo $user_id."u" ;
//echo $product_id."r" ;
$query="DELETE FROM purchased WHERE  user_id=$user_id AND product_id=$product_id AND purchased_id =
$purchased_id
AND bought = 0";
$result=mysql_query($query) or die(mysql_error());



$query2="UPDATE products SET availability=availability+1 WHERE product_id='$product_id'";
$result2=mysql_query($query2) or die(mysql_error());

mysql_close();
header("Location: http://localhost/eShop/checkout.php");
exit;

?>

