<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="new_employees.css">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <nav class="col-xs-2 sidebar">
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
        <section class="col-sm-10 home">
            <div class="text"><b>Employee List</b></div>
            <div class="responsive-div">
                <div class="search-bar">
                    <form action="/search" method="GET">
                        <input type="text" name="query" placeholder="Search for...">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <div class="add-emp">
                    <p><b>Employee()</b></p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">+ Add Employee</button>
                </div>
            </div>
            <div class="responsive-div">
                <?php
                include('database.php');
                $query = "SELECT * FROM employee_accounts";
                $sql = mysqli_query($connect, $query);

                echo "
                    <div class='table-container'>
                        <table class='table text-center'>
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Gender</th>
                                    <th>Email Address</th>
                                    <th>Contact Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                ";

                while ($infos = mysqli_fetch_assoc($sql)) {
                    echo "
                        <tr>
                            <td>".$infos['employee_id']."</td>
                            <td>".$infos['first_name']." ".$infos['surname']."</td>
                            <td>".$infos['position']."</td>
                            <td>".$infos['gender']."</td>
                            <td>".$infos['email_address']."</td>
                            <td>".$infos['contact_number']."</td>
                            <td>
                                <form method='POST' style='display: flex; flex-direction: row;
                                justify-content:space-between;'>
                                    <button type='submit' name='view_details' value='". $infos["employee_id"] ."' 
                                    style='width:96px; font-family: Poppins, sans-serif;
                                    font-size: 15px; color: black; background-color: white;
                                    '>View Details</button>
                                    <button type='submit' name='approved' value='". $infos["employee_id"] ."'
                                    style='width:96px; font-family: Poppins, sans-serif;
                                    font-size: 15px; color: white; background-color: green;
                                    '>Approve</button>
                                    <button type='submit' name='delete' value='". $infos["employee_id"] ."'
                                    style='width:96px; font-family: Poppins, sans-serif;
                                    font-size: 15px; color: white; background-color: red;
                                    '>Delete</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }

                echo "
                            </tbody>
                        </table>
                    </div>
                ";
                ?>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/add_employee" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="employeeID" class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" id="employeeID" name="employeeID" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contactNumber" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <select class="form-select" id="position" name="position" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Crew Manager">Crew Manager</option>
                                            <option value="Service Crew">Service Crew</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="basicPay" class="form-label">Basic Pay</label>
                                        <input type="text" class="form-control" id="basicPay" name="basicPay" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="text" class="form-control" id="salary" name="salary" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bankName" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" id="bankName" name="bankName" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bankAccount" class="form-label">Bank Account</label>
                                        <input type="text" class="form-control" id="bankAccount" name="bankAccount" required>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
