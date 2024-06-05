<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employee.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href='css_bootstrap_links/bootstrap.min.css' rel='stylesheet'>
    <title>Employee List</title> 
</head>
<body>

    <nav class="sidebar close">
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

    <section class="home">
        <div class="text">Employee List</div>
        <div class="responsive-div">
            <div class="search-bar">
                <form action="/search" method="GET">
                    <input type="text" name="query" placeholder="Search for...">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="add-emp">
                <p>Employee()</p>
                <button type="button">+ Add Employee</button>
            </div>
        </div>
        <div class="responsive-div">
            <?php
                include('database.php');
                $query = "SELECT * FROM employee_accounts";
                $sql = mysqli_query($connect,$query);
                
                echo "
                    <table style='
                    width: 100%;
                    table-layout: fixed;
                    '
                    class='table table-responsive text-center'>
                        <tr>
                            <td>Employee ID</td>
                            <td>Name</td>
                            <td>Position</td>
                            <td>Gender</td>
                            <td>Email Address</td>
                            <td>Contact Number</td>
                            <td>Action</td>
                        </tr>
                    </table>
                        "
                ;
                while($infos = mysqli_fetch_assoc($sql)){
                    echo "
                        <table style='
                        width: 100%;
                        table-layout: fixed;
                        margin-top: 0px;
                        ' class='table table-responsive text-center'> 
                            <tr>
                                <td>".$infos['employee_id']."</td>
                                <td>".$infos['first_name'].$infos['surname']."</td>
                                <td>".$infos['position']."</td>
                                <td>".$infos['gender']."</td>
                                <td>".$infos['email_address']."</td>
                                <td>".$infos['contact_number']."</td>
                                <td>haha</td>
                            </tr>
                        </table>
                    ";
                }
            ?>
        </div>
    </section>
        

    <script src="script.js"></script>
</body>
</html>
