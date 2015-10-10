<?php
//ini_set('display_errors', 'Off');
//if(!empty[$_POST['signup'] )
//{
//
//}
session_start();

mysql_connect('localhost', "root","");
mysql_select_db('eShop');





$fname =$_POST["fname"];
$lname =$_POST["lname"];
$password =$_POST["password"];
$email =$_POST["email"];
$originalName= $_FILES["profileimage"]['name'];
//echo $originalName;	
$uploaddir = 'images/';

if(!empty($originalName))
{
//echo $originalName;	

//??
$uploadfile = $uploaddir.$originalName;

echo '<pre>';
if (move_uploaded_file($_FILES['profileimage']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";
}

else 
{
 $uploadfile =$uploaddir."noimage.png";
}
$_SESSION["email"] = $email;
$_SESSION["user_name"] =$fname;
$_SESSION["user_lastname"] =$lname;
$_SESSION["password"] =$password;
$_SESSION['user_image'] =$uploadfile;
//$_SESSION["user_id"] = $row["user_id"];
$_SESSION["product_id"] = "0" ;
$_SESSION["purchased_id"] = "0" ;

$sql = "INSERT INTO users (firstname, lastname
	,email,password,avatar)
  VALUES ('$fname', '$lname', '$email','$password','$uploadfile')";
$result = mysql_query($sql) or die(mysql_error());

$query = mysql_query("SELECT user_id FROM eShop.users where email = '$email'
       AND password = '$password'") or die(mysql_error());

$row = mysql_fetch_array($query) or die(mysql_error());
echo $row[0];
$_SESSION["user_id"] = $row["user_id"];
mysql_close();
//echo $uploadfile;
header( "Location:http://localhost/eShop/home.php" );
exit();
?>