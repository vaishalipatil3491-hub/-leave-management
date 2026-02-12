<?php
include 'config/db.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check)>0){
        echo "<script>alert('Email already exists');</script>";
    } else {
        mysqli_query($conn,"INSERT INTO users(name,email,password) 
        VALUES('$name','$email','$password')");
        echo "<script>alert('Registration Successful');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" class="card p-4 w-25 mx-auto mt-5">
<h3>Employee Registration</h3>
<input type="text" name="name" class="form-control mb-2" placeholder="Full Name" required>
<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
<button name="register" class="btn btn-primary w-100">Register</button>
</form>
</body>
</html>
