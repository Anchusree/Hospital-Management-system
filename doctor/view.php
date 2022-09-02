<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>View Doctors Details</title>
</head>
<body>
	
	<?php 

	 include("../header.php");
	 include("../connection.php");
?>
	
	<div class="container-fluid">
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-2">
			<?php include("./sidenav.php") ?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center my-5">View Patient Details</h5>
				<?php 
					if(isset($_GET['id'])){
						$id = $_GET['id'];
						$query = "SELECT * FROM patients WHERE id='$id'";
						$res = mysqli_query($connect,$query);
						$row = mysqli_fetch_array($res);
						
					}
					?>
					<div class="col-md-12">
							<div class="row">
							<div class="col-md-3"></div>
								<div class="col-md-6">
									<img src="../patient/img/<?php echo $row['profile']; ?>" class="col-md-12 my-2" height="250px;">
								<table class='table table-bordered'>
									<tr>
										<th colspan="2" class="text-center">Details</th>
										
									</tr>
									<tr>
										<td>Firstname - </td>
										<td><?php echo $row['firstname']; ?></td>
									</tr>
									<tr>
										<td>Lastname - </td>
										<td><?php echo $row['lastname']; ?></td>
									</tr>
									<tr>
										<td>Email - </td>
										<td><?php echo $row['email']; ?></td>
									</tr>
									<tr>
										<td>Gender - </td>
										<td><?php echo $row['gender']; ?></td>
									</tr>
									<tr>
										<td>Country - </td>
										<td><?php echo $row['country']; ?></td>
									</tr>
								</table>
								
								</div>
								
							</div>
						</div>
			</div>
		</div>
	</div>
		
</body>
</html>


