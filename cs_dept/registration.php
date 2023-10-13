<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  include   'partials/_dbconnect.php';
  $username= $_POST["username"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $first=$_POST['first'];
  $last=$_POST['last'];
  $city=$_POST['city'];
  $dept=$_POST['dept'];
  $zip=$_POST['zip'];

  $exists=false;
  if(($password==$cpassword) && $exists==false)   {

$sql=" INSERT INTO `users` ( `username`, `password`, `dt`, `first`, `last`, `city`, `dept`, `pin`) VALUES ( '$username', '$password', current_timestamp(), '$first', '$last', '$city', '$dept', '$zip')";
$result=mysqli_query($conn,$sql);
if($result){
  $showAlert=true;
}
  }
  
  else{
    $showError="password do not match";
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

    <title>Registration</title>
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
    if($showAlert) {
      
    
   
    
    echo'  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is  now created and you can login .
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
<h1 class="text-center">Registration</h1>
<div id="main">
   <img src="pu.jpg" alt="pu">
   </div>

<form action="/cs_dept/registration.php" method="post">
  <div class="form-group  col-md-6">
    <label for="username">username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
    
  </div>

    
   


  <div class="form-group col-md-6" >
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">Make sure that both have same password.</small>
  </div>


  
  
  <form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip01">First name</label>
      <input type="text" class="form-control" name="first" id="validationTooltip01" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltip02">Last name</label>
      <input type="text" class="form-control" name="last" id="validationTooltip02" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03">City</label>
      <input type="text" name="city" class="form-control" id="validationTooltip03" required>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip04">Dept.</label>
      <select class="custom-select" name="dept" id="validationTooltip04" required>
        <option selected disabled value="">Choose...</option>
        <option value="cs">cs</option>
        <option value="phy">phy</option>
        <option value="che">che</option>
        <option value="math">math</option>
      </select>
      <div class="invalid-tooltip">
        Please select a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip05">Zip</label>
      <input type="number" name="zip" class="form-control" id="validationTooltip05" required>
      <div class="invalid-tooltip">
        Please provide a valid zip.
      </div>
    </div>
  
       

    






  
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
    
</body>
</html>