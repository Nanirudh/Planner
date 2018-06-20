<?php
    require 'connect.inc.php';
    function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
    }
    
    function ispresent($email){

    }
    if(isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["pass1"])&&isset($_POST["pass2"]))
    {
      $username=$_POST["name"];
      $mailid=$_POST["email"];
      $pass1=$_POST["pass1"];
      $pass2=$_POST["pass2"];
      if(empty($username)){
        echo  '<p>Please enter username</p>';
      }
      else if(empty($mailid)){
        echo  '<p>Please enter e-mailId</p>';
      }
      else if(empty($pass1)){
        echo  '<p>Please enter your password</p>';
      }
      else if(empty($pass2)){
        echo  '<p>Please confirm password</p>';
      }
      else{
        #email validation
         if(!isValidEmail($mailid))
         echo '<p>Please enter a valid email-Id</p>';
        # else if(ispresent($mailid))
        # echo '<p>E-mail id has already been registered</p>'
         else if(strcmp($pass1,$pass2)!=0)
         echo '<p>Passwords do not match</p>';
         else
         {
          # echo '<code><p>Successfully Registered</p></code>';
           $pasword=md5($pass1);
           $query="insert into users (username,password,emailid) values('$username','$pasword','$mailid')";
           if(!mysqli_query($con,$query)){
               echo '<p>Registration failed.Email id already registered.</p>';
           }
           else{
              echo '<p><mark>Sucessfully Registered</mark></p>';
           }
         }
      }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Site Manager</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale-1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<style>
 form{
   padding:50px 250px 50px 250px;
   margin-top:100px;
   background-color:lightblue;
 }
 h1{
   text-align:center;
   font-family:Comic Sans Ms;
 }
 p{
   font-family:Comic Sans Ms;
 }
</style>
<body>
<h1><u>Registration Form</u></h1>

<div class="d-flex justify-content-center align-items-center container ">
<form class="form-horizontal" role="form" method="post" action="Regform.php">
<div class="form-group">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-5">
      <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php if(isset($_POST['name']))echo $_POST['name']?>">
   </div>
</div>
<div class="form-group">
   <label for="email" class="col-md-2 control-label">Email</label>
      <div class="col-md-5">
          <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php if(isset($_POST['email']))echo $_POST['email']?>">
      </div>
</div>
<div class="form-group">
  <label for="Password" class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
      <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password" value="">
   </div>
</div>
<div class="form-group">
  <label for="Retype Password" class="col-md-2 control-label">Retype Password</label>
  <div class="col-md-5">
      <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm Password" value="">
   </div>
</div>
<div class="form-group">
<div class="col-sm-10 col-sm-offset-2">
<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
</div>
</div>


</div>

</form>
</body>
</html>
