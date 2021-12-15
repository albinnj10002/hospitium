
<?php
session_start();
include("db_connect.php");
if(isset($_GET['ap_id']))
{
	$ap_id=$_GET['ap_id'];
	 

 $query="DELETE FROM appoinment WHERE ap_id=$ap_id";
 // var_dump($query);
 // exit();
 //var_dump($query);
	// $query="DELETE FROM login,registration using login INNER JOIN registration INNER JOIN astrologer WHERE login.lo_id=registration.lo_id AND registration.lo_id=astrologer.lo_id";
	$result=$con->query($query);
	if($result)
	{
		header('Location:viewuappoint.php');
	}
}
?>