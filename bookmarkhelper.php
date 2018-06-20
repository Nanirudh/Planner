<?php

if(isset($_POST['submit'])){

  $choice=$_POST['file'];
  if($choice=="Browse Bookmarks")
  header('Location: http://localhost/project1/bookmarkbrowse.php');
  if($choice=="Add Bookmarks")
  header('Location: http://localhost/project1/bookmarkinsert.php');
  if($choice=="Delete Bookmarks")
  header('Location: http://localhost/project1/bookmarkdelete.php');


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
<h1>BOOKMARK HELPER</h1>

<div class="col-xs-12" style="height:70px;"></div>

<div class="row">
   <div class="col-md-4"> </div>
   <div class="col-md-4"><p>All your bookmarks can be managed effectively.In the list below choose the appropriate action.</p></div>
   <div class="col-md-6"></div>
</div>


<form id="form" action="http://localhost/project1/bookmarkhelper.php" method="post">
   <div class="row">
   <div class="col-md-4"> </div>
   <div class="col-md-8">
   <select name="file" id="form">
     <option value="Browse Bookmarks">Browse Bookmarks</option>
     <option value="Add Bookmarks">Add Bookmarks</option>
     <option value="Delete Bookmarks">Delete Bookmarks</option>
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