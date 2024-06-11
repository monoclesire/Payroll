<?php
include('database.php');
$pending_sql = "SELECT * FROM employee_pending_leaves";
$pending_query = mysqli_query($connect,$pending_sql);

$approved_sql = "SELECT * FROM employee_approved_leaves";
$approved_query = mysqli_query($connect,$approved_sql);

$declined_sql = "SELECT * FROM employee_declined_leaves";
$declined_query = mysqli_query($connect,$declined_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="leave_section.css">
    <title>Leave Section</title>
</head>
<body>
    <div class="row">
        <nav class="col-sm-2 sidebar">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="logo.png" alt="">
                    </span>
                    <div class="text logo-text">
                        <span class="name">&nbsp;Comp Name</span>
                        <span class="name">ADMIN</span>
                    </div>
                </div>
                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class=""></li>
                        <li class="">
                            <a href="#">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="#">
                                <i class='bx bx-user icon'></i>
                                <span class="text nav-text">Employees</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="#">
                                <i class='bx bx-calendar icon'></i>
                                <span class="text nav-text">Leave</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="#">
                                <i class='bx bx-receipt icon'></i>
                                <span class="text nav-text">Payroll</span>
                            </a>
                        </li>

                        <li class="">
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
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
        <div class="col-sm-10 home">
            <div class="row">
                <div class="col-sm-12 profile text-center">
                    <div class="bar">
                    <p>Leave</p>
                    <p style="font-size: 13px; font-weight: 400; margin-top: 12px; margin-left: 3%;
                    color: #2C4972;">Home / Leave Section</p>
                    </div>
                </div>
            </div>
            <div class="row table-button">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio1" value="table1" checked>
                    <label class="form-check-label" for="tableRadio1">Pending</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio2" value="table2">
                    <label class="form-check-label" for="tableRadio2">Approved</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio3" value="table3">
                    <label class="form-check-label" for="tableRadio3">Declined</label>
                </div>
            </div>
            <div class="row table">
                <div class="col-sm-12 label">
                    <div>
                        <div id="table1" class="table-container">
                            <table class="tablee text-center">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Leave Type</th>
                                        <th>Applied On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($pending = mysqli_fetch_assoc($pending_query)){
                                            echo "
                                                <tr>
                                                    <td>". $pending["pending_leave_id"] ."</td>
                                                    <td>". $pending["Name"] ."</td>
                                                    <td>". $pending["Position"] ."</td>
                                                    <td>". $pending["Leave_type"] ."</td>
                                                    <td>". $pending["applied_date"] ."</td>
                                                    <td style='width: 30%'>
                                                        <form method='POST'>
                                                            <button type='submit' name='view_details' value='". $pending["pending_leave_id"] ."' 
                                                            style='width:96px; font-family: Poppins, sans-serif;
                                                            font-size: 15px; color: black; background-color: white;
                                                            '>View Details</button>
                                                            <button type='submit' name='approve' value='". $pending["pending_leave_id"] ."'
                                                            style='width:96px; font-family: Poppins, sans-serif;
                                                            font-size: 15px; color: white; background-color: green;
                                                            '>Approve</button>
                                                            <button type='submit' name='decline' value='". $pending["pending_leave_id"] ."'
                                                            style='width:96px; font-family: Poppins, sans-serif;
                                                            font-size: 15px; color: white; background-color: red;
                                                            '>Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div id="table2" class="table-container">
                            <table class="tablee text-center">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Leave Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <td>Content 4</td>
                                        <td>Content 5</td>
                                        <td>Content 6</td>
                                        <td>Content 6</td>
                                        <td style="width: 30%">
                                            <form method='POST'>
                                                <button type='submit' name='view_details' value='". $infos["employee_id"] ."' 
                                                style='width:96px; font-family: Poppins, sans-serif;
                                                font-size: 15px; color: black; background-color: white;
                                                '>View Details</button>
                                                <button type='submit' name='approve' value='". $infos["employee_id"] ."'
                                                style='width:96px; font-family: Poppins, sans-serif;
                                                font-size: 15px; color: white; background-color: green;
                                                '>Approve</button>
                                                <button type='submit' name='decline' value='". $infos["employee_id"] ."'
                                                style='width:96px; font-family: Poppins, sans-serif;
                                                font-size: 15px; color: white; background-color: red;
                                                '>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="table3" class="table-container">
                            <table class="tablee text-center">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Leave Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <td>Content 4</td>
                                        <td>Content 5</td>
                                        <td>Content 6</td>
                                        <td>Content 6</td>
                                        <td style="width: 30%">
                                            <form method='POST'>
                                                <button type='submit' name='view_details' value='". $infos["employee_id"] ."' 
                                                style='width:96px; font-family: Poppins, sans-serif;
                                                font-size: 15px; color: black; background-color: white;
                                                '>View Details</button>
                                                <button type='submit' name='approve' value='". $infos["employee_id"] ."'
                                                style='width:96px; font-family: Poppins, sans-serif;
                                                font-size: 15px; color: white; background-color: green;
                                                '>Approve</button>
                                                <button type='submit' name='decline' value='". $infos["employee_id"] ."'
                                                style='width:96px; font-family: Poppins, sans-serif;
                                                font-size: 15px; color: white; background-color: red;
                                                '>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['approve'])){
                $approve_sqll = "INSERT INTO employee_approved_leaves VALUES()";
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const radios = document.querySelectorAll('input[name="tableRadios"]');
        const tableContainers = document.querySelectorAll('.table-container');
    
        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                tableContainers.forEach(container => {
                    container.classList.remove('active');
                });
                const selectedTable = document.getElementById(this.value);
                if (selectedTable) {
                    selectedTable.classList.add('active');
                }
            });
        });

        // Trigger change event for the checked radio button
        const checkedRadio = document.querySelector('input[name="tableRadios"]:checked');
        if (checkedRadio) {
            checkedRadio.dispatchEvent(new Event('change'));
        }
    });
</script>
</body>
</html>
