<?php
// Database connection details
$conn = mysqli_connect("localhost", "root", "", "payroll_system_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from POST request
$firstName = $_POST['first_name'];
$employeeID = $_POST['employee_ID'];
$contactNumber = $_POST['contact_Number'];
$position = $_POST['position'];
$email = $_POST['email_address'];
$password = $_POST['password'];
$basicPay = $_POST['basic_Pay'];
$salary = $_POST['salary'];
$bankName = $_POST['bank_Name'];
$bankAccount = $_POST['bank_account'];

$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

$date = date('Y-m');
list($year, $month,) = explode('-', $date);
// Convert month number to month name
$created_month = $months[$month - 1]; // Note: month numbers are 1-12, so subtract 1 from the month number

// SQL query to insert data into database
$sql = "INSERT INTO employee_accounts (first_name, employee_id, contact_number, position, email_address, password,  bank_name, bank_account,created_year,created_month)
        VALUES ('$firstName', '$employeeID', '$contactNumber', '$position', '$email', '$password', '$bankName', '$bankAccount','$year','$month')";

if (mysqli_query($conn, $sql)) {
    // Redirect with success message
    header("Location: neww_emp.php?add_success=true");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
