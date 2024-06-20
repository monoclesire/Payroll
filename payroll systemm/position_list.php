<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="position_list.css">
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
                            <i class='bx bx-home-alt icon'></i>
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
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <section>
            <div class="row profile">
                <div class="col-sm-3 label">
                    <p style="margin-top: 16px;">Position List</p>
                </div>
            </div>
            <p class="title" style="margin-top: 16px;">Position Form</p>
            <div class="col-sm-6 form-container">
                <form class="form-list">
                    <div class="mb-3">
                        <label for="positionName" class="form-label"><h5>Position Name</h5></label>
                        <input type="text" class="form-control" id="positionName" placeholder="Enter position name">
                    </div>
                    <div class="mb-3">
                        <label for="dailyRate" class="form-label"><h5>Daily Rate</h5></label>
                        <input type="number" class="form-control" id="dailyRate" placeholder="Enter daily rate">
                    </div>
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label"><h5>Payment Method</h5></label>
                        <select class="form-control" id="paymentMethod">
                            <option value="monthly">Monthly</option>
                            <option value="semi-monthly">Semi-Monthly</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="table-container" style="width: 49%; height: 69%; padding-left:15px; background-color: #fff; margin-left: 40%; border-radius:10px; padding-right:15px;
            padding-top: 40px; padding-bottom:267px; margin-top:-460px; box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);">
        <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Position</th>
                    <th scope="col">Daily Rate</th>
                    <th scope="col">Pay Method</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-light">
                    <td>Example Position</td>
                    <td>100</td>
                    <td>Monthly</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr class="table-light">
                    <td>Example Position</td>
                    <td>100</td>
                    <td>Monthly</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <!-- More rows can be added here -->
            </tbody>
        </table>
    </div>
</div>

        </section>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5pN5fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
