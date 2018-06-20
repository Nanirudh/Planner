<?php
    require 'connect.inc.php';
    require 'core.inc.php';
  if(isset($_POST['submit']))
  {
    $c1=$_POST['choice1'];
    $c2=$_POST['choice2'];
    $c3=$_POST['choice3'];
    if(empty($c1)&&empty($c2)&&empty($c3))
     echo '<p>Please select a valid choice</p>';
     else{
      if(isset($c1))
         header('Location: http://localhost/project1/bookmarkhelper.php');
      else if(isset($c2))
         header('Location: http://localhost/project1/filehelper.php');
       else if(isset($c3))
         header('Location: http://localhost/project1/urlhelper.php');
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
 h2{
   color:green;
   text-align:center;
 }
 p{
   font-family:Comic Sans Ms;

 }
 
 .gap{
   padding:10px;
 }

 .par{
   text-align:center;
 }

 .content{
   background-color:Azure;
   padding:50px;
 }
 h3{
   color:red;
    text-align:center;
 }
 .logout{
     text-align:right;
     padding:10px;
 }


</style>

<body>
<div class="logout"><a href="http://localhost/project1/logout.php">Logout</a></div>
<h2>Choose your Activity</h2>


<form class="form-horizontal" role="form" method="post" action="http://localhost/project1/menu.php">

<div class="row">
   <div class="col-md-5"></div>
     <input type="checkbox" name="choice1">Bookmark Manager

</div>
<div class="gap"></div>
<div class="row">
   <div class="col-md-5"></div>
     <input type="checkbox" name="choice2">File Manager

</div>
<div class="gap"></div>
<div class="row">
   <div class="col-md-5"></div>
     <input type="checkbox" name="choice3">URL Manager

</div>
<div class="gap"></div>
<div class="row">
   <div class="col-md-5"></div>
   <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">


</div>

</form>

</body>
</html>