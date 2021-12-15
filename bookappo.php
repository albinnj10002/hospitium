<?php
include('db_connect.php');
if(isset($_GET['ap_id']))
{
  $ap_id=$_GET['ap_id'];
  //var_dump($l_id);
  
}

  $book='booked';

  $q="UPDATE appoinment SET ap_book='$book' WHERE ap_id=$ap_id"; 
  
  	$result=$con->query($q);
  	if($result)
  	{
  		header("location:viewfappoint.php");
  	}
  ?>