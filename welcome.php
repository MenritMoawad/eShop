<head>
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
</head>

<?php
//ini_set('display_errors', 'Off');
session_start();
mysql_connect('localhost', "root","");
mysql_select_db('eShop');

$email = $_POST['email'];
$password = $_POST['password'];



if(!empty($email) && !empty($password))
{

    $query = mysql_query("SELECT * FROM eShop.users where email = '$email'
       AND password = '$password'") or die(mysql_error());


    //echo mysql_error($row);

   // if(!empty($row['email']) AND (!empty($row['password'])))
      //   {
      if (mysql_num_rows($query)>0)  {
          //echo $row['email'] ;
          //echo $row['password'] ;
          $row = mysql_fetch_array($query) or die(mysql_error());
        $_SESSION["email"] = $row['email'];
        $_SESSION["user_name"] =$row["firstname"];
        $_SESSION["user_lastname"] =$row["lastname"];
        $_SESSION["password"] =$row["password"];
        $_SESSION['user_image'] =$row["avatar"] ;
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["product_id"] = 0 ;
        $_SESSION["purchased_id"] = 0 ;
        //echo $_SESSION["product_id"];

        //$_SESSION["x"] = "5";
           header( "Location:http://localhost/eShop/home.php" );
            exit();
       // echo "<script>window.top.location='http://localhost/eShop/home.php'</script>";
       /// exit();

     }
    else
    {
        // echo "empty";
        header( "Location:http://localhost/eShop/Login.html" );
          exit();
       // echo "<script>window.top.location='http://localhost/eShop/Login.html'</script>";

    }


}

else
{
    //  echo "empty";
    header( "Location:http://localhost/eShop/Login.html" );
    exit();
     //echo "<script>window.top.location='http://localhost/eShop/Login.html'</script>";

}

mysql_close();

?>