<?php
require 'core.inc.php';
require 'connect.inc.php';
$mailid=$_SESSION['emailid'];
echo '<div class="home"><a href="http://localhost/project1/menu.php">Home</a></div>';
echo '<div class="logout"><a href="http://localhost/project1/logout.php">Logout</a></div>';
echo '<h1>URL HELPER</h1>';
echo '<h2>Browse</h2>';
$query="select distinct(category) from urlhelper where emailid='$mailid' order by category";
$cnt=0;
   if(!mysqli_query($con,$query)){
     echo '<p> not valid.</p>';
   }
    $query_run=mysqli_query($con,$query);
    $cat=array();
    while ($row = $query_run->fetch_assoc()){
      $cat[$cnt]=$row['category'];
      $cnt++;
    }
    print "<table align=center>\n";
    for($x=0;$x<$cnt;$x++){
      print "<h3>$cat[$x]</h3>";
      $q="select url,urlname from urlhelper where category='$cat[$x]' and emailid='$mailid'";
      if(!mysqli_query($con,$q))
      echo '<p> not valid.</p>';
      else{
        $qrun=mysqli_query($con,$q);

        while ($row = $qrun->fetch_assoc()){
          $url=$row['url'];
          $disc=$row['urlname'];
          echo "<p><a href='$url' target='_blank'>$disc</a></p>";

        }
      }
    }
    print "</table>\n";

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
   color:red;
   text-align:center;
 }
  h2{
   color:green;
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

   text-transform: uppercase;
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



</body>
</html>