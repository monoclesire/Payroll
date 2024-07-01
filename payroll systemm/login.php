<?php
session_start();
include("database.php");

if(isset($_POST['login_btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is an employee 
    $login_query = mysqli_query($connect, "SELECT employee_id,password
    FROM employee_accounts 
    WHERE employee_id = '$username' AND password = '$password'");
    
    if(mysqli_num_rows($login_query) > 0){
        $employee_datas = mysqli_fetch_array($login_query);

        $_SESSION["employee_id"] = $employee_datas["employee_id"];

        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    disableLoader(); // Disable loader first
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: 'Welcome back!',
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
    else{
        // Check if the user is an admin
        $admin_query = mysqli_query($connect, "SELECT * FROM admin_account WHERE username = '$username' AND password = '$password'");
        
        if(mysqli_num_rows($admin_query) > 0){
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        disableLoader(); // Disable loader first
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful',
                            text: 'Welcome back!',
                            customClass: {
                                popup: 'swal-custom'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'payroll_section.php';
                            }
                        });
                    });
                  </script>";
        }
        else{
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        disableLoader(); // Disable loader first
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: 'Employee ID and password do not match.',
                            customClass: {
                                popup: 'swal-custom'
                            }
                        });
                    });
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <style>
        #loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('loader.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .8;
        }

        /* Custom CSS for SweetAlert2 */
        .swal-custom {
            width: 300px; /* Adjust the width as needed */
        }
    </style>
</head>
<body onload="fadeOutLoader()">
    <div id="loader"></div>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="card p-4 shadow">
                <div class="text-center mb-4">
                    <img src="pics\logo.png" class="signup-img" alt="Logo">
                </div>
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Log In</h2>
                    <form method="POST" class="form">
                        <div class="form-group position-relative mb-3">
                            <input type="text" name="username" class="form-control" placeholder=" " required>
                            <label class="form-label">Employee ID</label>
                        </div>
                        <div class="form-group position-relative mb-3">
                            <input type="password" name="password" class="form-control" placeholder=" " required>
                            <label class="form-label">Password</label>
                        </div>
                        <button type="submit" name="login_btn" class="btn btn-primary w-100">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
