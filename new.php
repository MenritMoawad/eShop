<?php
session_start();
$user_id=$_SESSION['user_id'];
//$_SESSION['product_id'] = 50;
$product_id=$_POST["add"];
//$product_id=$_SESSION['product_id'];
echo $product_id;
//$purchased_id=$_SESSION['purchased_id'];
mysql_connect('localhost','root','');
mysql_selectdb('eShop');
//echo $product_id;


$query="INSERT INTO purchased(user_id,product_id,bought) VALUES ('$user_id','$product_id',0)";
$result=mysql_query($query) or die(mysql_error());

$query3="SELECT purchased_id FROM purchased
WHERE user_id = '$user_id'AND
product_id = '$product_id'";

$result=mysql_query($query3) or die(mysql_error());

$row =mysql_fetch_array($result);

$_SESSION['purchased_id'] = $row['purchased_id'] ;

echo $_SESSION['purchased_id'];
$query2="UPDATE products SET availability=availability-1 WHERE product_id='$product_id'";
$result2=mysql_query($query2) or die(mysql_error());

mysql_close();

header("Location: http://localhost/eShop/home.php");
exit;

?>