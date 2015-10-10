<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<?php
//ini_set('display_errors', 'Off');

/*$servername = 'localhost';
$username = "root";
$password = "1234";
$dbname = "eShop";


// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */
mysql_connect('localhost', "root","");
mysql_select_db('eShop');
session_start();
$user_id = $_SESSION["user_id"];
//echo $_SESSION["product_id"];
        // create query

 	$query ="SELECT * FROM purchased,products WHERE purchased.product_id= products.product_id
AND purchased.user_id='$user_id' AND purchased.bought = 0";
 	

// execute query
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
$sum= 0;
// see if any rows were returned
if (mysql_num_rows($result) > 0) 
{
    // yes
    // print them one after another
    echo "<table cellpadding=10 border=1>";
    $i=1;
    
    
    
   
    while($row = mysql_fetch_row($result)) 
    {
    
           
    $i++;

        echo "<tr>";
          echo "<td>"."<center>".$row[5]."</center>"."</td>";
     
      echo "<td>"."<center>".$row[7]."</center>"."</td>";
           
      echo "<td>"."<center>".$row[8]."</center>"."</td>";
    
     //   echo "<td>"."<center>".$row[2]."</center>"."</td>";
        
        $sum+=$row[8];
        
    echo '<td><form action="remove.php" method="post"><td>';
       // $_SESSION ["purchased_id"] = $row[0];
  //echo '<td><button id=$i>Remove</button>';
        echo '<td>'.'<input type="hidden" name="product" value="'.$row[4].'" '.'</td>';
        echo '<td><button type="submit"  name="remove" value=" '.$row[0].'"  id= $i > Remove</button></td>';
    //$_SESSION ["product_id"] = $row[0];
   // echo $_SESSION["product_id"];
 
 echo '<td></form><td>';
 }



 }


 
 


     
//        if (!isset($_SESSION))
//        {
//         session_start();
//        }
//        print_r($_SESSION);
// 
//        echo $_SESSION['email'] ;
//        echo $_SESSION['user_id'] ;
//        
       
echo $_SESSION["product_id"];

       echo '<h4>Total Price is:'.$sum.'</h4>';
       
       
mysql_close();

?>


  <form action="home.php" method="post">
    
 <button id="add" class="btn btn-default">ADD</button>
 
 </form>
 
 
 <form action="buy.php" method="post">

 <button id="checkout" class="btn btn-default">CHECKOUT</button>
 
 </form>

<form action="logout.php" method="post">
    <button id='logout' class="btn btn-default">Logout</button>
</form>