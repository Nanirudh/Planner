<?php

if(isset($_POST['submit'])){

  $choice=$_POST['file'];
  if($choice=="Browse URL")
  header('Location: http://localhost/project1/urlbrowse.php');
  if($choice=="Add URL")
  header('Location: http://localhost/project1/urlinsert.php');
  if($choice=="Delete URL")
  header('Location: http://localhost/project1/urldelete.php');


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
h1{
  //font-family:Comic Sans Ms;
  text-align:center;
  color:red;
}

p{
  font-family:Comic Sans Ms;
}

form{

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
<h1>URL HELPER</h1>

<div class="col-xs-12" style="height:70px;"></div>

<div class="row">
   <div class="col-md-4"> </div>
   <div class="col-md-4"><p>All your bookmarks can be managed effectively.In the list below choose the appropriate action.</p></div>
   <div class="col-md-6"></div>
</div>


<form id="form" action="http://localhost/project1/urlhelper.php" method="post">
   <div class="row">
   <div class="col-md-4"> </div>
   <div class="col-md-8">
   <select name="file" id="form">
     <option value="Browse URL">Browse URL</option>
     <option value="Add URL">Add URL</option>
     <option value="Delete URL">Delete URL</option>
   </select>
   </div>
   </div>
    <div class="col-xs-12" style="height:10px;"></div>

    <div class="row">
   <div class="col-md-4"> </div>
   <div class="col-md-8">
   <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
   </div>
   </div>
</form>
</div>
</div>

</body>
</html>