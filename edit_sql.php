<?php
//ini_set('display_errors', 'Off');

session_start();
if (empty($_SESSION['user_id'])) {

    header("Location:http://localhost/eShop/Login.html");
    exit();
}
mysql_connect('localhost', "root", "");
mysql_select_db('eShop');

$fname = $_POST["fname"];
$lname = $_POST["lastname"];
$password = $_POST["password"];
$email = $_POST["email"];
$originalName = $_FILES["profileimage"]['name'];

$uploaddir = 'images/';

if (!empty($originalName)) {
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
} else {
    $uploadfile = $uploaddir . "noimage.png";
}
$_SESSION["email"] = $email;
$_SESSION["user_name"] = $fname;
$_SESSION["user_lastname"] = $lname;
$_SESSION['user_image'] = $uploadfile;
$_SESSION['password'] = $password;

$sql = " UPDATE users SET
      firstname = '$fname' ,
      lastname = '$lname' ,
	  email=  '$email'  ,
	  password = '$password'  ,
	  avatar = '$uploadfile' ";
$result = mysql_query($sql) or die(mysql_error());
mysql_close();

header("Location:http://localhost/eShop/home.php");
exit();
?>