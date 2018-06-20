<?php
  require 'core.inc.php';
  require 'connect.inc.php';
  $mailid=$_SESSION['emailid'];
   echo '<div class="home"><a href="http://localhost/project1/menu.php">Home</a></div>';
   echo '<div class="logout"><a href="http://localhost/project1/logout.php">Logout</a></div>';
  $query="select description,filename from filesystem where emailid='$mailid'";
  echo '<h1>Files-List</h1>';
  if(!mysqli_query($con,$query)){
     echo '<p> not valid.</p>';
   }

    $query_run=mysqli_query($con,$query);
        echo PHP_EOL;
        print "<table align=center>\n";
        print "<th>Description   </th>";
        print "<th>Filename      </th>";
    while ($row = $query_run->fetch_assoc()){
        $files_field= $row['filename'];
        $var=$_SESSION['emailid'];
        $path= 'Uploads/files/'.$var.'/';
        #echo "$path"."$files_field";
        $files_show= "$path"."$files_field";
        $descriptionvalue= $row['description'];

        print "<tr>\n";
        print "\t<td>\n";
        echo "<font face=arial size=4 />$descriptionvalue</font>";
        print "</td>\n";
        print "\t<td>\n";
        echo "<a href='$files_show'>$files_field</a>";
        print "</td>\n";
        print "</tr>\n";
    }
print "</table>\n";
  if(isset($_POST['sort'])){

       header('Location: http://localhost/project1/filesort.php');
  }
  if(isset($_POST['submit'])){
       header('Location: http://localhost/project1/filefilter.php');
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
   text-align:center;
   font-family:Comic Sans Ms;
   color:red;
 }
 p{
   font-family:Comic Sans Ms;
 }
 .gap{
   padding:10px;
 }
 .alig{
   text-align:center;
 }
 table, th, td {
    border: 1px solid black;
}
th{
  padding:10px;
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


<div class="d-flex justify-content-center align-items-center container ">
<form class="form-horizontal" role="form" method="post" action="filebrowse.php">
  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
    <input id="sort" name="sort" type="submit" value="Sort by date/time">
    </div>
  </div>
  </form>
     <div class="gap"></div>
    <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
    <form class="form-horizontal" role="form" method="post" action="filefilter.php">
    <input type="text"  id="search" name="search" placeholder="Search" value="">
    <input id="submit" name="submit" type="submit" value="Submit">
    </form>
    </div>
    </div>


</div>
</body>
</html>