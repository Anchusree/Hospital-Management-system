<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>View Invoice</title>
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
				<h5 class="text-center my-5">View invoice</h5>
				<?php 
					$pat = $_SESSION['patient'];
						$query = "SELECT * FROM patient WHERE username='$pat'";
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
							<td>".$row['id']"</td>
							<td>".$row['doctor']"</td>
							<td>".$row['patient']"</td>
							<td>".$row['date_discharge']"</td>
							<td>".$row['amount_paid']"</td>
							<td>".$row['description']"</td>
							<td>
								<a href='view.php?id=".$row['id']."'>
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
				<div class="col-md-6">
					<?php
						if(isset($_GET['id'])){
							$id = $_GET['id'];
							$query = "SELECT * FROM income WHERE id='$id'";
							$res = mysqli_query($connect,$query);
							$row = mysqli_fetch_array($res);
						}
					?>
					<table class="table table-bordered">
						<tr>
							<td colspan='2' class='text-center'>Invloice Details</td>
						</tr>
						<tr>
							<td>Doctor</td>
							<td><?php echo $row['doctor'];?></td>
						</tr>
						<tr>
							<td>Patient</td>
							<td><?php echo $row['patient'];?></td>
						</tr>
						<tr>
							<td>Date Discharge</td>
							<td><?php echo $row['date_discharge'];?></td>
						</tr>
						<tr>
							<td>Amount Paid</td>
							<td><?php echo $row['amount_paid'];?></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><?php echo $row['description'];?></td>
						</tr>
					</table>
				
				</div>
				
				</div>
			</div>
	</div>
		
</body>
</html>


