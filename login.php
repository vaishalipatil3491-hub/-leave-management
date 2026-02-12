<?php
session_start();
include 'config/db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($q)==1){
        $_SESSION['user'] = mysqli_fetch_assoc($q);
        if($_SESSION['user']['role']=='admin')
            header("Location: admin/dashboard.php");
        else
            header("Location: employee/dashboard.php");
    } else {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" class="card p-4 w-25 mx-auto mt-5">
<h3>Login</h3>
<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
<button name="login" class="btn btn-primary w-100">Login</button>
</form>
</body>
</html>
