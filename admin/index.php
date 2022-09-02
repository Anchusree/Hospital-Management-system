
<?php session_start(); ?>

<!DOCTYPE Html>
<html>
<head>
<title></title>
</head>
<body>
	<?php include("../header.php") ?>
	<?php include("../connection.php") ?>
	
	<div class="container-fluid">
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-2 " style="margin-left:-15px">
				<?php include("sidenav.php") ?>
			</div>	
			<div class="col-md-10">
			<h4 class="my-2">Admin Dashboard</h4>
				<div class="col-md-12 my-1">
					<div class="row">
					<div class="col-md-3 bg-success mx-2" style="height:130px;">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<?php 
										$admin_count = mysqli_query($connect,"SELECT * FROM admin");
										$num = mysqli_num_rows($admin_count);
									?>
									<h5 class="my-3 text-white" style="font-size:30px;text-align:center;"><?php echo $num; ?></h5>
									<h5 style="color:white;text-align:center;" >Total Admin</h5>
								</div>
								<div class="col-md-8">
									<a href="admin.php"><i class="fa fa-users-cog fa-3x" style="color:white;float:right; margin-top: -60px;margin-right: -54px;"></i></a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 bg-info mx-2" style="height:130px;">
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<?php 
									$doctor = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'"); 
									$num2 = mysqli_num_rows($doctor);
									?>
									
									<h5 class="my-3 text-white" style="font-size:30px;text-align:center;"><?php echo $num2; ?></h5>
									<h5 style="color:white;text-align:center;" >Total Doctors</h5>
								</div>
								<div class="col-md-8">
									<a href="doctor.php"><i class="fa fa-user-md fa-3x" style="color:white;float:right; margin-top: -60px;margin-right: -54px;"></i></a>
								</div>
							</div>
						</div>
					
					</div>
				
					<div class="col-md-3 bg-secondary mx-2" style="height:130px;">
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
								<div class="col-md-8">
									<a href="patient.php"><i class="fa fa-procedures fa-3x" style="color:white;float:right; margin-top: -60px;margin-right: -54px;"></i></a>
								</div>
							</div>
						</div>
				
					</div>
					
					<div class="col-md-3 bg-warning mx-2 my-2" style="height:130px;">
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<?php 
									$reports = mysqli_query($connect,"SELECT * FROM report"); 
									$num3 = mysqli_num_rows($reports);
									?>
									<h5 class="my-3 text-white" style="font-size:30px;text-align:center;" ><?php echo $num3; ?></h5>
									<h5 style="color:white;text-align:center;" >Total Reports</h5>
								</div>
								<div class="col-md-8">
									<a href="report.php"><i class="fa fa-file-medical fa-3x" style="color:white;float:right; margin-top: -60px;margin-right: -54px;"></i></a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 bg-danger mx-2 my-2" style="height:130px;">
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<?php 
										$pending_applications = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pending';");
										$num1 = mysqli_num_rows($pending_applications); 
									?>
									<h5 class="my-3 text-white" style="font-size:30px;text-align:center;"><?php echo $num1;?></h5>
									<h5 style="color:white;text-align:center;">Total Job Requests</h5>
								</div>
								<div class="col-md-8">
									<a href="jobrequest.php"><i class="fa fa-book-open fa-3x" style="color:white;float:right; margin-top: -60px;margin-right: -54px;"></i></a>
								</div>
							</div>
						</div>
					
					</div>
				
					<div class="col-md-3 bg-primary mx-2 my-2" style="height:130px;">
					
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
								<?php 
									$income = mysqli_query($connect,"SELECT sum(amount_paid) as profit FROM income"); 
									$row = mysqli_fetch_array($income);
									$inc = $row['profit'];
									
									?>
									<h5 class="my-3 text-white" style="font-size:30px;text-align:center;" >$ <?php echo $inc; ?></h5>
									<h5 style="color:white;text-align:center;" >Total Income</h5>
								</div>
								<div class="col-md-8">
									<a href="income.php"><i class="fa fa-money-check-alt fa-3x" style="color:white;float:right; margin-top: -60px;margin-right: -54px;"></i></a>
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