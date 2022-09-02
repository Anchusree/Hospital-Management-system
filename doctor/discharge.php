<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>Check Patient Appointment</title>
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
				<h5 class="text-center my-5">Total Appointment</h5>
				<?php 
				
					if(isset($_GET['id'])){
						$id = $_GET['id'];
						$query = "SELECT * FROM appointment WHERE id='$id'";
						$res = mysqli_query($connect,$query);
						$row = mysqli_fetch_array($res);
					}
				?>
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<table class='table table-bordered'>
						<tr>
							<td colspan="2" class="text-danger">Appointment Details</td>
						</tr>
						<tr>
							<td>Firstname</td>
							<td><?php echo $row['firstname']; ?></td>
						</tr>
						<tr>
							<td>Lastname</td>
							<td><?php echo $row['lastname']; ?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td><?php echo $row['gender']; ?></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><?php echo $row['phone']; ?></td>
						</tr>
						<tr>
							<td>Appointment Date</td>
							<td><?php echo $row['appointment_date']; ?></td>
						</tr>
						<tr>
							<td>Symptoms</td>
							<td><?php echo $row['symptoms']; ?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<h5 class="text-center my-1">Invoice</h5>
					<?php   
						if(isset($_POST['send'])){
							$fee = $_POST['fee'];
							$description = $_POST['description'];
						}
						if(empty($fee)){
							
						}
						else if(empty($description)){
							
						}
						else{
							$doc = $_SESSION['doctor'];
							$patient = $row['firstname'];
							#$date_discharge = $row['date_discharge'];
							#$amount_paid = $row['amount_paid'];
							#$description = $row['description'];
							#$date_check = $row['date_check'];
						
							$query = "INSERT INTO income(doctor,patient,date_discharge,amount_paid,description,date_check) 
							VALUES('$doc','$patient',NOW(),'$fee','$description',NOW())";
							$result = mysqli_query($connect,$query);
							if($result){
								echo "<script>alert('You have sent Invoice')</script>";
								mysqli_query($connect,"UPDATE appointment SET status='Discharge' WHERE id='$id'");
							}
						}
					?>
					
					
					<form method="POST">
					<label>Fee</label>
					<input type="number" name="fee" class="form-control" autocomplete="off" placeholder = "Enter patient fee">
					
					<label>Description</label>
					<input type="text" name="description" class="form-control" autocomplete="off" placeholder = "Enter description">
					
					<input type="submit" name="send" class="btn btn-info my-2" value = "Send">
					
					</form>
				</div>
				</div>
			</div>
	</div>
		
</body>
</html>


