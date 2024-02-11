<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database configuration
    include("db_config.php");

    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check admin credentials
    $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check if the query returned any rows
        if (mysqli_num_rows($result) > 0) {
            // Admin is authenticated, set session variable
            $_SESSION["admin"] = true;

            // Redirect to the dashboard or another admin page
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Error executing query: " . mysqli_error($con);
    }
}

// Include the HTML code for the login form
include("login_form.php");
?>
