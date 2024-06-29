<?php
include('includes/connection.php');

if (isset($_POST['edit_task'])) { // Changed to 'edit_task' to match the name attribute of the submit button

    // Sanitize input to prevent SQL injection
    $status = mysqli_real_escape_string($connection, $_POST['status']);
    $tid = (int)$_GET['id']; // Cast to integer for safety

    // Update query with prepared statement
    $query = "UPDATE tasks SET status = ? WHERE tid = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "si", $status, $tid);
    $query_run = mysqli_stmt_execute($stmt);

    if ($query_run) {
        echo "<script type='text/javascript'>
                alert('Status updated successfully...');
                window.location.href = 'user_dashboard.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error...please try again.');
                window.location.href = 'user_dashboard.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update status</title>
    <!-- jquery files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <!-- External file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- header code start here -->
<div class="row" id="header">
    <div class="col-md-12">
        <h3><i class="fa fa-solid fa-list" style="padding-right: 15px;"></i>Vendor Management System</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-4 m-auto" style="color: white;"><br>
        <h3 style="color: white;">Update the task</h3><br>
        <?php
        if (isset($_GET['id'])) {
            $tid = $_GET['id'];
            $query = "SELECT * FROM tasks WHERE tid = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $tid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['tid']; ?>"
                               required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option <?php if ($row['status'] == '-Select-') ; ?>>-Select-</option>
                            <option <?php if ($row['status'] == 'In Progress') ; ?>>In Progress</option>
                            <option <?php if ($row['status'] == 'Complete') ; ?>>Complete</option>
                        </select>

                    </div><br>
                    <input type="submit" class="btn btn-warning" name="edit_task" value="Update">
                </form>
                <?php
            } else {
                echo "Task not found.";
            }
            mysqli_stmt_close($stmt);
        }
        ?>
    </div>
</div>
</body>
</html>
