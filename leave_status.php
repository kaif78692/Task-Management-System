<?php
session_start();
include('includes/connection.php');
?>
<html>
<body>
   <center><h3>Your leave application</h3></center><br>
   <table class="table" style="background-color: whitesmoke; width: 75vw;">
      <tr>
         <th>S.No</th>
        
        <th>Subject</th>
        <th style="width: 40%;">Message</th>
        <th>Status</th>
        </tr>
        </tr>
    <?php
    $sno = 1;
    $query = "SELECT * FROM leaves where uid =$_SESSION[uid]";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <tr> 
           <td><?php echo $sno; ?></td>
         <td><?php echo $row['subject']; ?></td>
         <td><?php echo $row['message']; ?></td>
         <td><?php echo $row['status']; ?></td>
     </tr>
     <?php
     $sno = $sno +1;
 }
 ?>
    </table>
  </body>
  </html>