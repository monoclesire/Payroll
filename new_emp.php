<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="new_emp.css">
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
        
    <section>
        <div class="row profile">
            <div class="col-sm-3 label">
                <p style="margin-top: 16px;">Employee List</p>
                </div>
            </div>        
        <div class="row search">
                <div class="search-bar">
                    <form action="/search" method="GET">
                        <input type="text" name="query" placeholder="Search for...">
                        <button type="submit">Search</button>
                    </form>
                    <div class="add-emp">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">+ Add Employee</button>
                    <a href="position_list.html" class="btn btn-secondary" target="_blank">Position List</a>
                </div>
                </div>
            </div>  
        <div class="row table">
            <div class="col-sm-3 label">
                
                </div>
            </div>      
        <div class="row">
            <div class="col-sm-12 new-containers">
                
        </div>
    </section>

    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center" id="addEmployeeModalLabel">Add New Employee</h5>
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

    <script src="emp edit prof.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>