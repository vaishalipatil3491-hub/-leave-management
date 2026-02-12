<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit();
}

$uid = $_SESSION['user']['id'];

if(isset($_POST['apply'])){
    $type = $_POST['type'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $reason = $_POST['reason'];

    mysqli_query($conn,"INSERT INTO leaves(user_id,leave_type,from_date,to_date,reason)
    VALUES('$uid','$type','$from','$to','$reason')");

    echo "<script>alert('Leave Applied Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply Leave</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- YOUR CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">
    <h2 class="text-white text-center mt-4">Apply Leave</h2>

    <form method="post" class="card p-4 w-50 mx-auto mt-4">
        <label>Leave Type</label>
        <select name="type" class="form-control mb-2" required>
            <option value="Casual">Casual</option>
            <option value="Sick">Sick</option>
            <option value="Paid">Paid</option>
        </select>

        <label>From Date</label>
        <input type="date" name="from" class="form-control mb-2" required>

        <label>To Date</label>
        <input type="date" name="to" class="form-control mb-2" required>

        <label>Reason</label>
        <textarea name="reason" class="form-control mb-3" placeholder="Enter reason" required></textarea>

        <button name="apply" class="btn btn-success w-100">Submit Leave</button>
    </form>

    <div class="text-center mt-3">
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>

</body>
</html>
