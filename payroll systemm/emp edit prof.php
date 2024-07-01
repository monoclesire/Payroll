<?php 
include("database.php");
session_start();

if(isset($_POST['save'])){
    $employee_id = $_POST['employee_id'];
    $firstname = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birthday'];
    $email_add = $_POST['email_add'];
    $mobile_num = $_POST['mobile_num'];
    $address = $_POST['address'];
    $bank_name = $_POST['bank_name'];
    $bank_acc = $_POST['bank_acc'];
    $position = $_POST['position'];
    $civil_stats = $_POST['civil_stats'];
    
    $employee_update_datas = mysqli_query($connect,"UPDATE employee_accounts,employee_positions SET first_name = '$firstname',middle_name = '$middle_name',
    surname = '$surname',gender = '$gender',contact_number =  '$mobile_num',Address = '$address',email_address = '$email_add',
    bank_account = '$bank_name',bank_name = '$bank_acc',Position ='$position', birth_date = '$birth_date',civil_status = '$civil_stats'
    WHERE employee_id = '$employee_id'");

    if($employee_update_datas){
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    disableLoader(); // Disable loader first
                    Swal.fire({
                        icon: 'success',
                        title: 'Information Updated Successful',
                        customClass: {
                            popup: 'swal-custom'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'emp view prof.php';
                        }
                    });
                });
              </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="emp edit prof.css">
    <title>Profile</title>
    <style>
        .swal-custom {
            width: 300px; /* Adjust the width as needed */
        }
    </style>
</head>
<body onload="fadeOutLoader()">
<div id="loader"></div>
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
        
    <form method="POST">
        <div class="row profile">
            <div class="col-sm-1 label">
                <p style="margin-top: 16px;">Profile</p>
            </div>
            <div class="col-sm-10 d-flex justify-content-end align-items-center label-small">
                <p style="margin-top: 16px;">Home / Edit Profile</p>
            </div>
        </div>        

        <div class="row personal-details">
            <span class="title">Personal Details</span>
            
            <div class="col-sm-4">
                <div class="input-field">
                    <label>First Name</label><br>
                    <input type="text" name="fname" placeholder="Enter your first name" value="<?php echo $_SESSION["first_name"] ?>" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Middle Name</label><br>
                    <input type="text" name="mname" placeholder="Enter your first name" value="<?php echo $_SESSION["middle_name"] ?>" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Last Name</label><br>
                    <input type="text" name="surname" placeholder="Enter your first name" value="<?php echo $_SESSION["surname"] ?>" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Gender</label><br>
                    <select required name="gender">
                        <option disabled selected>Select gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Date of Birth</label><br>
                    <input type="date" name="birthday" placeholder="Enter your birth date" value="<?php echo $_SESSION["birth_date"] ?>" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Civil Status</label><br>
                    <select required name="civil_stats">
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

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Email</label><br>
                    <input type="email" name="email_add" placeholder="Enter your email" value="<?php echo $_SESSION["email_address"] ?>">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Mobile Number</label><br>
                    <input type="number" name="mobile_num" placeholder="Enter your mobile number" value="<?php echo $_SESSION["contact_number"] ?>">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Address</label><br>
                    <input type="text" name="address" placeholder="Enter your address" value="<?php echo $_SESSION["Address"] ?>">
                </div>
            </div>


            <span class="title">Work Information</span>
            
            <div class="col-sm-3">
                <div class="input-field">
                    <label>Employee ID</label><br>
                    <input type="text" name="employee_id" value="<?php echo $_SESSION["employee_id"] ?>"  readonly>
                </div>
            </div>

            <div class="col-sm-3">
            <div class="input-field">
                    <label>Position</label><br>
                    <input type="text" name="position" value="<?php echo $_SESSION["position"] ?>" readonly>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="input-field">
                    <label>Daily Rate</label><br>
                    <input type="text" value="<?php echo $_SESSION["Daily_rate"] ?>" readonly>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="input-field">
                    <label>Salary</label><br>
                    <input type="text" value="<?php echo $_SESSION["Daily_rate"] * 15 ?>"  readonly>
                </div>
            </div>


            <span class="title">Bank Information</span>
            
            <div class="col-sm-4">
                <div class="input-field">
                    <label>Bank Name</label><br>
                    <input type="text" name="bank_name" value="<?php echo $_SESSION["bank_name"] ?>"  placeholder="Enter bank name" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Bank Account Number</label><br>
                    <input type="text" name="bank_acc" value="<?php echo $_SESSION["bank_account"] ?>" placeholder="Enter bank account number" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>E-Wallet</label><br>
                    <input type="text" placeholder="Enter e-wallet number">
                </div>
            </div>

            
            <span class="title">Benefits Information</span>
            
            <div class="col-sm-4">
                <div class="input-field">
                    <label>PhilHealth</label><br>
                    <input type="text" placeholder="Enter PhilHealth Identification Number" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>SSS</label><br>
                    <input type="text" placeholder="Enter SSS Number" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-field">
                    <label>Pag-IBIG</label><br>
                    <input type="text" placeholder="Enter Pag-IBIG Membership Identification Number" required>
                </div>
            </div>

            <div class="col-sm-4">
                <div><button type="submit" name="save" id="save" class="save-profile-button">Save</button></div>
            </div>
        </div>
    </form>

    <script src="emp edit prof.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function fadeOutLoader() {
            var loader = document.getElementById('loader');
            loader.style.transition = 'opacity 1s ease-out';
            loader.style.opacity = 0;
            setTimeout(function() {
                loader.style.display = 'none';
            }, 500);
        }

        function disableLoader() {
            var loader = document.getElementById('loader');
            loader.style.display = 'none';
        }
    </script>
</body>
</html>