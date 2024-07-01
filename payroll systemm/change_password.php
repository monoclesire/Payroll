<?php
session_start(); // Use sessions if you want to keep track of the logged-in user

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_system_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form inputs
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
$employee_id = $_SESSION['employee_id']; // Assuming you store employee ID in session

if ($new_password !== $confirm_password) {
    die("New password and confirmation password do not match.");
}

// Fetch current password from database
$sql = "SELECT password FROM employee_accounts WHERE employee_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if ($row['password'] === $current_password) {
        // Update password in database
        $update_sql = "UPDATE employee_accounts SET password = ? WHERE employee_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $new_password, $employee_id);
        if ($update_stmt->execute()) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Current password is incorrect.";
    }
} else {
    echo "Employee not found.";
}

$conn->close();
?>
