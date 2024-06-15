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
    <link rel="stylesheet" href="payroll_section.css">
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
            <div class="row table">
                <div class="col-sm-12 text-center">
                    <div class="bar">
                        <p>Create Payslip</p>
                        <p style="font-size: 13px; font-weight: 400; margin-top: 12px; margin-left: 3%;
                    color: #2C4972;">Payslip / Payroll</p>
                    </div>
                </div>
            </div>
            <div class="row dropdown-inputs-div">
                <div class="col-sm-12 dropdown-div">
                    <div class="dropdown">
                        <div class="dropdown-input-container">
                            <input type="text" class="dropdown-input" placeholder="Select an option" readonly>
                            <div class="arrow-container">
                                <div class="arrow-up">&#9650;</div>
                                <div class="arrow-down">&#9660;</div>
                            </div>
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-item">Option 1</div>
                            <div class="dropdown-item">Option 2</div>
                            <div class="dropdown-item">Option 3</div>
                            <div class="dropdown-item">Option 4</div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <div class="dropdown-input-container">
                            <input type="text" class="dropdown-input" placeholder="Select an option" readonly>
                            <div class="arrow-container">
                                <div class="arrow-up">&#9650;</div>
                                <div class="arrow-down">&#9660;</div>
                            </div>
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-item">Option 1</div>
                            <div class="dropdown-item">Option 2</div>
                            <div class="dropdown-item">Option 3</div>
                            <div class="dropdown-item">Option 4</div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <div class="dropdown-input-container">
                            <input type="text" class="dropdown-input" placeholder="Select an option" readonly>
                            <div class="arrow-container">
                                <div class="arrow-up">&#9650;</div>
                                <div class="arrow-down">&#9660;</div>
                            </div>
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-item">Option 1</div>
                            <div class="dropdown-item">Option 2</div>
                            <div class="dropdown-item">Option 3</div>
                            <div class="dropdown-item">Option 4</div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <div class="dropdown-input-container">
                            <input type="text" class="dropdown-input" placeholder="Select an option" readonly>
                            <div class="arrow-container">
                                <div class="arrow-up">&#9650;</div>
                                <div class="arrow-down">&#9660;</div>
                            </div>
                        </div>
                        <div class="dropdown-content">
                            <div class="dropdown-item">Option 1</div>
                            <div class="dropdown-item">Option 2</div>
                            <div class="dropdown-item">Option 3</div>
                            <div class="dropdown-item">Option 4</div>
                        </div>
                    </div>
                    <button class="change-pass-btn">Submit</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row tablee">
                        <div class="col-sm-12">
                            <table>
                                <tr>
                                    <td>Employee ID</td>
                                    <td>1</td>
                                    <td>Bank Name</td>
                                    <td>BPO Bank</td>
                                </tr>
                                <tr>
                                    <td>Employee Name</td>
                                    <td>Juan Dela Cruz</td>
                                    <td>Bank Account</td>
                                    <td>879368213</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>Biringan City</td>
                                </tr>
                                <tr>
                                    <td>Position</td>
                                    <td>Service Crew</td>
                                </tr>
                                <tr>
                                    <td>Date Joined</td>
                                    <td>10-25-2023</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row payslip_div">
                        <div class="col-sm-6 income-div">
                            <b>Income:</b>
                            <div class="inputs-div1">
                                <div class="input-field">
                                    <label>Pay Method:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label>No. of Days:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label>OT hr/Day:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label>Holiday Pay(day):</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="inputs-div2">
                                <div class="input-field">
                                    <label>Rate per Day:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label>Rate Wage:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label>Ot hr/Day Pay:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label>Holiday Pay:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field" style="margin-top:20px;margin-left:-20%;">
                                    <label>Gross pay:</label>
                                    <input type="text" style="width: 170px;height: 45px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 deduct-div">
                            <b>Deductions:</b>
                            <div class="inputs-div1">
                                <div class="input-field">
                                    <label style="margin-left:-20%;">Philhealth:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label style="margin-left:-14%;">PAGIBIG:</label>
                                    <input type="text">
                                </div>
                                <div class="input-field">
                                    <label>SSS:</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="inputs-div2">
                                <b>Other Deductions: </b>
                                <div class="input-field" style="margin-left:-14%;">
                                    <input type="text">
                                    <input type="text">
                                </div>
                                <div class="input-field" style="margin-left:-14%;">
                                    <input type="text">
                                    <input type="text">
                                </div>
                                <div class="input-field" style="margin-left:-14%;">
                                    <input type="text">
                                    <input type="text">
                                </div>
                                <div class="input-field" style="margin-left:-14%;">
                                    <input type="text">
                                    <input type="text">
                                </div>
                                <div class="input-field" style="margin-left:-20%;">
                                    <label>Total Deductions:</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row last_row">
                        <div class="col-sm-12 last_row_col">
                            <div class="input-field">
                                <label style="font-size: 25px;font-weight: 500;">Net Pay:</label>
                                <input type="text" style="width: 200px;height: 45px;">
                            </div>
                            <div class="btns_div">
                                <button class="change-pass-btn">Reset</button>
                                <button class="change-pass-btn">Cancel</button>
                                <button class="change-pass-btn">Generate Payslip</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdowns = document.querySelectorAll('.dropdown');

            dropdowns.forEach(dropdown => {
                const dropdownInput = dropdown.querySelector('.dropdown-input');
                const dropdownContent = dropdown.querySelector('.dropdown-content');
                const dropdownItems = dropdownContent.getElementsByClassName('dropdown-item');
                const arrowUp = dropdown.querySelector('.arrow-up');
                const arrowDown = dropdown.querySelector('.arrow-down');

                let currentIndex = -1;

                // Show dropdown when input is focused or clicked
                dropdownInput.addEventListener('focus', () => {
                    dropdownContent.style.display = 'block';
                });

                dropdownInput.addEventListener('click', () => {
                    dropdownContent.style.display = 'block';
                });

                // Hide dropdown when clicking outside
                document.addEventListener('click', (event) => {
                    if (!event.target.closest('.dropdown')) {
                        dropdownContent.style.display = 'none';
                    }
                });

                // Handle up and down arrow clicks
                arrowUp.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateSelection();
                    }
                });

                arrowDown.addEventListener('click', () => {
                    if (currentIndex < dropdownItems.length - 1) {
                        currentIndex++;
                        updateSelection();
                    }
                });

                // Handle mouse click on dropdown item
                Array.from(dropdownItems).forEach((item, index) => {
                    item.addEventListener('click', () => {
                        dropdownInput.value = item.textContent;
                        dropdownContent.style.display = 'none';
                        currentIndex = index;
                        updateSelection();
                    });
                });

                function updateSelection() {
                    Array.from(dropdownItems).forEach((item, index) => {
                        if (index === currentIndex) {
                            item.classList.add('selected');
                            dropdownInput.value = item.textContent;
                        } else {
                            item.classList.remove('selected');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>