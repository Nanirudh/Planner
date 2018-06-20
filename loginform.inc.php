<?php
    require 'connect.inc.php';
    require 'core.inc.php';
    if(isset($_POST["email"])&&isset($_POST["pass1"]))
    {
      $mailid=$_POST["email"];
      $pass=$_POST["pass1"];
      if(empty($mailid))
      echo '<p>Enter Email-id</p>';
      else if(empty($pass))
      echo'<p>Enter password</p>';
      else{

        $pas=md5($pass);
        $query="select username  from users where emailid='$mailid' and password='$pas'";
           if(!mysqli_query($con,$query)){
               echo '<p>Your email or password is not valid.</p>';
           }
           else{
             $query_run=mysqli_query($con,$query);
             $num=mysqli_num_rows($query_run);
             if($num==0)
             echo '<code><p>Invalid username or password</p></code>';
             else
             {

               $row=$query_run->fetch_assoc();
               $name=$row["username"];
               $_SESSION['username']=$name;
               $_SESSION['emailid']=$mailid;

               header('Location: http://localhost/project1/menu.php');
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
   background-color:yellow;
 }
 h1{
   text-align:center;
   font-family:Comic Sans Ms;
   color:red;
 }
 p{
   font-family:Comic Sans Ms;
 }
</style>
<body>
<h1><u>Login</u></h1>

<div class="d-flex justify-content-center align-items-center container ">
<form class="form-horizontal" role="form" method="post" action="loginform.inc.php">

<div class="form-group">
   <label for="email" class="col-md-2 control-label">Email</label>
      <div class="col-md-5">
          <input type="email" class="form-control" id="email" name="email" >
      </div>
</div>
<div class="form-group">
  <label for="Password" class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
      <input type="password" class="form-control" id="pass1" name="pass1" >
   </div>
</div>
 <div class="form-group">
   <div class="col-sm-10 col-sm-offset-2">
    <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">

   </div>
 </div>
</form>
</div>
</body>
</html>


