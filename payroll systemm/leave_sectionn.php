<?php
include('database.php');
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
                <div class="form-check" style="width:117px; cursor: pointer;">
                    <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio1" value="table1" checked>
                    <label class="form-check-label" for="tableRadio1">Pending</label>
                </div>
                <div class="form-check" style="cursor: pointer;">
                    <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio2" value="table2">
                    <label class="form-check-label" for="tableRadio2">Approved</label>
                </div>
                <div class="form-check" style="width:117px;margin-left:-7.5%; cursor: pointer;">
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
                                    $pending_sql = "SELECT * FROM employee_pending_leaves WHERE status='pending'";
                                    $pending_query = mysqli_query($connect,$pending_sql);
                                
                                    while($pending = mysqli_fetch_assoc($pending_query)){
                                        echo "
                                            <tr>
                                                <td>". $pending["leave_id"] ."</td>
                                                <td>". $pending["Name"] ."</td>
                                                <td>". $pending["Position"] ."</td>
                                                <td>". $pending["Leave_type"] ."</td>
                                                <td>". $pending["applied_date"] ."</td>
                                                <td style='width: 30%'>
                                                    <form method='POST'>
                                                        <button type='submit' name='view_details' value='". $pending["leave_id"] ."' 
                                                        style='width:96px; font-family: Poppins, sans-serif;
                                                        font-size: 15px; color: black; background-color: white;
                                                        '>View Details</button>
                                                        <input type='hidden' name='approve_id' value='". $pending["leave_id"] ."'>
                                                        <button type='submit' name='approve' value='". $pending["leave_id"] ."'
                                                        style='width:96px; font-family: Poppins, sans-serif;
                                                        font-size: 15px; color: white; background-color: green;
                                                        '>Approve</button>
                                                        <input type='hidden' name='decline_id' value='". $pending["leave_id"] ."'>
                                                        <button type='submit' name='decline' value='". $pending["leave_id"] ."'
                                                        style='width:96px; font-family: Poppins, sans-serif;
                                                        font-size: 15px; color: white; background-color: red;
                                                        '>Decline</button>
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
                                    <?php
                                        $approved_sql = "SELECT * FROM employee_pending_leaves WHERE status='Approved'";
                                        $approved_query = mysqli_query($connect,$approved_sql);
                                        
                                        while($approved = mysqli_fetch_assoc($approved_query)){
                                            echo "
                                                <tr>
                                                    <td>". $approved["leave_id"] ."</td>
                                                    <td>". $approved["Name"] ."</td>
                                                    <td>". $approved["Position"] ."</td>
                                                    <td>". $approved["Leave_type"] ."</td>
                                                    <td>". $approved["applied_date"] ."</td>
                                                </tr>
                                        
                                            ";
                                        }
                                    ?>
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
                                    <?php
                                        $declined_sql = "SELECT * FROM employee_pending_leaves WHERE status='Declined'";
                                        $declined_query = mysqli_query($connect,$declined_sql);                                        
                                    
                                        while($declined = mysqli_fetch_assoc($declined_query)){
                                            echo "
                                                <tr>
                                                    <td>". $declined["leave_id"] ."</td>
                                                    <td>". $declined["Name"] ."</td>
                                                    <td>". $declined["Position"] ."</td>
                                                    <td>". $declined["Leave_type"] ."</td>
                                                    <td>". $declined["applied_date"] ."</td>
                                                </tr>
                                        
                                            ";
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['approve'])){
            $leave_id = $_POST['approve_id'];
            $approvesql = "UPDATE employee_pending_leaves SET status = 'Approved' WHERE leave_id ='$leave_id'";
            $approve_btn_qry = mysqli_query($connect,$approvesql);

            echo '<script>alert("Leave Approved!")</script>';
            echo '<script>window.location.href = "leave_sectionn.php"</script>';
        }
        else if(isset($_POST['decline'])){
            $leave_idd = $_POST['decline_id'];
            $declinedsql = "UPDATE employee_pending_leaves SET status = 'Declined' WHERE leave_id = '$leave_idd'";
            $decline_btn_qry = mysqli_query($connect,$declinedsql);

            echo '<script>alert("Leave Declined!")</script>';
            echo '<script>window.location.href = "leave_sectionn.php"</script>';
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
                    container.style.display = 'none'; // Hide all tables initially
                    });
                const selectedTable = document.getElementById(this.value);
                if (selectedTable) {
                    selectedTable.style.display = 'flex'; // Show the selected table
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