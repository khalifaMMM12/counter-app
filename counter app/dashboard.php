<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: index.php");
    exit();
}

// Include database configuration
include("db_config.php");

// Retrieve saved counts from the database
$selectQuery = "SELECT * FROM saved_counts";
$result = mysqli_query($con, $selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">

        
        <a class="btn btn-danger logout-btn" href="logout.php"><span class="fa fa-sign-out fa-2x">Logout</span></a>
        
        <h2 class="dashboard-header">Admin Dashboard</h2>


        <?php if ($result): ?>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Count</th>
                            <th>Count Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['count'] ?></td>
                                <td><?= $row['count_name'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="error-message">Error retrieving saved counts: <?= mysqli_error($con) ?></p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eQF0frB1aRmHP7dd6s3FmNWeBL1JFOwNGykzfKbFY+DTYnAdbs2byK0EH5S/Eh00" crossorigin="anonymous"></script>
</body>
</html>
