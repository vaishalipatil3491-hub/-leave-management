<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

if(isset($_GET['approve'])){
    mysqli_query($conn,"UPDATE leaves SET status='Approved' WHERE id=".$_GET['approve']);
}
if(isset($_GET['reject'])){
    mysqli_query($conn,"UPDATE leaves SET status='Rejected' WHERE id=".$_GET['reject']);
}

$data = mysqli_query($conn,"SELECT l.*,u.name FROM leaves l JOIN users u ON l.user_id=u.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Leaves</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- YOUR CSS (IMPORTANT) -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">
    <h2 class="text-white text-center mt-4 mb-4">Manage Leave Requests</h2>

    <table class="table table-bordered bg-white shadow-lg">
        <tr class="table-dark text-center">
            <th>Name</th>
            <th>Type</th>
            <th>From</th>
            <th>To</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($data)){ ?>
        <tr class="text-center">
            <td><?= $row['name'] ?></td>
            <td><?= $row['leave_type'] ?></td>
            <td><?= $row['from_date'] ?></td>
            <td><?= $row['to_date'] ?></td>
            <td>
                <span class="badge 
                    <?= $row['status']=='Approved' ? 'bg-success' : 
                        ($row['status']=='Rejected' ? 'bg-danger' : 'bg-warning') ?>">
                    <?= $row['status'] ?>
                </span>
            </td>
            <td>
                <a href="?approve=<?= $row['id'] ?>" class="btn btn-success btn-sm">Approve</a>
                <a href="?reject=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Reject</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <div class="text-center mt-3">
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>

</body>
</html>
