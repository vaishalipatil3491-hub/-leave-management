<?php
session_start();
include '../config/db.php';
$uid = $_SESSION['user']['id'];

$data = mysqli_query($conn,"SELECT * FROM leaves WHERE user_id='$uid'");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
<title>Leave History</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table class="table table-bordered w-75 mx-auto mt-5 bg-white">
<tr>
<th>Type</th><th>From</th><th>To</th><th>Status</th>
</tr>
<?php while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $row['leave_type'] ?></td>
<td><?= $row['from_date'] ?></td>
<td><?= $row['to_date'] ?></td>
<td><?= $row['status'] ?></td>
</tr>
<?php } ?>
</table>
<a href="dashboard.php" class="btn btn-secondary d-block w-25 mx-auto">Back</a>
</body>
</html>
