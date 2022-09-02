<?php 
session_start();
?>

<!DOCTYPE Html>
<html> 
<head>
<title>Doctor's Dashboard</title>
</head>
<body>
	<?php 
	 include("../header.php"); 
	 include("../connection.php")
	?>
	<div class="container-fluid">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<?php include("./sidenav.php") ?>
					</div>
					
					<div class="col-md-10">
					<h5>Doctor's Dashboard</h5>
					<div class="container-fluid">
					<div class="col-md-12">
					<div class="row">
					<div class="col-md-3 mx-2 bg-danger" style="height:150px;margin: 10px;">
						<div class="col-md-12">
							<div class="row">
							<div class="col-md-8">
							
							<h5 class="my-3 text-white" style="font-size:30px;text-align:center;" ></h5>
								<h5 style="color:white;text-align:center;">My Profile</h5>
					
							</div>
							<div class="col-md-4">
								<a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i></a>
							
							</div>
							</div>
						</div>
					</div>
						<div class="col-md-3 mx-2 bg-success" style="height:150px; margin: 10px;">
						<div class="col-md-12">
							<div class="row">
							<div class="col-md-8">
								<?php 
									$patient = mysqli_query($connect,"SELECT * FROM patients"); 
									$num2 = mysqli_num_rows($patient);
								?>
								<h5 class="my-3 text-white" style="font-size:30px;text-align:center;" ><?php echo $num2; ?></h5>
								<h5 style="color:white;text-align:center;" >Total Patients</h5>
							</div>
							<div class="col-md-4">
								<a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
							
							</div>
							</div>
						</div>
						
						</div>
						<div class="col-md-3 mx-2 bg-warning" style="height:150px; margin: 10px;">
						<div class="col-md-12">
							<div class="row">
							<div class="col-md-8">
								<?php 
									$appoint = mysqli_query($connect,"SELECT * FROM appointment WHERE status='Pending'"); 
									$num5 = mysqli_num_rows($appoint);
								?>
								<h5 class="my-3 text-white" style="font-size:30px;text-align:center;" >
								<?php 
								if($num5){
									echo $num5;
									}
								else{
									echo '0';
								};?>
								
								</h5>
								<h5 style="color:white;text-align:center;" >Total Appointments</h5>
							</div>
							<div class="col-md-4">
								<a href="appointment.php"><i class="fa fa-book-open fa-3x my-4" style="color:white;"></i></a>
							
							</div>
							</div>
						</div>
						
						</div>
					</div>
					</div>
					</div>
					
					
					
					
				</div>
			</div>
		</div>
		

</body>
</html>