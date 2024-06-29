<?php
  session_start();
  if(isset($_POST['email'])){
  include('includes/connection.php');
    if(isset($_POST['submit_leave'])){
    	$query = "insert into leaves values(null, $_SESSION[uid], '$_POST[subject]',  '$_POST[message]', 'No Action')";
    	$query_run = mysqli_query($connection,$query);
    	if($query_run){
    		echo "<script type='text/javascript'>
        alert('Form submitted successfully...');
        window.location.href = 'admin_dashboard.php';
       </script>
       ";
       }
   	  	else{
   	  		echo "<script type='text/javascript'>
        alert('Error...plz try again.');
        window.location.href = 'user_dashboard.php';
       </script>
       ";
   	  	}  
   	  	} 
   	  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User dashboard</title>
	<head>
    <!--jquery files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--Bootstrap files-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--External file-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">

            $(document).ready(function(){
            $("#manage_task").click(function(){
            $("#right_sidebar").load("task.php");
            });
        });
        $(document).ready(function(){
            $("#apply_leave").click(function(){
                $("#right_sidebar").load("leaveForm.php");
            });
        });
      $(document).ready(function(){
            $("#leave_status").click(function(){
                $("#right_sidebar").load("leave_status.php");
            });
        });
        
        
   
    </script>
    </head>
    <body>
	<!--header code start here-->
	<div class="row" id="header">
	<div class="col-md-12">
	<div class="col-md-4" style="display: inline-block;">
	<h3>Vendor Management System</h3>
	</div>
	<div class="col-md-6" style="display: inline-block;text-align: right;">
	<b>Email: </b> <?php echo $_SESSION['email']; ?>
	<span style="margin-left: 30px;"><b>Name: </b><?php echo $_SESSION['name'];?></span>
	</div>
	</div>
	</div>
</body>
<!--header codes end here-->
	<div class="row">
	<div class="col-md-2" id="left_sidebar">
	<table class="table">
	    <tr>
	<td style="text-align: center;">
	<a href="user_dashboard.php" type="button" class="link">Dashboard</a>
	    </td>
	    </tr>
	<tr>
	<td style="text-align: center;">
	<a type="button" class="link" id="manage_task">Update task </a>
	     </td>
	     </tr>
	     <tr>
	<td style="text-align: center;">
	<a  type="button" class="link" id="apply_leave">Apply leave </a>
	     </td>
	     </tr>
	     <tr>
	<td style="text-align: center;">
	<a type="button"class="link" id="leave_status">Leave status</a>
	     </td>
	     </tr>
	     <tr>
	<td style="text-align: center;">
	<a href="logout.php" type="button" id="logout_link">Logout</a>
	</td>
	</tr>
	</table>
	</div>
			<div class="col-md-10" id="right_sidebar">
			<h4>Instructions for Vendors</h4>
			<ul style="line-height: 3em;font-size: 1.2em;list-style-type: none;">
		    <li>1. All employees should mark their attendance daily.</li>
			<li>2. Everyone must complete the task assigned to them.</li>
			<li>3. Kindly maintain the decorum of the office.</li>
			<li>4. Keep office and your area neat and clean.</li>
			</ul>
		</div>
	</div>   
</body>
</html>