<?php 
session_start();
include("connection.php");


if(isset($_POST['login'])){
	$username = $_POST['uname'];
	$pass = $_POST['pass'];
	$error = array();
	
	if(empty($username)){
		$error['admin'] = "Enter username";
	}
	else if(empty($pass)){
		$error['admin'] = "Enter password";
	}
	if(count($error) == 0){
		$query = "SELECT * FROM admin WHERE username = '$username' and password='$pass'";
		$result = mysqli_query($connect,$query);
		#echo $result;
		
		if(mysqli_num_rows($result) == 1){
			echo "<script>alert('You have logined as an admin')</script>";
			$_SESSION['admin'] = $username;
			header("Location:admin/index.php");
			exit();
		}

		else{
			echo "<script>alert('Invalid username or password')</script>";
		}
	}
}
?>

<!DOCTYPE Hhtml>
<html>
<head>
<title>Admin Login Page</title>
</head>
<body style="background-image: url(./img/hospital.jpg); background-repeat: no-repeat;
    background-size: cover;">

	<?php include("header.php") ?>
	
	<div style="margin-top:20px;"></div>
	
	<div class="container">
		<div class="col-md-12">
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-6" style="margin-top:30px;background-color:#808080a1; border-radius:10px;">
		<h2 style="text-align:center;">Admin Login</h2>
		<img src="./img/adminlogin.jpg" class="col-md-12" width="150px" height="200px"
		style="text-align:center;">
			<form method="post" class="my-2">
			<div >
			<?php 
			if(isset($error['admin'])){
				$sh = $error['admin'];
				
				$show = "<h5 class='alert alert-danger'>$sh</h4>";
				echo $show;
			} 
			else{
				$show = "";
			}
			?>
			</div>
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
			</div>
			</form>
		
		
		</div>
		<div class="col-md-4"></div>
		</div>
		<div>
	
	</div>


</body>
</html>