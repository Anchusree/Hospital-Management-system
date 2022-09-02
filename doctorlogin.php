<?php 
session_start();

?>
<!DOCTYPE Hhtml>
<html> 
<head>
<title>Doctor Login Page</title>
</head>
<body style="background-image:url(img/doctors.jpg);background-size:cover; background-repeat:no-repeat;">
		<?php 
		 include("./header.php");
		 include("./connection.php");
		 
		 if(isset($_POST['login'])){
			$username = $_POST['uname'];
			$password = $_POST['pass']; 
		 }
		 $error = array();
		 if(isset($_SESSION['doctor'])){
			 $q = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
			 $connect_q = mysqli_query($connect,$q);
			 $row = mysqli_fetch_array($connect_q);
			 echo $row;
		 }
		
		 
		 if(empty($username)){
			 $error['login'] = "Enter username" ;
		 }
		 else if(empty($password)){
			 $error['login'] = "Enter password" ;
		 }
		 else if($row['status']=='Pending'){
			 $error['login'] = "Please wait for admin to confirm " ;
		 }
		 else if($row['status']=='Rejected'){
			 $error['login'] = "Try again later";
		 }
		 
		 if(count($error) == 0){
			 $query = "SELECT * FROM doctors WHERE username='$username' AND password ='$password'";
			 $res = mysqli_query($connect,$query);
			 if(mysqli_num_rows($res) == 1){
				 $_SESSION['doctor'] = $username;
				 header("Location:doctor/index.php");
				 #echo "<script>alert('done')</script>";
				 exit();
			 }
			 else{
				  echo "<script>alert('Invalid Account')</script>";
			 }
		 }
		 
		?>
		
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6" style="margin-top:50px;background-color:#808080ed; border-radius:10px;">
						<h5 class="text-center my-5">Doctor's Login</h5>
							<form method="post" class="my-2">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="uname" class="form-control"
									placeholder="Enter username" autocomplete="off">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="pass" class="form-control"
									placeholder="Enter password" autocomplete="off">
								</div>
								<br>
								<div class="form-group">
									<input type="submit" name="login" class="btn btn-success" value="Login">
									<p>Don't have an account? <a href="apply.php">Apply Now!</a></p>
								</div>
							</form>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>
	
</body>
</html>