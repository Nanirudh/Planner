<?php
require 'core.inc.php';
require 'connect.inc.php';
  if(isset($_POST['submit']))
  {
      $name= $_FILES['file']['name'];
      $tmp_name= $_FILES['file']['tmp_name'];
      $position= strpos($name, ".");
      $fileextension= substr($name, $position + 1);
      $fileextension= strtolower($fileextension);
      $description= $_POST['description'];
      if(empty($name))
      echo '<p>Please choose a valid file</p>';
      else if(empty($description))
      echo '<p>Please describe the file</p>';
      else{

       $var=$_SESSION['emailid'];

       $path= 'Uploads/files/'.$var.'/';
       if (!file_exists($path)) {
        mkdir($path, 0777, true);
       }
       //echo $var;
       //echo $name;
       //echo $description;
        $query="insert into filesystem (emailid,filename,description) values('$var','$name','$description')";
        if(!mysqli_query($con,$query)){
               echo '<p> File already present</p>';
        }
       if (move_uploaded_file($tmp_name, $path.$name)) {
       echo 'Uploaded!';
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
<form class="form-horizontal" role="form" method="post" action="fileUpload.php" enctype="multipart/form-data">

 <div class="form-group">
   <label for="filename" class="col-md-2 control-label">Filename:</label>
      <div class="col-md-5">
          <input type="file" id="filename" name="file" >
      </div>
</div>
<div class="form-group">
  <label for="description" class="col-md-2 control-label">Description:</label>
  <div class="col-md-5">
      <textarea rows="5" cols="1" class="form-control" id="description" name="description"  value=""></textarea>
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