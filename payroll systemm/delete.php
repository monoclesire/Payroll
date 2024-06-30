<head>
    <link rel="stylesheet" href="alertbox.css">
</head>
<?php
// Check if employee_id parameter is passed
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];

    // Perform database connection
    $conn = mysqli_connect("localhost", "root", "", "payroll_system_db");

    // SQL to delete record
    $sql = "DELETE FROM employee_accounts WHERE employee_id = $employee_id";

    if (mysqli_query($conn, $sql)) {
        // Delete successful
        header("Location: neww_emp.php?delete_success=true");
        exit();
    } else {
        // Delete failed
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Employee ID not specified";
}
?>