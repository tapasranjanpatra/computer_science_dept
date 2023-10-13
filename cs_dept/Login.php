

<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  include   'partials/_dbconnect.php';
  $username= $_POST["username"];
  $password=$_POST["password"];
echo "hello";
$sql=" Select * from users where username='$username' AND password='$password' ";


$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
if($num==1){
           $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: welcome.php");  
}else{
    $showError="invalid credentials";
  }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Login</title>
    <style>
    #main{
      width: 100%;
    position: absolute;
    z-index: -1;
    opacity: 0.8;
    }

    </style>
  </head>
  <body>
    <?php require 'partials/_nav.php'?>

    <?php 
    if($login) {
      
    echo'  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>you are logged in .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> ';

    }
    if($showError) {
      
    
   
    
      echo'  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>'.$showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div> ';
  
      }
    ?>

<div class="container">
<h1 class="text-center">Login Page</h1>
<div id="main">
   <img src="pu.jpg" alt="pu">
   </div>

<form action="" method="post">
  <div class="form-group  col-md-6">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group col-md-6" >
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
    
</body>
</html>
