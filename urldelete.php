<?php
require 'connect.inc.php';
require 'core.inc.php';
if(isset($_POST['submit'])){

  $cat=$_POST['category'];
  $url=$_POST['url'];
  $mailid=$_SESSION['emailid'];
 // echo $mailid;

    if(empty($cat))
     echo '<p>Please fill category field</p>';
     else if(empty($url))
     echo '<p>Please fill url field</p>';
     else{

            $res="select url from urlhelper where emailid='$mailid' and category='$cat' and urlname='$url'";

            $num=mysqli_num_rows(mysqli_query($con,$res));
            if($num==0)
            echo '<p>Not present</p>';
            else{
            $query="delete from  urlhelper  where emailid='$mailid' and category='$cat' and urlname= '$url'";
            $query_run=mysqli_query($con,$query);
            if(!$query_run)
               echo '<p>Not valid.</p>';

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
 h2{
   color:red;
   text-align:center;
 }
 p{
   font-family:Comic Sans Ms;
   text-align:center;
 }

 .par{
   text-align:center;
 }

 .content{
   background-color:yellow;
   padding:50px;
 }
 h3{
   color:green;
    text-align:center;
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
<div class="logout"><a href="http://localhost/project1/logout.php">Logout</a></div>;
<h2>URL HELPER</h2>
<h3>Delete</h3>
<div class="content">


<form class="form-horizontal" role="form" method="post" action="urldelete.php">


<div class="row">
  <div class="col-md-2"></div>
 <div class="col-md-2">
<p>Delete Url</p>
 </div>
 <div class="col-md-4">
 <select name="category">

 <?php
  require 'connect.inc.php';

 $mailid=$_SESSION['emailid'];
 $query="select distinct(category) from urlhelper where emailid='$mailid'";
 $query_run=mysqli_query($con,$query);
  while ($row = $query_run->fetch_assoc())
  {
    $cat=$row['category'];
    echo "<option value='".$cat."'>".$cat."</option>";
  }
 ?>
 </select>
 <input type="text" name="url" placeholder="URL name">
 </div>
</div>
<div class="row">
<div class="col-md-4"></div>

<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
</div>
</form>
</div>
</body>
</html>