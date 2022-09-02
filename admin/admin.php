<?php 
session_start();
 $show='';
?>

<!DOCTYPE html>
<html> 
<head>
<title>Admin</title>
</head>
<body>
	<?php include("../header.php") ?>
	<?php include("../connection.php") ?>
	<div class="container-fluid">
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-2">
			<?php include("./sidenav.php") ?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12 my-4">
					<div class="row">
					<div class="col-md-6">
					<h5>All Admins</h5>
					
					<?php 
					$adm = $_SESSION['admin'];
					$query = "SELECT * FROM admin WHERE username != ''";
					$res = mysqli_query($connect,$query);
					$output = "
					<table class='table table-responsive table-bordered'>
					<tr>
					<th>ID</th>
					<th>Username</th>
					<th style='width:10%;'>Actions</th>
					</tr>
					
					";
					if(mysqli_num_rows($res)< 1){
						$output .= "
						<tr>
							<td colspan='3' class='text-center'>No new admin</td>
						</tr>
						>";
					}
					while($row = mysqli_fetch_array($res)){
						$id = $row['id'];
						$username = $row['username'];
						
						$output .="
						<tr>
						<td>$id</td>
						<td>$username</td>
						<td>
						<a href='admin.php?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a>
						</td>
						";
					}
					$output .="
					</tr>
					</table>
					";
					echo $output;
					if(isset($_GET['id'])){
					
						$delid = $_GET['id'];
						$query = "DELETE FROM admin where id='$delid'";
						$result = mysqli_query($connect,$query);
						if($result){
							$all_list = "SELECT * FROM admin";
							$new_result = mysqli_query($connect,$all_list);
						
						}
					}
					?>
					</div>
					<div class="col-md-6">
					<h5 class="text-center">Add Admin</h5>
					
					<?php
							
							if(isset($_POST['addadmin'])){
								$uname = $_POST['uname'];
								$pass = $_POST['pass'];	
								$image = $_FILES['img']['name'];
								$error = array();

								if(empty($uname)){
									$error['u'] = 'Enter admin username';
								}
								else if(empty($pass)){
									$error['u'] = 'Enter admin password';
								}		
								else if(empty($image)){
									$error['u'] = 'Upload profile image';
								}
								if(count($error)== 0){
									$add_sql = "INSERT INTO admin(username,password,profile) 
									VALUES('$uname','$pass','$image')";
									$result = mysqli_query($connect,$add_sql);
									if($result){
										move_uploaded_file($_FILES['img']['tmp_name'],'img/$image');
									}
									else{
										echo "<script>alert('Something went wrong')</script>";
									}
								}
								else{
									$er = $error['u'];
								if(isset($error['u'])){
									$er = $error['u'];
									$show = "<h5 class='text-center alert alert-danger'></h5>";
								}
								else{
									$show = "";
								}
								}	
							}
								
							
						?>

					<form method="post" enctype="multipart/form-data">
						<div>
							<?php echo $show; ?>
						</div>
						<div class="form-group">
						<label>Username</label>
						<input type="text" name="uname" class="form-control" autocomplete="off">	
						</div>
						<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" class="form-control" autocomplete="off">	
						</div>
						<div class="form-group">
						<label>Admin Profile</label>
						<input type="file" name="img" class="form-control">	
						</div><br>
						<input type="submit" name="addadmin" class="btn btn-success" value="Add new Admin">	
					</form>
					
					
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
			

</body>
</html>