<html>
<head>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap">
<link rel="stylesheet" type="text/css" href="css/edit_profile.css">
</head>
<?php
//ini_set('display_errors', 'Off');

session_start();
$name = $_SESSION["user_name"];
 $email = $_SESSION["email"] ;
  $lname = $_SESSION["user_lastname"] ;

   $img =  $_SESSION['user_image'] ;
          

?>

<div class="container">
<div class="row">

<form action="edit_sql.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputFname">First Name</label>
    <input type="text" class="form-control" id="exampleInputName" value='<?= $_SESSION["user_name"] ?>'  name ="fname"placeholder="" >
  </div>
 
 <div class="form-group">
    <label for="exampleInputLname">Last Name</label>
    <input type="text" class="form-control" id="exampleInputLName" value=<?= $_SESSION["user_lastname"] ?> name ="lastname" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" value='<?= $_SESSION["email"] ?>' name ="email"placeholder= "" >
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" value='<?= $_SESSION["password"] ?>' name="password" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="profileimage" value='<?= $_SESSION["user_image"] ?>' id="exampleInputFile">
  </div>
  <div class="checkbox">    
  <button type="submit" name ="signup"class="btn btn-warning">Edit </button>
</form>

<footer style="position: fixed; bottom:0">
<div>
  <button type="button" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-home">
    <a href="home.php"></a>
  </span>
  </button>
</div>
</footer>

</body>
</html>