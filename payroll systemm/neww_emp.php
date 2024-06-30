<?php $conn = mysqli_connect("localhost", "root", "", "payroll_system_db"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--start of search function-->
    <script>
        $(document).ready(function() {
            $('#searchInput').keyup(function() {
                var query = $(this).val().trim();

                // AJAX request
                $.ajax({
                    url: 'search.php', // PHP script to handle search
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        $('.table tbody').html(response); // Update table with search results
                    }
                });
            });
        });
    </script>
    <!--end of search function-->

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="neww_emp.css">

    <title>New Employee</title>
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
            <div class="row profile">
                <div class="col-sm-12 label">
                    <!-- start of total employees-->
                    <?php $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee_accounts")); ?>
                    <p style="margin-top: 16px;">Employee List : <?php echo "$total_records"; ?> </p>
                    <!-- end of total employees-->
                </div>
            </div>
            <div class="row search">
                <div class="col-sm-12">
                    <div class="search-bar">
                        <form id="searchForm" action="" method="GET">
                            <!--start of search bar-->
                            <input type="text" id="searchInput" name="query" placeholder="Search Record..." value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                            <button type="submit">Search</button>
                            <!--end of search bar-->
                        </form>

                        <div class="add-emp">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" style="background-color:#007BFF;">+ Add Employee</button>
                            <a href="position_list.html" class="btn btn-secondary" target="_blank">Position List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table" style="background-color: white; height:auto;">
                <!--start of pagination-->
                <?php
                // Database connection details
                $conn = mysqli_connect("localhost", "root", "", "payroll_system_db");

                // Pagination configuration
                $records_per_page = 4; // Number of records to display per page
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Get current page number, default to 1

                // Calculate the limit clause for SQL query
                $start_from = ($current_page - 1) * $records_per_page;

                // Initialize variables
                $sql = "SELECT employee_id, first_name, gender, contact_number, password, leave_id, email_address, bank_name 
                FROM employee_accounts ";

                // Check if search query is provided
                if (isset($_GET['query']) && !empty($_GET['query'])) {
                    $search_query = $_GET['query'];
                    // Modify SQL query to include search filter
                    $sql .= "WHERE first_name LIKE '%$search_query%' or employee_id like '%$search_query%' or gender like '%$search_query' or position like '%$search_query%' or surname like '%$search_query%'  ";
                }

                $sql .= "LIMIT $start_from, $records_per_page";

                $result = $conn->query($sql);

                // Count total number of records
                $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee_accounts"));
                $total_pages = ceil($total_records / $records_per_page);

                ?>
                <!--end of pagination-->
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <script>

                    </script>
                    <!--table designs x next prev button design-->
                    <style>
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        tr:nth-child(even) {
                            background-color: #f2f2f2;
                        }

                        th,
                        td {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                        }



                        .pagination {
                            margin-top: 20px;
                            text-align: center;

                        }

                        .pagination a {
                            display: inline-block;
                            padding: 8px 16px;
                            text-decoration: none;
                            background-color: #f1f1f1;
                            color: black;
                            border: 1px solid #ccc;
                            margin-right: 5px;
                            /* Added margin to separate buttons */
                        }

                        .pagination a.active {
                            background-color: #4CAF50;
                            color: white;
                            border: 1px solid #4CAF50;
                        }

                        .pagination a:hover:not(.active) {
                            background-color: #ddd;
                        }

                        .pagination .prev :hover {
                            float: left;

                            /* Float left for "Previous" link */
                        }


                        .pagination .next {
                            float: right;
                            /* Float right for "Next" link */
                        }

                        .swal-button--confirm {
                            background-color: #28a745;
                            /* Green color for the OK button */
                            border-color: #28a745;
                            /* Matching border color */
                        }

                        .swal-button--confirm:hover {
                            background-color: #218838;
                            /* Darker shade of green on hover */
                            border-color: #1e7e34;
                            /* Matching border color on hover */
                        }
                    </style>
                </head>

                <body>
                    <style>
                        th,
                        td {

                            border: none;
                            /* Remove all borders from table cells */
                        }
                    </style>


                    <table>
                        <thead class="table-primary">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Password</th>
                                <th>Leave ID</th>
                                <th>Email Address</th>
                                <th>Bank Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- start fetch data and rows from the database-->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $row['employee_id']; ?></td>
                                        <td><?= $row['first_name']; ?></td>
                                        <td><?= $row['gender']; ?></td>
                                        <td><?= strlen($row['contact_number']) > 9 ? substr($row['contact_number'], 0, 7) . '...' : $row['contact_number']; ?></td>
                                        </td>
                                        <td><?= strlen($row['password']) > 20 ? substr($row['password'], 0, 15) . '...' : $row['password']; ?></td>
                                        <td><?= $row['leave_id']; ?></td>
                                        <td><?= strlen($row['email_address']) > 20 ? substr($row['email_address'], 0, 15) . '...' : $row['email_address']; ?></td>
                                        <td><?= $row['bank_name']; ?></td>
                                        <td>
                                            <!--start of button update + function-->
                                            <button type="button" class="btn btn-info edit-btn" data-bs-toggle="modal" data-bs-target="#editEmployeeModal" data-employee-id="<?= $row['employee_id']; ?>" data-first-name="<?= $row['first_name']; ?>" data-gender="<?= $row['gender']; ?>" data-contact-number="<?= $row['contact_number']; ?>" data-password="<?= $row['password']; ?>" data-leave-id="<?= $row['leave_id']; ?>" data-email-address="<?= $row['email_address']; ?>" data-bank-name="<?= $row['bank_name']; ?>">
                                                UPDATE
                                                <script>
                                                    // JavaScript to show success notification after editing a record
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const urlParams = new URLSearchParams(window.location.search);
                                                        const editSuccess = urlParams.get('edit_success');

                                                        if (editSuccess === 'true') {
                                                            swal("Success!", "Record has been updated successfully.", "success");
                                                            // Remove the parameter from the URL to prevent showing the message on page refresh
                                                            const newUrl = window.location.href.split('?')[0];
                                                            window.history.replaceState({}, document.title, newUrl);
                                                        }
                                                    });
                                                </script>
                                            </button>
                                            <!--end of button update + function-->
                                            <!--start of delete button + function-->
                                            <button type="button" class="btn btn-info delete-btn" style="background-color: red; color:white;" onclick="confirmDelete(<?php echo $row['employee_id']; ?>)">DELETE</button>

                                            <script>
                                                function confirmDelete(employeeId) {
                                                    swal({
                                                            title: "Are you sure?",
                                                            text: "Once deleted, you will not be able to recover this record!",
                                                            icon: "warning",
                                                            buttons: true,
                                                            dangerMode: true,
                                                        })
                                                        .then((willDelete) => {
                                                            if (willDelete) {
                                                                // Redirect to delete script
                                                                window.location.href = "delete.php?employee_id=" + employeeId;
                                                            }
                                                        });
                                                }
                                            </script>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const urlParams = new URLSearchParams(window.location.search);
                                                    const deleteSuccess = urlParams.get('delete_success');

                                                    if (deleteSuccess === 'true') {
                                                        swal("Success!", "Record has been deleted successfully.", "success");
                                                        // Remove the parameter from the URL to prevent showing the message on page refresh
                                                        const newUrl = window.location.href.split('?')[0];
                                                        window.history.replaceState({}, document.title, newUrl);
                                                    }
                                                });
                                            </script>
                                            <!--end of delete button + function-->
                                            <script>
                                                //start of add employee function and alertbox
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const urlParams = new URLSearchParams(window.location.search);
                                                    const addSuccess = urlParams.get('add_success');

                                                    if (addSuccess === 'true') {
                                                        swal("Success!", "Employee added successfully.", "success");
                                                        // Remove the parameter from the URL to prevent showing the message on page refresh
                                                        const newUrl = window.location.href.split('?')[0];
                                                        window.history.replaceState({}, document.title, newUrl);
                                                    }
                                                });
                                                //end of add employee function and alertbox
                                            </script>



                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {

                                echo '<tr><td colspan="9">No records found (0) </td></tr>';
                            }
                            ?>
                            <!--end of search bar function-->

                        </tbody>
                    </table>
            </div>
            <div style="float:right; margin-right:5%;background-color:white; width:85%;border-radius:4px;">
                <!-- Pagination links -->
                <div class="pagination" style="float:right; margin-right:1.5%">

                    <?php
                    if ($current_page > 1) : ?>
                        <a href="?page=<?= ($current_page - 1); ?>&query=<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>" class="prev" style="border-radius:4px;background-color:#007BFF;color:white;margin-bottom:13px;">&laquo; Previous</a>
                    <?php endif; ?>

                    <?php if ($current_page < $total_pages) : ?>
                        <a href="?page=<?= ($current_page + 1); ?>&query=<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>" class="next" style="border-radius:4px;background-color:#007BFF;color:white;margin-bottom:13px;">Next &raquo;</a>
                    <?php endif; ?>
                </div>


                <p style="margin-left:2%;margin-top:2.3%;">Page <?= $current_page; ?> out of <?= $total_pages ?></p>


            </div>
            <!--end table designs x next prev button design-->

            <div class="col-sm-12 label">
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editEmployeeModalLabel" style="margin-left:5%;">Edit Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/update_employee.php" method="POST">
                                <!-- Employee ID hidden field -->
                                <input type="hidden" id="editEmployeeId" name="employee_id">

                                <!-- Other input fields -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editFirstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="editFirstName" name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editGender" class="form-label">Gender</label>
                                            <input type="text" class="form-control" id="editGender" name="gender" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editContact" class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" id="editContact" name="contact_number" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editPassword" class="form-label">Password </label>
                                            <input type="text" class="form-control" id="editPassword" name="password" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editLeaveid" class="form-label">Leave ID</label>
                                            <input type="text" class="form-control" id="editLeaveid" name="leave_id" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editEmail" class="form-label">Email Address </label>
                                            <input type="text" class="form-control" id="editEmail" name="email_address" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editBankname" class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" id="editBankname" name="bank_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="editBankaccount" class="form-label">Bank Account</label>
                                            <input type="text" class="form-control" id="editBankaccount" name="bank_account" required>
                                        </div>
                                    </div>








                                    <!-- Add other fields similarly -->

                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                // Handle click on update button + function

                document.querySelectorAll('.edit-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        // Fetch data attributes from the button
                        const employeeId = this.getAttribute('data-employee-id');
                        const firstName = this.getAttribute('data-first-name');
                        const gender = this.getAttribute('data-gender');
                        const contact = this.getAttribute('data-contact-number');
                        const password = this.getAttribute('data-password');
                        const leaveid = this.getAttribute('data-leave-id');
                        const email = this.getAttribute('data-email-address');
                        const bankname = this.getAttribute('data-bank-name');
                        const bankaccount = this.getAttribute('data-bank-account');





                        // Set values in edit modal form para makita ung exisiting data na ieedit mo
                        document.getElementById('editEmployeeId').value = employeeId;
                        document.getElementById('editFirstName').value = firstName;
                        document.getElementById('editGender').value = gender;
                        document.getElementById('editContact').value = contact;
                        document.getElementById('editPassword').value = password;
                        document.getElementById('editLeaveid').value = leaveid;
                        document.getElementById('editEmail').value = email;
                        document.getElementById('editBankname').value = bankname;
                        document.getElementById('editBankaccount').value = bankaccount;
                    });
                });
            </script>


            <div class="row">
                <div class="col-sm-12 new-containers">

                </div>

            </div>
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
                    <form method="POST" action="add_employee.php"> <!-- Specify your PHP script here -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="name" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeID" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="employeeID" name="employee_ID">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber" name="contact_Number" required>
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
                                    <input type="email" class="form-control" id="email" name="email_address" required>
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
                                    <input type="text" class="form-control" id="basicPay" name="basic_Pay" required>
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
                                    <input type="text" class="form-control" id="bankName" name="bank_Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bankAccount" class="form-label">Bank Account</label>
                                    <input type="text" class="form-control" id="bankAccount" name="bank_Account" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

</body>

</html>