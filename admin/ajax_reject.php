<?php 

	include("../connection.php");
	
	
	$id = $_POST['id'];
	
	$query = "UPDATE doctors SET status='Rejected' WHERE id='$id'";
	$res = mysqli_query($connect,$query);
	
	mysqli_query($connect,$query);
	
?>