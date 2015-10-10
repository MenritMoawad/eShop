<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/history.css">
</head>

<h1>History</h1>
<body style ="background:#CCEEFF">

<?php
mysql_connect('localhost','root','');
mysql_selectdb('eShop');

session_start();
$user_id=$_SESSION['user_id'];
//$product_id=$_SESSION['product_id'];

$query="SELECT * FROM products,purchased WHERE purchased.user_id=$user_id AND purchased.product_id=products.product_id
AND purchased.bought=1 ";
$resource=mysql_query($query) or die(mysql_error());

if(mysql_num_rows($resource)>0){
    echo"<table cellpadding=10 border=1>";
    while($row=mysql_fetch_row($resource)){
        echo'<tr>';

        echo'<td>'.$row[1].'</td>';
        echo'<td>'.$row[4].'</td>';



        echo'</tr>';
    }
    echo"</table>";
}
mysql_close();
?>
<form action="home.php" method="post">
    <button id="home" class="btn btn-default btn-lg">BACK TO HOME</button>
</form>
<form action="logout.php" method="post">
    <button id='logout'>Logout</button>
</form>