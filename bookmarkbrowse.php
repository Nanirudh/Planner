<?php
require 'core.inc.php';
require 'connect.inc.php';
$mailid=$_SESSION['emailid'];
echo '<div class="home"><a href="http://localhost/project1/menu.php">Home</a></div>';
echo '<div class="logout"><a href="http://localhost/project1/logout.php">Logout</a></div>';
echo '<h1>Bookmark HELPER</h1>';
echo '<h2>Browse</h2>';


$query="select distinct(category) from bookmarkhe where emailid='$mailid'";
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

     $q11="select sum(hits) as val from bookmarkhe where emailid='$mailid' group by category";
     $q12= mysqli_query($con,$q11);
     
     $cat1=array();
     $cnt1=0;
    while ($row = $q12->fetch_assoc()){
      $cat1[$cnt1]=$row['val'];
      $cnt1++;
    }
    
    for($i=0;$i<$cnt-1;$i++)
    {
      for($j=0;$j<$cnt-$i-1;$j++)
      {
        if($cat1[$j]>$cat1[$j+1])
        {
          $a=$cat[$j];
          $cat[$j]=$cat[$j+1];
          $cat[$j+1]=$a;
          $b=$cat1[$j];
          $cat1[$j]=$cat1[$j+1];
          $cat1[$j+1]=$b;
        }
      }
    }



    print "<table align=center>\n";
    $count=array();
    for($x=0;$x<$cnt;$x++){
      $name2=0;
      print "<h3>$cat[$x]</h3>";
      $q="select url,urlname from bookmarkhe where category='$cat[$x]' and emailid='$mailid' order by hits desc,urlname";
      if(!mysqli_query($con,$q))
      echo '<p> not valid.</p>';
      else{
        $qrun=mysqli_query($con,$q);

        while ($row = $qrun->fetch_assoc()){
          $url=$row['url'];
          $disc=$row['urlname'];
         // $number=$x.$name2;
          echo '<p><a href="'.$url.'" onclick=myAjax("'.$url.'"); target="_blank">'.$disc.'</a></p>';
         // echo $url;
         // $name2++;
        }
        //$count[$x]=$name2;
      }
    }

    print "</table>\n";

   /* for($y=0;$y<$cnt;$y++)
    {
      for($z=0;$z<$count[$y];$z++)
      {       $p=$y.$z;
         echo $p;
        if(isset($_GET[$p]))
        {  echo 'hi';
          $q1="update bookmarkhe set hits=hits+1 where category='$cat[$y]' and urlname=google-keynote";
          $qrun1=mysqli_query($con,$q1);
          if(!$qrun1)
          echo 'not possible';
        }
      }
    } */

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
<script>
function myAjax(url){

  $.ajax({
    type:"POST",
    url:'bookmarkverify.php',
    data:{
       action:url
    },

  });
}

</script>
<body>



</body>
</html>