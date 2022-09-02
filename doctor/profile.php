<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title>Doctor's Profile</title>
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
				
			<div class="container-fluid">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
					<?php 
						$doc = $_SESSION['doctor'];
						$query = "SELECT * FROM doctors WHERE username='$doc'";
						$res = mysqli_query($connect,$query);
						$row = mysqli_fetch_array($res);
						
						if(isset($_POST['updateprofile'])){
							$img = $_FILES['profile']['name'];
						}
						if(empty($img)){
							
						}
						else{
							$query = "UPDATE doctors SET profile ='$img' WHERE username='$doc'";
							$res = mysqli_query($connect,$query);
							if($res){
								move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
							}
						}
					?>
					<form method='post' enctype="multipart/form-data">
						<?php echo 
						"<img src='img/".$row['profile']."' class='col-md-12 my-3 rounded-circle' 
						style='width:250px;height:250px;'>"; 
						?>
						<input type="file" name="profile" class="form-control my-1">
						<input type="submit" name="updateprofile" value="Update" class="btn btn-success">
					</form>
					
					<div class="my-3">
						<table class="table table-bordered">
							<tr>
								<th class="text-center">Details</th>
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
								<td>Username</td>
								<td><?php echo $row['username']; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $row['email']; ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><?php echo $row['phone']; ?></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><?php echo $row['gender']; ?></td>
							</tr>
							<tr>
								<td>Country</td>
								<td><?php echo $row['country']; ?></td>
							</tr>
							<tr>
								<td>Salary</td>
								<td><?php echo "Rs ".$row['salary']; ?></td>
							</tr>
						</table>
					</div>
					</div>
					
					<div class="col-md-6">
						<h5 class="text-center my-2">Update Username</h5>
						<?php 
							if(isset($_POST['change_uname'])){
								$uname = $_POST['uname'];
								if(empty($uname)){
									
								}
								else{
									$query = "UPDATE doctors SET username ='$uname' WHERE username='$doc'";
									$res = mysqli_query($connect,$query);
									if($res){
										$_SESSION['doctor'] = $uname;
									}
								}
							}
						?>
						<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Change Username</label><br>
							<input type="text" name="uname" class="form-control" style="width:250px" >						
						</div>
						<br>
						<input type="submit" name="change_uname" value="Update" class="btn btn-success">
						</form>
						<br><br>
						<h5 class="text-center my-2">Update Password</h5>
						<?php 
							if(isset($_POST['changepass'])){
								if(isset($_POST['updatepass'])){
								 $old_pass = $_POST['oldpass'];
								 $new_pass = $_POST['newpass'];
								 $confirm_pass = $_POST['confirmpass'];
								 
								 $old = mysqli_query($connect,"SELECT * FROM doctors WHERE username = '$doc'");
								 $row = mysqli_fetch_array($old);
								 $pass = $row['password'];
								 
								 $error = array();
								 if(empty($old_pass)){
									$error['p'] = "Enter old password";
								 }
								 else if(empty($new_pass)){
									$error['p'] = "Enter new password";
								 }
								 else if(empty($confirm_pass)){
									$error['p'] = "Enter confirm password";
								 }
								 else if($old_pass != $pass){
									 $error['p'] = "Old password does not match";
								 }
								 else if($new_pass != $confirm_pass){
									 $error['p'] = "Password does not match";
								 }
								 
								 if(count($error) == 0){
									 $query = "UPDATE doctors SET password='$new_pass' WHERE username='$doc'";
									 mysqli_query($connect,$query);

								 }
								}
							}
						?>
						<form method="post">
						<h6>Change Password</h6>
						<div class="form-group">
							<label>Old Password</label>
							<input type="password" name="oldpass" class="form-control" autocomplete="off" style="width:250px">
							
						</div>
						<div class="form-group">
							<label>New Password</label>
							<input type="password" name="newpass" class="form-control" autocomplete="off" style="width:250px">
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="confirmpass" class="form-control" autocomplete="off" style="width:250px">
						</div>
						<br>
						<input type="submit" name="changepass" class="btn btn-warning" value="Change Password">
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