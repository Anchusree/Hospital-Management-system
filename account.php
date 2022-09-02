<?php 
session_start();

		 include("./header.php");
		 include("./connection.php");
		 
		 if(isset($_POST['create'])){
			 $firstname = $_POST['firstname'];
			 $lastname = $_POST['lastname'];
			 $username = $_POST['uname'];
			 $email = $_POST['emailaddress'];
			 $gender = $_POST['gender'];
			 $phone = $_POST['phonenumber'];
			 $country = $_POST['country'];
			 $password = $_POST['pass'];
			 $confirm_password = $_POST['confirmpass'];
			 
			 $error = array();
			 
			 if(empty($firstname)){
				 $error['apply'] = "Enter firstname";
			 }
			 else if(empty($lastname)){
				  $error['apply'] = "Enter lastname";
			 }
			 else if(empty($username)){
				  $error['apply'] = "Enter username";
			 }
			 else if(empty($password)){
				  $error['apply'] = "Enter password";
			 }
			 else if(empty($email)){
				  $error['apply'] = "Enter email";
			 }
			 else if(empty($phone)){
				  $error['apply'] = "Enter phone number";
			 }
			 else if($gender == ""){
				  $error['apply'] = "Select gender";
			 }
			 else if($country == ""){
				  $error['apply'] = "Select your country";
			 }
			 else if($confirm_password !== $password){
				  $error['apply'] = "Passwords don't match";
			 }
			 
			 if(count($error)==0){
				 $query = "INSERT INTO patients(id,firstname, 
				 lastname,username,email,gender,phone,country,
				 password,date_reg,profile)
				 VALUES('','$firstname','$lastname','$username','$email',
				 '$gender',$phone,'$country','$password',NOW(),'doctor1.jpg')";
				  echo $query;
				 $result = mysqli_query($connect,$query);
				 echo $result;
				 if($result) {
					echo "<script>alert('You have successfully created account!')</script>";
					header("Location:patientlogin.php");
				 }
				 else{
					 echo "<script>alert('Failed to load!')</script>";
				 }
			 }
		 }
		 if(isset($error['apply'])){
			 $s = $error['apply'];
			 $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
		 }
		 else{
			 $show = "";
		 }
		
?>
<!DOCTYPE Html>
<html> 
<head>
<title>Create Account Page</title>
</head>
<body style="background-image:url(img/patient.jpeg);background-size:cover; background-repeat:no-repeat;">
	<div class="container-fluid">
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6" style="margin-top:10px;background-color:#ddd4d4ed; border-radius:10px;">
						<h5 class="text-center my-5">Create Account</h5>
							<form method="post" class="my-2">
								<div class="form-group">
									<label>Firstname</label>
									<input type="text" name="firstname" class="form-control"
									placeholder="Enter firstname" autocomplete="off" value= <?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>>
								</div>
								<div class="form-group" style="">
									<label>Lastname</label>
									<input type="text" name="lastname" class="form-control"
									placeholder="Enter lastname" autocomplete="off" value= <?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?> >
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="uname" class="form-control"
									placeholder="Enter Username" autocomplete="off"  value= <?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>>
								</div>
								<div class="form-group"  style="">
									<label>Email</label>
									<input type="email" name="emailaddress" class="form-control"
									placeholder="Enter Email Address" autocomplete="off" value= <?php if(isset($_POST['email'])) echo $_POST['email']; ?>>
								</div>
								<div class="form-group">
									<label>Gender</label>
									<select name="gender" class="form-control" >
										<option value="">Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								
								<div class="form-group" style="">
									<label>Phone Number</label>
									<input type="number" name="phonenumber" class="form-control"
									placeholder="Enter Phone Number" autocomplete="off" value= <?php if(isset($_POST['phonenumber'])) echo $_POST['phonenumber']; ?>>
								</div>
								<div class="form-group">
									<label>Country</label>
									<select  name="country" class="form-control" >
										<option value="">Select Country</option>
										<option value="Russia">Russia</option>
										<option value="Qatar">Qatar</option>
										<option value="India">India</option>
										<option value="Paris">Paris</option>
										<option value="London">London</option>
										<option value="Singapore">Singapore</option>
									</select>
								</div>
								<div class="form-group" >
									<label>Password</label>
									<input type="password" name="pass" class="form-control"
									placeholder="Enter Password" autocomplete="off">
								</div>
								<div class="form-group" style="">
									<label>Confirm assword</label>
									<input type="password" name="confirmpass" class="form-control"
									placeholder="Confirm Password" autocomplete="off" >
								</div>
								<br>
								<div  class="form-group">
								<input type="submit" name="create" class="btn btn-success" value="Login" >
								<p>Already have an account?<a href="patientlogin.php">Create Account</a></p>
								</div>
							</form>
					</div>
			<div class="col-md-3"></div>
		</div>
	</div>
		
</body>
</html>