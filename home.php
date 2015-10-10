<head>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">E-Shop</a>
                        <a href="history.php" id="view" class="btn">View History</a>
            <a href="edit_profile.php" id="edit" class="btn"

        </div>

    </div>


</nav>

</body>

<?php
  session_start();
 if(empty($_SESSION['user_id']))
 {

  header("Location:http://localhost/eShop/Login.html");
           exit();
 }
 else
 {
    
//echo $_SESSION["product_id"];

 }


?>

<title>E-Shop</title>

<h1> E-Shop </h1>

<h2> WELCOME  <?= $_SESSION["user_name"] ?>  </h2>
<img src= '<?= $_SESSION['user_image'] ?>' width="50" height="50">



<form action="history.php" method="post">
   <button id='view'>View History</button>
  </form>
 
 <form action="edit_profile.php" method="post">
   <button id='edit'>Edit Profile</button>
  </form>
    <form action="logout.php" method="post">
        <button id='logout'>Logout</button>
    </form>

<?php
//ini_set('display_errors', 'Off');
mysql_connect('localhost',"root","");
mysql_select_db('eShop');


// create query
$query = "SELECT * FROM products";
// execute query
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());

// see if any rows were returned
if (mysql_num_rows($result) > 0) {
    // yes
    // print them one after another
    echo "<table cellpadding=10 border=1>";
    $i=1;
    
    
    while($row = mysql_fetch_row($result)) {

           
    $i++;

       
       
        echo "<tr>";
     
       echo "<td>"."<center>".$row[1]."</center>"."</td>";
           
      echo "<td>"."<center>".$row[4]."</center>"."</td>";
    
    echo "<td><img src=$row[2]></td>";
    
    echo '<td><form action="new.php" method="post"><td>';
      //  echo '<td>'.'<input type="hidden" name="product" value="<?= $i;>" '.'</td>';
       // $_SESSION ["product_id"] = $row[0];
    if($row[5]!=0){
      // echo  $row[0];
  echo '<td><button type="submit"  name="add" value=" '.$row[0].'"  id= $i > Add To Cart</button></td>';

  // echo $_SESSION["product_id"];

  
 // echo '<td><input type="hidden" name="id" value="2" ><td>';
//   echo '<td><input type="hidden" name="uid" value="2" ><td>';
  



     
    
    echo '<td></form></td>';
  }
     else
     echo "Sold-Out";
 
  echo '<td></form></td>';
  
 
 
        echo "</tr>";
    }
    echo "</table>";
}

 



     
    
    echo '<td></form></td>';

mysql_close();

?>



 <form action="checkout.php" method="post">
    
 <button id="cart">Cart</button>
 
 </form>
 

