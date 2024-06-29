<?php
  session_start();
  include('includes/connection.php');
  if(isset($_POST['userlogin'])){
  	$query = "select email,password,name,uid from users where email = '$_POST[email]' AND password = '$_POST[password]'";
  	$query_run = mysqli_query($connection,$query);
  	if(mysqli_num_rows($query_run)){
  		while ($row = mysqli_fetch_assoc($query_run)) {
  		$_SESSION['email'] = $row['email'];
  		$_SESSION['name'] = $row['name'];
  		$_SESSION['uid'] = $row['uid'];
  	    }

  		echo "<script type='text/javascript'>     
        window.location.href = 'user_dashboard.php';
        </script>
         ";
         }
  	else{
  		echo "<script type='text/javascript'>
        alert('Please enter correct details.');
        window.location.href = 'user_login.php';
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
	<title>VMS</title>
	<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--Bootstrap files-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--External file-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="row">
	<div class="col-md-3 m-auto" id="login_home_page">
		<center><h3 style="background-color: #5A8F7B;padding: 5px;width: 15vw;">User Login</h3></center>
		<form action="" method="post">
			<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
			</div><br>
			<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
			</div><br>
			<div class="form-group">
			<center><input type="submit" name="userlogin" value="Login" class="btn btn-warning"> </center>
			</div><br>
				</form>
			<center><a href="index.php" class="btn btn-danger">Go to Home</a></center>
		</div>
	</form>
    </div>
    </div>

</body>
</html>