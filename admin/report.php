<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>View Report Details</title>
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
				<h5 class="text-center my-5">Total Reports</h5>
				<?php 
					$query = "SELECT * FROM report";
					$res = mysqli_query($connect,$query);
					$row = mysqli_fetch_array($res);
					$output = "";
					$output .="
					<table class='table table-bordered'>
						<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Message</th>
						<th>Username</th>
						<th>Date Send</th>
						</tr>
				
					";
					
					if(mysqli_num_rows($res)<1){
						$output .="
						<tr>
							<td class='text-center' colspan='6'>No Report Yet</td>						
						</tr>
						";
					}
					else{
						$output .="
						<tr>
							<td>".$row['id']."</td>
							<td>".$row['title']."</td>
							<td>".$row['message']."</td>
							<td>".$row['username']."</td>
							<td>".$row['date_send']."</td>								
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


