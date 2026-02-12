<?php
session_start();
if(!isset($_SESSION['user'])) header("Location: ../login.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Employee Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h2>Welcome, <?= $_SESSION['user']['name'] ?></h2>
<a href="apply-leave.php" class="btn btn-success">Apply Leave</a>
<a href="leave-history.php" class="btn btn-info">Leave History</a>
<a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
