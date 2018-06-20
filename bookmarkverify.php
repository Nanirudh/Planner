<?php
require 'core.inc.php';
require 'connect.inc.php';
$mailid=$_SESSION['emailid'];
$url1=$_POST['action'];
 $query="update bookmarkhe set hits=hits+1 where url='$url1'";
 if(!mysqli_query($con,$query))
     echo '<p> not valid.</p>';


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
 


</style>
<script>
function myajax(url){
  $.ajax({
    type:"POST",
    url:'bookmarkverify.php',
    data:{
      a1:url
    },
    success:function(html) {
             alert(html);
           }
  });
}

</script>
<body>



</body>
</html>