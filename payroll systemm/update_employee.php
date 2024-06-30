<?php
    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "payroll_system_db");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from POST request
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact_number'];
    $password = $_POST['password'];
    $leave_id = $_POST['leave_id'];
    $email_address = $_POST['email_address'];
    $bank_name = $_POST['bank_name']; 
    $bank_account = $_POST['bank_account'];
    
    // Add other fields similarly

    // Prepare SQL statement to update record
    $sql = "UPDATE employee_accounts SET 
                first_name = '$first_name',
                gender = '$gender',
                contact_number = '$contact',
                password = '$password',
                leave_id = '$leave_id',
                email_address = '$email_address',
                bank_name = '$bank_name',
                bank_account = '$bank_account'
                -- Update other fields similarly
            WHERE employee_id = $employee_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: neww_emp.php?edit_success=true");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>