<?php
  session_start();
  include('includes/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>VMS | Task</title>
	
<!--jquery files-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!--Bootstrap files-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--External file-->
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<center><h3>Your tasks</h3></center><br>
	<table class="table" style="background-color: whitesmoke;width: 75vw;">
		<tr>
		<th>S.No</th>
 		<th>Task ID</th>
 		<th>Description</th>
 		<th>Start Date</th>
 		<th>End Date</th>
 		<th>Status</th>
 		<th>Action</th>
 	</tr>
 	<?php
 	$query = "select *from tasks where uid = $_SESSION[uid]";
 	$sno = 1;
 	$query_run= mysqli_query($connection,$query);
 	while ($row = mysqli_fetch_assoc($query_run)) {
 		?>
 		<tr>

    <td><?php echo $sno; ?></td>
 		<td><?php echo $row['tid']; ?></td>
 		<td><?php echo $row['description']; ?></td>
 		<td><?php echo $row['start_date'] ?></td>
 		<td><?php echo $row['end_date']; ?></td>
 		<td><?php echo $row['status']; ?></td>]
 		<td><a href="update_status.php?id=<?php echo $row['tid'];?>">Update</a></td>		
 		</tr>
 		<?php
 			$sno= $sno + 1;

 	}
 ?> 
</table>
</body>
</html>