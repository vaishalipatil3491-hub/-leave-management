<?php
session_start();
if($_SESSION['user']['role']!='admin') header("Location: ../login.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container mt-4">
<h2>Admin Dashboard</h2>
<a href="manage-leaves.php" class="btn btn-primary">Manage Leaves</a>
<a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
