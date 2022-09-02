<?php 
session_start();
?>

<!DOCTYPE Html>
<html> 
<head>
<title>Patient's Dashboard</title>
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
					<h5>Patient's Dashboard</h5>
					<div class="container-fluid">
					<div class="col-md-12">
					<div class="row">
					<div class="col-md-3 mx-2 bg-danger" style="height:150px;margin:10px;">
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
			
						<div class="col-md-3 mx-2 bg-warning" style="height:150px; margin: 10px;">
						<div class="col-md-12">
							<div class="row">
							<div class="col-md-8">
								<h5 class="my-3 text-white" style="font-size:30px;text-align:center;" >0</h5>
								<h5 style="color:white;text-align:center;" >Total Appointments</h5>
							</div>
							<div class="col-md-4">
								<a href="appointment.php"><i class="fa fa-book-open fa-3x my-4" style="color:white;"></i></a>
							
							</div>
							</div>
						</div>
						
						</div>
						<div class="col-md-3 mx-2 bg-success" style="height:150px; margin: 10px;">
						<div class="col-md-12">
							<div class="row">
							<div class="col-md-8">
								<h5 class="my-3 text-white" style="font-size:30px;text-align:center;" >0</h5>
								<h5 style="color:white;text-align:center;" >My invoice</h5>
							</div>
							<div class="col-md-4">
								<a href="invoice.php"><i class="fa fa-book-open fa-3x my-4" style="color:white;"></i></a>
							
							</div>
							</div>
						</div>
						
						</div>
					</div>
					</div>
					</div>
					
					<?php 
						if(isset($_POST['send'])){
							$title = $_POST['title'];
							$message = $_POST['message'];
							
							$error = array();
							
							if(empty($title)){
								$error['send'] = "Enter title";
							}
							else if(empty($message)){
								$error['send'] = "Enter message";
							}
							else{
								$user = $_SESSION['patient'];
								$query = "INSERT INTO report(id,title,message,username,date_send) VALUES
								 ('','$title','$message','$user',NOW())";
								 $result = mysqli_query($connect,$query);
								 if($result) {
									echo "<script>alert('You have successfully applied!')</script>";
									
								 }
								 else{
									 echo "<script>alert('Failed to load!')</script>";
								 }
							}
						}


					?>
					
					
					<div class="col-md-12">
							<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3 jumbtron bg-info my-5" style="width:319px;height:272px;">
								<h6 class="my-3 text-white" style="font-size:30px;text-align:center;" >Send a Report</h6>
								<form method="post"> 
									<label>Title</label>
									<input type="text" name="title" autocomplete="off" class="form-control"
									placeholder="Enter Title of the report">
									<label>Message</label>
									<input type="text" name="message" autocomplete="off" class="form-control"
									placeholder="Enter Message"><br>
									<input type="submit" name="send" a class="btn btn-success"
									placeholder="Send">
								</form>
								
							</div>
							</div>
					</div>
					
					
					
					
				</div>
			</div>
		</div>
		

</body>
</html>