<?php 
session_start();

?>
<!DOCTYPE Html>
<html> 
<head>
<title></title>
</head>
<body>
	<?php 
	 include("../header.php");
	 include("../connection.php");
	$ad = $_SESSION['admin'];
	$query = "SELECT * FROM admin WHERE username='$ad'";
	$res = mysqli_query($connect,$query);
	while($row = mysqli_fetch_array($res)){
		$username = $row['username'];
		$profile = $row['profile'];
	}
	?>
	
	
	<div class="container-fluid">
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-2">
			<?php include("./sidenav.php") ?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12 my-6">
				<h4><?php echo $username ?>'s Profile</h4>
				<?php 
				if(isset($_POST['updateprofile'])){
					$profile = $_FILES['profile']['name'];
					if(empty($profile)){
						echo "something went wrong";
					}
					else{
						$query = "UPDATE admin SET profile='$profile' WHERE username ='$ad'";
						$result = mysqli_query($connect,$query);
						if($result){
							move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
						}
					}
				}
				?>
				<form method="post" enctype="multipart/form-data">
					<?php echo 
					"<img src='img/$profile' class='col-md-12 rounded-circle' style='width:150px;height:150px;'>"; 
					?>
					<br><br>
					<div class="form-group">
						<label>UPDATE PROFILE</label><br>
						<input type="file" name="profile" class="form-control" style="width:250px" >
					</div>
					<br>
					<input type="submit" name="updateprofile" value="Update" class="btn btn-success">
				</form>
					
				</div>
			
				<div class="col-md-12 my-6">
				<?php 
					if(isset($_POST['changeuname'])){
						$uname = $_POST['uname'];
						if(empty($uname)){
							
						}
						else{
							$query = "UPDATE admin SET WHERE username ='$ad'";
							$res = mysqli_query($connect,$query);
							if($res){
								$_SESSION['admin'] = $uname;
							}
						}
					}
				?>
				<form method="post">
				<label>Change Username</label>
				<input type="text-center my-4" name="uname" class="form-control" autocomplete="off" style="width:250px">
				<br>
				<input type="submit" name="changeuname" class="btn btn-success" value="Change Username">
				</form>
				<br><br>
				<?php 
					if(isset($_POST['updatepass'])){
						 $old_pass = $_POST['oldpass'];
						 $new_pass = $_POST['newpass'];
						 $confirm_pass = $_POST['confirmpass'];
						 
						 $old = mysqli_query($connect,"SELECT * FROM admin WHERE username = '$ad'");
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
							 $query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";
							 mysqli_query($connect,$query);

						 }
						
						
					}
					 if(isset($error['p'])){
							 $e = $error['p'];
							 $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
						 }
						 else{
							 $show = "";
						 } 
				?>
				<form method="post" style="float:right; margin-top:-320px;margin-right:195px;">
				<h6>Change Password</h6>
				<div> 
					<?php 
						echo $show;
					?>
				</div>
				
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
				<input type="submit" name="updatepass" class="btn btn-success" value="Change Password">
				</form>
				
			</div>
			</div>
		</div>
	</div>
		
</body>
</html>