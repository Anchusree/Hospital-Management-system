<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>Total Income</title>
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
				<h5 class="text-center my-5">Total Income</h5>
				<?php 
					
					$query = "SELECT * FROM income";
					$res = mysqli_query($connect,$query);
					$output = "";
					$output .="
					<table class='table table-bordered'>
						<tr>
						<th>ID</th>
						<th>Doctor</th>
						<th>Patient</th>
						<th>Date Discharge</th>
						<th>Amount Paid</th>
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
							<td>".$row['doctor']."</td>
							<td>".$row['patient']."</td>
							<td>".$row['date_discharge']."</td>
							<td>".$row['amount_paid']."</td>								
						</tr>
						";
					}
					$output .="</tr></table>";
					echo $output;
					?>
			</div>
		</div>
	</div>
		
</body>
</html>


