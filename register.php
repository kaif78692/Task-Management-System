<?php
  include('includes/connection.php');
  if(isset($_POST['userRegistration'])){
  	$query = "insert into users (name,email,password,mobile) values('$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[mobile]')";
    $query_run = mysqli_query($connection,$query);
   
    if($query_run){
    	echo "<script type='text/javascript'>
        alert('User registered successfully...');
        window.location.href = 'index.php';
        </script>
         ";
    }
    else{
    	echo "<script type='text/javascript'>
        alert('Error...Please try again.');
        window.location.href = 'register.php';
       </script>
         ";

    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ETMS</title>
	<head>
		<!--jquery files-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!--Bootstrap files-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--External file-->
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
</head>
<body>
	<div class="row">
	<div class="col-md-3 m-auto" id="register_home_page">
		<center><h3 style="background-color: #5A8F7B;padding: 5px;width: 15vw;">User Registration</h3></center>
		<form action="" method="post">
			<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
			</div><br>

			<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
			</div><br>
			<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
			</div><br>
			<div class="form-group">
			<input type="text" name="mobile" class="form-control" placeholder="Enter Mobile No." required>
			</div><br>

			<div class="form-group">
			<center><input type="submit" name="userRegistration" value="Register" class="btn btn-warning"> </center>
			</div><br>
			</form>
			<center><a href="index.php" class="btn btn-danger">Go to Home</a></center>
</div>
</div>

</body>
</html>