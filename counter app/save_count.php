<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Include database configuration
include("db_config.php");

// Get count and count name from the form submission
$count = $_POST["savedCount"];
$countName = $_POST["savedCountName"];

// Insert the data into the database
$insertQuery = "INSERT INTO saved_counts (count, count_name) VALUES ('$count', '$countName')";
$insertResult = mysqli_query($con, $insertQuery);

if ($insertResult) {
    // Send a success message back to the index page
    header("Location: index.php?message=Count saved successfully");
} else {
    // Send an error message back to the index page
    header("Location: index.php?message=Error saving count: " . mysqli_error($con));
}
?>
