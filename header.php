<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>
	
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-info bg-dark">
	<h5 class="text-white">Hospital Management System</h5>
	<div class="me-auto"></div>
	<ul class="navbar nav">
		<?php 
			if(isset($_SESSION['admin'])){
				$user = $_SESSION['admin'];
				echo '<li class="nav-item"><a href="#" class="nav-link text-white">Welcome '.$user. 
				'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
			}
			else if(isset($_SESSION['doctor'])){
				$doctor = $_SESSION['doctor'];
				echo '<li class="nav-item"><a href="#" class="nav-link text-white">Welcome '.$doctor. 
				'</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
			}
			else if(isset($_SESSION['patient'])){
				$patient = $_SESSION['patient'];
				echo '<li class="nav-item"><a href="#" class="nav-link text-white">Welcome '.$patient.' 
				</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
			}
			else{
				echo '<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
					<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
					<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patients</a></li>';
			}
		
		?>
	</ul>
	
</nav>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html
