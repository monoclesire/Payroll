<?php 
include('database.php');
session_start();

$employee_id = $_SESSION["employee_id"];

$infos_query = mysqli_query($connect,"SELECT *
FROM employee_accounts
LEFT JOIN employee_positions
ON employee_accounts.Position_number = employee_positions.Position_number
LEFT JOIN employee_leaves 
ON employee_accounts.leave_id = employee_leaves.leave_id
LEFT JOIN employee_salary_datas
ON employee_accounts.employee_payslip_id = employee_salary_datas.employee_payslip_id
WHERE employee_id = '$employee_id'
");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $employee_id = $_SESSION['employee_id']; // Assuming employee_id is stored in session

    // Fetch current password from database
    $query = "SELECT password FROM employee_accounts WHERE employee_id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $employee_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $stored_password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Validate current password
    if (password_verify($current_password, $stored_password)) {
        // Check if new password matches confirm password
        if ($new_password == $confirm_password) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password in the database
            $update_query = "UPDATE employee_accounts SET password = ? WHERE employee_id = ?";
            $update_stmt = mysqli_prepare($connect, $update_query);
            mysqli_stmt_bind_param($update_stmt, "ss", $hashed_password, $employee_id);
            mysqli_stmt_execute($update_stmt);
            mysqli_stmt_close($update_stmt);

            // Password changed successfully
            $_SESSION['password_change_success'] = true;
        } else {
            // Error: New password and confirm password do not match
            $_SESSION['password_change_error'] = "New password and confirm password do not match.";
        }
    } else {
        // Error: Incorrect current password
        $_SESSION['password_change_error'] = "Incorrect current password.";
    }

    // Redirect to profile page or wherever appropriate
    header("Location: profile.php");
    exit();
}
if($infos_query){
    $infos = mysqli_fetch_array($infos_query);
    
    $_SESSION["first_name"] = $infos["first_name"];
    $_SESSION["middle_name"] = $infos["middle_name"];
    $_SESSION["surname"] = $infos["surname"];
    $_SESSION["birth_date"] = $infos["birth_date"];
    $_SESSION["email_address"] = $infos["email_address"];
    $_SESSION["contact_number"] = $infos["contact_number"];
    $_SESSION["Address"] = $infos["Address"];
    $_SESSION["employee_id"] = $infos["employee_id"];
    $_SESSION["position"] = $infos["Position"];
    $_SESSION["Daily_rate"] = $infos["Daily_rate"];
    $_SESSION["bank_name"] = $infos["bank_name"];
    $_SESSION["bank_account"] = $infos["bank_account"];
}

include('database.php'); // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $employee_id = $_SESSION['employee_id']; // Assuming employee_id is stored in session

    // Fetch current password from database
    $query = "SELECT password FROM employee_accounts WHERE employee_id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $employee_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $stored_password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Validate current password
    if (password_verify($current_password, $stored_password)) {
        // Check if new password matches confirm password
        if ($new_password == $confirm_password) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password in the database
            $update_query = "UPDATE employee_accounts SET password = ? WHERE employee_id = ?";
            $update_stmt = mysqli_prepare($connect, $update_query);
            mysqli_stmt_bind_param($update_stmt, "ss", $hashed_password, $employee_id);
            mysqli_stmt_execute($update_stmt);
            mysqli_stmt_close($update_stmt);

            // Password changed successfully
            $_SESSION['password_change_success'] = true;
        } else {
            // Error: New password and confirm password do not match
            $_SESSION['password_change_error'] = "New password and confirm password do not match.";
        }
    } else {
        // Error: Incorrect current password
        $_SESSION['password_change_error'] = "Incorrect current password.";
    }

    // Redirect to profile page or wherever appropriate
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="emp view prof.css">
    <title>Profile</title>
</head>
<body>
    <nav class="col-sm-2 sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">&nbsp;Comp Name</span>
                    <span class="profession">ADMIN</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link space"></li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Employees</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-calendar icon'></i>
                            <span class="text nav-text">Leave</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-receipt icon'></i>
                            <span class="text nav-text">Payroll</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-folder-open icon'></i>
                            <span class="text nav-text">Reports</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">    
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
        
    <sec>
        <div class="row profile">
            <div class="col-sm-1 label">
                <p style="margin-top: 16px;">Profile</p>
            </div>
            <div class="col-sm-10 d-flex justify-content-end align-items-center label-small">
                <p style="margin-top: 16px;">Home / View Profile</p>
            </div>
        </div>        

        <div class="row personal-details">
            <div class="col-sm-1 profile-pic"><img src="pics\sample.jpg" alt="Employee Image" class="profile-image"></div>
            <div class="col-sm-8">
                <div class="employee-info">
                <h3><?php echo $_SESSION["first_name"] . " " . $_SESSION["middle_name"] . " " . $_SESSION["surname"]; ?></h3>
                <p><?php echo $_SESSION["position"]; ?></p>
                </div>
        </div>        
           <div class="col-sm-3">
           <form action="upload_profile_pic.php" method="POST" enctype="multipart/form-data">
               <label for="profile-pic-upload" class="custom-file-upload">
                   <i class='bx bxs-cloud-upload'></i> Choose Files
               </label>
               <input type="file" id="profile-pic-upload" name="profile_pic" accept=".jpg, .jpeg, .png" style="display: none;">
           </form>
       </div>
       
        <div class="row">
            <div class="col-sm-12 new-containers">
                <div class="col-sm-9 left-container">
                    <table style="border-color: black;">
                        <tr>
                            <thead>
                                <th colspan="2">Personal Details</th>
                                <th colspan="2">Work Information</th>
                            </thead>
                        </tr>
                        <tr>
                            <td>First Name:</td>
                            <td><?php echo $infos["first_name"] ?></td>
                            <td>Employee ID:</td>
                            <td><?php echo $infos["employee_id"] ?></td>
                        </tr>
                        <tr>
                            <td>Middle Name:</td>
                            <td><?php echo $infos["middle_name"] ?></td>
                            <td>Position:</td>
                            <td><?php echo $infos["Position"] ?></td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td><?php echo $infos["surname"] ?></td>
                            <td>Daily Rate:</td>
                            <td><?php echo $infos["Daily_rate"] ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $infos["gender"] ?></td>
                            <td>Basic Pay:</td>
                            <td><?php echo $infos["Daily_rate"] * 15 ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth:</td>
                            <td><?php echo $infos["birth_date"]?></td>
                            <th colspan="2">Work Information</th>
                        </tr>
                        <tr>
                            <td>Civil Status:</td>
                            <td><?php echo $infos["civil_status"]?></td>
                            <td>Bank Name:</td>
                            <td><?php echo $infos["bank_name"] ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $infos["email_address"] ?></td>
                            <td>Bank Account Number:</td>
                            <td><?php echo $infos["bank_account"] ?></td>
                        </tr>
                        <tr>
                            <td>Mobile Number:</td>
                            <td><?php echo $infos["contact_number"] ?></td>
                            <th colspan="2">Benefits Information</th>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $infos["Address"] ?></td>
                            <td>PhilHealth Number:</td>
                            <td>00000000000000</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>SSS Number:</td>
                            <td>00000000000000</td>
                        </tr>
                        <tr>
                            <td rowspan="4"><a href="emp edit prof.php"><button name="edit" class="edit-profile-button">Edit</button></a></td>
                            <td></td>
                            <td>Pag-IBIG Number:</td>
                            <td>00000000000000</td>
                        </tr>
                    </table>
                </div>

                <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-3 right-container">
            <div class="important">
                <span class="title" style="color: #325E89; font-weight: 1000;">Change Password</span>
            
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" placeholder="Enter Current Password" class="form-control" onkeyup="validateCurrentPassword()">
                        <div id="current_password_alert" class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" id="new_password" placeholder="Enter New Password" class="form-control" onkeyup="validateNewPassword()">
                        <div id="new_password_alert" class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" id="confirm_password" placeholder="Confirm New Password" class="form-control" onkeyup="validateConfirmPassword()">
                        <div id="confirm_password_alert" class="invalid-feedback"></div>
                    </div>
                    <button class="change-password-button btn btn-primary btn-block" onclick="validateAndChangePassword()">Change Password</button>
                </div>  

               
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery (for modal) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>
    function validateCurrentPassword() {
        var currentPassword = document.getElementById("current_password").value;
        var savedPassword = "storedPassword123"; // Replace with actual saved password from backend
        var currentPasswordAlert = document.getElementById("current_password_alert");

        if (currentPassword === savedPassword) {
            currentPasswordAlert.textContent = "";
            currentPasswordAlert.classList.remove("invalid-feedback");
            document.getElementById("current_password").classList.remove("is-invalid");
        } else {
            currentPasswordAlert.textContent = "Current Password does not match.";
            currentPasswordAlert.classList.add("invalid-feedback");
            document.getElementById("current_password").classList.add("is-invalid");
        }
    }

    function validateNewPassword() {
        var newPassword = document.getElementById("new_password").value;
        var new_password_alert = document.getElementById("new_password_alert");

  
    }

    function validateConfirmPassword() {
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        var confirm_password_alert = document.getElementById("confirm_password_alert");

        if (newPassword === confirmPassword) {
            confirm_password_alert.textContent = "";
            confirm_password_alert.classList.remove("invalid-feedback");
            document.getElementById("confirm_password").classList.remove("is-invalid");
        } else {
            confirm_password_alert.textContent = "Passwords do not match.";
            confirm_password_alert.classList.add("invalid-feedback");
            document.getElementById("confirm_password").classList.add("is-invalid");
        }
    }

    function validateAndChangePassword() {
        validateCurrentPassword();
        validateNewPassword();
        validateConfirmPassword();

        var currentPassword = document.getElementById("current_password").value;
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        // Perform client-side validation
        if (currentPassword === "") {
            alert("Please enter your current password.");
            return;
        }

        if (newPassword === "") {
            alert("Please enter a new password.");
            return;
        }

        if (confirmPassword === "") {
            alert("Please confirm your new password.");
            return;
        }

        if (newPassword !== confirmPassword) {
            alert("New Passwords do not match. Please re-enter.");
            return;
        }

        // Password length validation (you can adjust according to your requirements)
        if (newPassword.length < 8 || newPassword.length > 20) {
            alert("New Password must be between 8 to 20 characters.");
            return;
        }

        // Simulated server-side validation (replace with actual AJAX/fetch request)
        var savedPassword = "storedPassword123"; // Replace with actual saved password from backend
        if (currentPassword !== savedPassword) {
            alert("Current Password does not match.");
            return;
        }

        // If all validations pass, proceed to change password (simulated alert for demonstration)
        alert("Password change request sent."); // Replace with actual AJAX call to change password
    }
</script>

        
        <!-- Modal -->
        <div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Changed Successfully</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your password has been changed. Please use your new password to log in again.
                </div>
                <div class="modal-footer">
                <a href="login.html"><button type="button" class="btn btn-primary">Login Again</button></a>
                </div>
            </div>
            </div>
        </div>

        <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEmployeeModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/add_employee">
                            <div class="row">
                                <div class="sep">Personal Details</div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" class="form-control"required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="mname" class="form-label">Middle  Name</label>
                                        <input type="text" class="form-control"required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" required>
                                            <option selected disabled>Choose gender</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="status" class="form-label">Civil Status</label>
                                        <select class="form-select" required>
                                            <option disabled selected>Select civil status</option>
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Widow/er</option>
                                            <option>Legally Separated</option>
                                            <option>Living In</option>
                                            <option>Separated</option>
                                            <option>Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control"required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="number" class="form-label">Mobile Number</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="Address" class="form-label">Address</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="bankAccount" class="form-label">Bank Account</label>
                                        <input type="text" class="form-control" id="bankAccount" name="bankAccount" required>
                                    </div>
                                </div>
                            </div>


                                
                            <div class="row">
                                <div class="sep">Work Information</div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="empID" class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="position" class="form-label">Position</label>
                                        <select class="form-select" disabled>
                                            <option value="Manager" selected disabled>Manager</option>
                                            <option value="Service Crew">Service Crew</option>
                                            <option value="Crew Manager">Crew Manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="basicpay" class="form-label">Basic Pay</label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="sep">Bank Information</div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="bankname" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="bankacct" class="form-label">Bank Account</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="ewallet" class="form-label">E-wallet</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="sep">Benefits Information</div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="PhilHealth" class="form-label">PhilHealth</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="SSS" class="form-label">SSS</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-1">
                                        <label for="Pag-IBIG" class="form-label">Pag-IBIG</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <script src="emp view prof.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
