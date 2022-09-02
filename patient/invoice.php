<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>My Invoice</title>
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
				<h5 class="text-center my-5">Total Appointments</h5>
				<?php 
					$pat = $_SESSION['patient'];
						$query = "SELECT * FROM patients WHERE username='$pat'";
						$res = mysqli_query($connect,$query);
						$row = mysqli_fetch_array($res);
						$firstname = $row['firstname'];
						$query_results = mysqli_query($connect,"SELECT * FROM income WHERE patient='$firstname' ");
					
					$output = "";
					$output .="
					<table class='table table-bordered'>
						<tr>
							<th>ID</th>
							<th>Doctor</th>
							<th>Patient</th>
							<th>Date Discharge</th>
							<th>Amount Paid</th>
							<th>Description</th>
						</tr>
					";
					if(mysqli_num_rows($query_results)<1){
						$output .="
						<tr>
							<td class='text-center' colspan='6'>No Data Yet</td>						
						</tr>
						";
					}
					while($row = mysqli_fetch_array($res)){
						$output .="
						<tr>
							<td>".$row['id']."</td>
							<td>".$row['doctor']."</td>
							<td>".$row['patient']."</td>
							<td>".$row['date_discharge']."</td>
							<td>".$row['amount_paid']."</td>
							<td>".$row['description']."</td>
							<td>
								<a href='check.php?id=".$row['id']."'>
									<button class='btn btn-info'>View</button>
								</a>
							</td>
													
						</tr>
						";
					}
					$output .="</tr></table>";

					echo $output;
				
				?>
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6"></div>
				<br>
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
							$patient = $row['patient'];
							$date_discharge = $row['date_discharge'];
							$amount_paid = $row['amount_paid'];
							$description = $row['description'];
							#$date_check = $row['date_check'];
						
							$query = "INSERT INTO income(id,doctor,patient,date_discharge,amount_paid,description,date_check) 
							VALUES(``, `$doctor`, `$patient`, `NOW()`, `$amount_paid`, `$description`) ";
							$res = mysqli_query($connect,$query);
							if($res){
								echo "<script>alert('You have sent Invoice')</script>";
								mysqli_query($connect,"UPDATE appointment SET status='Discharge' WHERE id='$id'");	
							}
						}
					?>

					<form>
					<label>Fee</label>
					<input type="number" name="fee" class="form-control" autocomplete="off" placeholder = "Enter patient fee">
					
					<label>Description</label>
					<input type="number" name="description" class="form-control" autocomplete="off" placeholder = "Enter patient fee">
					
					<input type="submit" name="send" class="btn btn-info my-2" value = "Send">
					
					</form>
				</div>
				</div>
			</div>
	</div>
		
</body>
</html>


