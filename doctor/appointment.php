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
				<h5 class="text-center my-5">Total Appointment</h5>
				<?php 
					
					$query = "SELECT * FROM appointment WHERE status ='Pending'";
					$res = mysqli_query($connect,$query);
					$output = "";
					$output .="
					<table class='table table-bordered'>
						<tr>
						<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Gender</th>
						<th>Phone</th>
						<th>Appointment Date</th>
						<th>Symptoms</th>
						<th>Date Booked</th>
						<th>Date Booked</th>
						</tr>
					";
					
					if(mysqli_num_rows($res)<1){
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
							<td>".$row['firstname']."</td>
							<td>".$row['lastname']."</td>
							<td>".$row['gender']."</td>
							<td>".$row['phone']."</td>
							<td>".$row['appointment_date']."</td>
							<td>".$row['symptoms']."</td>
							<td>".$row['date_booked']."</td>
							<td>
							<a href='discharge.php?id=".$row['id']."'>
								<button>Check</button>
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
				
			
				</div>
			</div>
	</div>
		
</body>
</html>


