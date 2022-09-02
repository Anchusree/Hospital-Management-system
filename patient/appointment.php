<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>Book Appointment</title>
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
				<h5 class="text-center my-5">Book Appointment</h5>
				<?php 
					$pat = $_SESSION['patient'];
					$query = "SELECT * FROM patients WHERE username ='$pat'";
					$res = mysqli_query($connect,$query);
					$row = mysqli_fetch_array($res);
					$firstname = $row['firstname'];
					$lastname = $row['lastname'];
					$gender = $row['gender'];
					$phone = $row['phone'];
				
					
					if(isset($_POST['book'])){
						$date = $_POST['date'];
						$symptoms = $_POST['symptoms'];
						$error = array();
							
						if(empty($symptoms)){
							$error['book'] = "Enter symptoms";
						}
						else if(empty($date)){
							$error['book'] = "Enter date";
						}
						else{
							$user = $_SESSION['patient'];
							$query = "INSERT INTO appointment(id,firstname,lastname,gender,phone,appointment_date,symptoms,status,date_booked) VALUES
							('', '$firstname','$lastname','$gender','$phone',NOW(),'symptoms','Pending',NOW())";
							$result = mysqli_query($connect,$query);
							if($result) {
								echo "<script>alert('You have booked an appointment!')</script>";	
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
				<div class="col-md-6">
				<form method="post" class="my-2">
					<label>Appointment Date</label>
					<input type="date" name="date" class="form-control"
						placeholder="Enter date" autocomplete="off">
						<br>
					<label>Symptoms</label>
					<input type="text" name="symptoms" class="form-control"
						placeholder="Enter symptoms" autocomplete="off">
						<br>
					<input type="submit" name="book" class="btn btn-success" value="Book Appointment">
					</form>
				</div>
			
			</div>
		</div>
	</div>
		
</body>
</html>


