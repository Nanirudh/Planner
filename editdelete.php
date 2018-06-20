<?php
require 'connect.inc.php';
require 'core.inc.php';
 if(isset($_POST['submit'])){
  if(empty($_POST['filename'])){
    echo '<p>Please enter filename</p>';
  }
  else{
    $filename= $_POST['filename'];
    //echo $filename;
    if(isset($_POST['action'])){

      $disc=$_POST['description'];
      if(empty($disc))
      echo '<p>please enter valid description</p>';
      else{
        $mailid= $_SESSION['emailid'];
        $q="select * from filesystem  where filename='$filename' and emailid='$mailid'";
        $num=mysqli_num_rows(mysqli_query($con,$q));
        if($num==0)
          echo 'Please enter a valid filename';
        else{

         $query="update filesystem set description='$disc' where filename='$filename' and emailid='$mailid'";
          if(!mysqli_query($con,$query)){
               echo '<p>Enter a valid filename.</p>';
           }
           else{
             echo '<p>Description of the file has been successfully edited</p>';
           }
      }
     }
    }
    else if(isset($_POST['action1'])){
       $mailid= $_SESSION['emailid'];
       $q="select * from filesystem  where filename='$filename' and emailid='$mailid'";
        $num=mysqli_num_rows(mysqli_query($con,$q));
        if($num==0)
          echo 'Please enter a valid filename';
        else{
        $query="delete from filesystem  where filename='$filename' and emailid='$mailid'";
          if(!mysqli_query($con,$query)){
               echo '<p>Enter a valid filename.</p>';
           }
           else{
             echo '<p>The file has been successfully deleted</p>';
           }
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
 .logout{
     text-align:right;
     padding:10px;
 }
  .home{
     text-align:left;
     padding:5px;
 }

</style>
<body>
<div class="home"><a href="http://localhost/project1/menu.php">Home</a></div>
<div class="logout"><a href="http://localhost/project1/logout.php">Logout</a></div>
<h1>Upload File</h1>
<div class="d-flex justify-content-center align-items-center container ">
<form method="post" action="editdelete.php">
<div class="row">
<div class="col-md-4"></div>
   <div class="col-md-4">
<input type="text" name="filename" placeholder="File-name">
 </div>
</div>
<div class="checkbox">
  <div class="row">
  <div class="col-md-4"></div>
   <div class="col-md-4">
   <label><input type="checkbox" name="action" value=""><p>Edit file description</p></label>
   </div>
     <div class="col-md-4">
     <textarea class="form-control" rows="3" id="comment" name="description" placeholder="Description"></textarea>
     </div>
 </div>
</div>
<div class="row">
<div class="col-md-4"></div>
   <div class="col-md-4">
   <div class="checkbox">
  <label><input type="checkbox" name="action1" value=""><p>Delete file</p></label><br>
  </div>
 </div>
</div>
 <div class="col-md-4"></div>
 <div class="col-md-2 col-sm-offset-2">
    <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">

   </div>
</form>
</div>
</body>
</html>