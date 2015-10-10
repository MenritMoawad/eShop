<body style ="background:#CCEEFF">

<?php
//ini_set('display_errors', 'Off');

mysql_connect('localhost','root','');
mysql_selectdb('eShop');

session_start();
$user_id=$_SESSION['user_id'];
//$product_id=$_SESSION['product_id'];
//$purchased_id=$_SESSION['purchased_id'];

$query="UPDATE purchased SET bought=1 WHERE  user_id='$user_id'";
$result=mysql_query($query) or die(mysql_error());

mysql_close();

?>

<form action="home.php" method="post">
<button id="home">Home</button>
</form>