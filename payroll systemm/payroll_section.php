<?php
session_start();
include('database.php');

$position_sql = "SELECT Position FROM employee_positions";
$position_query = mysqli_query($connect,$position_sql);

if (isset($_POST['ajax']) && $_POST['ajax'] === 'fetch_employees' && isset($_POST['position_name'])) {
    $position_name = mysqli_real_escape_string($connect, $_POST['position_name']);
    $employees_qry = mysqli_query($connect, "SELECT employee_accounts.first_name, employee_accounts.surname
        FROM employee_accounts
        LEFT JOIN employee_positions
        ON employee_accounts.position_number = employee_positions.position_number
        WHERE employee_positions.Position = '$position_name'
    ");
    while ($emps = mysqli_fetch_assoc($employees_qry)) {
        echo "<div class='dropdown-item' onclick=\"selectEmployee('".$emps['first_name']."')\">".$emps['first_name']."</div>";
    }
    exit; // Terminate the script to only return the AJAX response
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="payroll_section.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <div class="col-sm-12">
                    <form method="POST" class="positionForm" value="Submit" onsubmit="return validateForm();">
                        <div class="dropdown month-dropdown">
                            <div class="dropdown-input-container">
                                <input type="text" class="dropdown-input" placeholder="Select month" readonly>
                                <div class="arrow-container">
                                    <div class="arrow-up">&#9650;</div>
                                    <div class="arrow-down">&#9660;</div>
                                </div>
                            </div>
                            <div class="dropdown-content">
                                <div class="dropdown-item" data-value="01">January</div>
                                <div class="dropdown-item" data-value="02">February</div>
                                <div class="dropdown-item" data-value="03">March</div>
                                <div class="dropdown-item" data-value="04">April</div>
                                <div class="dropdown-item" data-value="05">May</div>
                                <div class="dropdown-item" data-value="06">June</div>
                                <div class="dropdown-item" data-value="07">July</div>
                                <div class="dropdown-item" data-value="08">August</div>
                                <div class="dropdown-item" data-value="09">September</div>
                                <div class="dropdown-item" data-value="10">October</div>
                                <div class="dropdown-item" data-value="11">November</div>
                                <div class="dropdown-item" data-value="12">December</div>
                            </div>
                        </div>
                        <div class="dropdown year-dropdown">
                            <div class="dropdown-input-container">
                                <input type="text" class="dropdown-input" placeholder="Select year" readonly>
                                <div class="arrow-container">
                                    <div class="arrow-up">&#9650;</div>
                                    <div class="arrow-down">&#9660;</div>
                                </div>
                            </div>
                            <div class="dropdown-content">
                                <div class="dropdown-item" data-value="2024">2024</div>
                                <div class="dropdown-item" data-value="2023">2023</div>
                                <div class="dropdown-item" data-value="2022">2022</div>
                                <div class="dropdown-item" data-value="2021">2021</div>
                                <div class="dropdown-item" data-value="2020">2020</div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <div class="dropdown-input-container">
                                    <input type="text" name="position_name" id="position_name" class="dropdown-input" placeholder="Select position" readonly onclick="toggleDropdown('positionDropdown')">
                                <div class="arrow-container">
                                    <div class="arrow-up" onclick="toggleDropdown('positionDropdown')">&#9650;</div>
                                    <div class="arrow-down" onclick="toggleDropdown('positionDropdown')">&#9660;</div>
                                </div>
                            </div>
                            <div id="positionDropdown" class="dropdown-content">
                                <?php
                                    while ($positions = mysqli_fetch_assoc($position_query)) {
                                        echo "<div class='dropdown-item' onclick=\"selectPosition('".$positions['Position']."')\">".$positions['Position']."</div>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="dropdown">
                            <div class="dropdown-input-container">
                                <input type="text" name="emp_name" id="emp_name" class="dropdown-input" placeholder="Select Employee" readonly onclick="toggleDropdown('employeeDropdown')">
                                <div class="arrow-container">
                                    <div class="arrow-up" onclick="toggleDropdown('employeeDropdown')">&#9650;</div>
                                    <div class="arrow-down" onclick="toggleDropdown('employeeDropdown')">&#9660;</div>
                                </div>
                            </div>
                            <div id="employeeDropdown" class="dropdown-content">
                                <!-- Employees will be dynamically populated here -->
                            </div>
                        </div>
                        <input type="submit" class="change-pass-btn" name="submit" >
                    </form>
                </div>
            </div>

            <form class="row" id="payrollSection" onsubmit="return validateForm();" style="display: none;">
                <div class="x-sm-12">
                    <div class="row tablee">
                        <div class="col-sm-12">
                            <table>
                                <?php
                                if(isset($_POST['submit'])){
                                    $position_namee = $_POST['position_name'];
                                    $employee_name = $_POST['emp_name'];
                                
                                    $payroll_query = mysqli_query($connect,"SELECT * FROM employee_accounts
                                    LEFT JOIN employee_positions
                                    ON employee_accounts.Position_number=employee_positions.Position_number
                                    WHERE employee_positions.Position = '$position_namee' AND employee_accounts.first_name = '$employee_name'");
                                    
                                    if (!empty($position_namee) && !empty($employee_name)){
                                        while(mysqli_num_rows($payroll_query) > 0){
                                            $infos = mysqli_fetch_assoc($payroll_query);
                                            echo "
                                        <tr>
                                            <td>Employee ID</td>
                                            <td>".$infos['employee_id']."</td>
                                            <td>Bank Name</td>
                                            <td>BPO Bank</td>
                                        </tr>
                                        <tr>
                                            <td>Employee Name</td>
                                            <td>".$infos['first_name'].$infos['surname']."</td>
                                            <td>Bank Account</td>
                                            <td>879368213</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>".$infos['gender']."</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>".$infos['Address']."</td>
                                        </tr>
                                        <tr>
                                            <td>Position</td>
                                            <td>".$infos['Position']."</td>
                                        </tr>
                                        <tr>
                                            <td>Date Joined</td>
                                            <td>10-25-2023</td>
                                        </tr>
                                            ";
                                            break;
                                        }
                                        echo '<script>document.getElementById("payrollSection").style.display = "block";</script>';
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <?php
                    $employee_name = $_POST['emp_name'];
                    $daily_rate = mysqli_query($connect,"SELECT employee_Positions.Daily_rate
                    FROM employee_positions
                    LEFT JOIN employee_accounts
                    ON employee_accounts.Position_number = employee_positions.Position_number
                    WHERE first_name = '$employee_name'");
                    $dl = mysqli_fetch_assoc($daily_rate);
                    ?>
                    <div class="row payslip_div">
                        <form method="POST" class="payslip_div">
                            <div class="col-sm-6 income-div">
                                <b>Income:</b>
                                <div class="inputs-div1">
                                    <div class="input-field" style="margin-top:-10%;margin-bottom:3%;margin-left:13%;">
                                        <label>Rate per Day:</label>
                                        <input type="number" id="daily_rate" value="<?php echo $dl['Daily_rate'] ?>" readonly>
                                    </div>
                                    <div class="input-field">
                                        <label>No. of Days:</label>
                                        <input type="number" id="num_days" onkeyup = "numdays_comp(this.value);">
                                    </div>
                                    <div class="input-field">
                                        <label>OT hr/Day:</label>
                                        <input type="number" id="ot_hrs" onkeyup = "ot_hr_comp(this.value);">
                                    </div>
                                    <div class="input-field">
                                        <label style="margin-left: -10%;">Holiday Pay(day):</label>
                                        <input type="number" id="holi_pay" onkeyup = "holid_comp(this.value);">
                                    </div>
                                </div>
                                <div class="inputs-div2">
                                    <div class="input-field" style="margin-top:10%;">
                                        <label>Rate Wage:</label>
                                        <input type="number" id="num_of_days" readonly>
                                    </div>
                                    <div class="input-field">
                                        <label>Ot hr/Day Pay:</label>
                                        <input type="number" id="ot_hr" readonly>
                                    </div>
                                    <div class="input-field">
                                        <label>Holiday Pay:</label>
                                        <input type="number" id="holiday_pays" readonly>
                                    </div>
                                    <div class="input-field" style="margin-top:20px;margin-left:-20%;">
                                        <label>Gross pay:</label>
                                        <input type="number" id="grosspay" style="width: 170px;height: 45px;" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 deduct-div">
                                <b>Deductions:</b>
                                <div class="inputs-div1">
                                    <div class="input-field">
                                        <label style="margin-left:-20%;">PhilHealth:</label>
                                        <input type="number" id="philhealth" readonly>
                                    </div>
                                    <div class="input-field">
                                        <label style="margin-left:-14%;">PAGIBIG:</label>
                                        <input type="number" id="pagibig" readonly>
                                    </div>
                                    <div class="input-field">
                                        <label>SSS:</label>
                                        <input type="number" id="sss" readonly>
                                    </div>
                                    <div class="input-field" style="margin-left:-43%;">
                                        <label>Total Deductions:</label>
                                        <input type="number" id="total_deductions" readonly>
                                    </div>
                                </div>
                                <div class="inputs-div2">
                                    <b>Other Deductions: </b>
                                    <div class="input-field" style="margin-left:-14%;">
                                        <p style="margin-left:8%;margin-bottom:0;">Name of <br>deduction</p>
                                        <p style="width: auto; margin-left:15%;margin-bottom:0;">Value</p>
                                    </div>
                                    <div class="input-field" style="margin-left:-14%;">
                                        <input type="text">
                                        <input type="number" class="other_deduc">
                                    </div>
                                    <div class="input-field" style="margin-left:-14%;">
                                        <input type="text">
                                        <input type="number" class="other_deduc">
                                    </div>
                                    <div class="input-field" style="margin-left:-14%;">
                                        <input type="text">
                                        <input type="number" class="other_deduc">
                                    </div>
                                    <div class="input-field" style="margin-left:-14%;">
                                        <input type="text">
                                        <input type="number" class="other_deduc">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row last_row">
                        <div class="col-sm-12 last_row_col">
                            <div class="input-field">
                                <label style="font-size: 25px;font-weight: 500;">Net Pay:</label>
                                <input type="number" id="netpay" style="width: 200px;height: 45px;" readonly>
                            </div>
                            <div class="btns_div">
                                <button class="change-pass-btn">Reset</button>
                                <button class="change-pass-btn">Cancel</button>
                                <button class="change-pass-btn">Generate Payslip</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function setupDropdown(dropdownSelector, defaultValueFunction) {
                var dropdown = document.querySelector(dropdownSelector);
                var dropdownInput = dropdown.querySelector('.dropdown-input');
                var dropdownItems = dropdown.querySelectorAll('.dropdown-item');
                var dropdownContent = dropdown.querySelector('.dropdown-content');
                var arrowUp = dropdown.querySelector('.arrow-up');
                var arrowDown = dropdown.querySelector('.arrow-down');

                // Function to set the default value
                function setDefaultValue() {
                    var defaultValue = defaultValueFunction();
                    var defaultItem = dropdown.querySelector(`.dropdown-item[data-value="${defaultValue}"]`);
                    if (defaultItem) {
                        dropdownInput.value = defaultItem.innerText;
                    }
                }

                // Set the default value when the page loads
                setDefaultValue();

                // Toggle dropdown visibility
                function toggleDropdown() {
                    dropdownContent.classList.toggle('show');
                    arrowUp.classList.toggle('hidden');
                    arrowDown.classList.toggle('hidden');
                }

                dropdownInput.addEventListener('click', toggleDropdown);
                arrowUp.addEventListener('click', toggleDropdown);
                arrowDown.addEventListener('click', toggleDropdown);

                // Handle item selection
                dropdownItems.forEach(function(item) {
                    item.addEventListener('click', function() {
                        dropdownInput.value = this.innerText;
                        dropdownContent.classList.remove('show');
                        arrowUp.classList.add('hidden');
                        arrowDown.classList.remove('hidden');
                    });
                });

                // Close the dropdown if clicking outside of it
                document.addEventListener('click', function(event) {
                    if (!dropdown.contains(event.target)) {
                        dropdownContent.classList.remove('show');
                        arrowUp.classList.add('hidden');
                        arrowDown.classList.remove('hidden');
                    }
                });
            }

            // Function to get the current year
            function getCurrentYear() {
                return new Date().getFullYear();
            }

            // Function to get the current month
            function getCurrentMonth() {
                var month = new Date().getMonth() + 1; // JavaScript months are 0-11
                return month < 10 ? '0' + month : month;
            }

            // Initialize the dropdowns
            setupDropdown('.year-dropdown', getCurrentYear);
            setupDropdown('.month-dropdown', getCurrentMonth);
        });
    </script>
    <script>
        // Function to toggle dropdown visibility
        function toggleDropdown(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle("show");
        }

        // Function to select a position and fetch corresponding employees
        function selectPosition(position) {
            document.getElementById('position_name').value = position;
            toggleDropdown('positionDropdown');
            fetchEmployees(position);
        }

        // Function to select an employee
        function selectEmployee(employee) {
            document.getElementById('emp_name').value = employee;
            toggleDropdown('employeeDropdown');
        }

        // Function to fetch employees via AJAX
        function fetchEmployees(position) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true); // Same PHP file
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('employeeDropdown').innerHTML = xhr.responseText;
                    document.getElementById('employeeDropdown').classList.add("show"); // Open the dropdown after update
                }
            };
            xhr.send("ajax=fetch_employees&position_name=" + encodeURIComponent(position));
        }

        // Function to validate form submission
        function validateForm() {
            var positionName = document.getElementById("position_name").value;
            var employeeName = document.getElementById("emp_name").value;

            console.log("Position Name:", positionName);
            console.log("Employee Name:", employeeName);

            if (positionName === "" || employeeName === "") {
                alert("Both position and employee name must be selected.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        // Event listener to initialize dropdowns and other necessary functionalities
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize dropdowns, handle clicks, etc.
            // Ensure other necessary JavaScript functionalities are correctly implemented here
        });
    </script>
    <script>
        const daily_rate = document.getElementById('daily_rate').value;

        function updateGrossPay() {
            let num_of_days = parseFloat(document.getElementById('num_of_days').value) || 0;
            let ot_hr = parseFloat(document.getElementById('ot_hr').value) || 0;
            let holiday_pays = parseFloat(document.getElementById('holiday_pays').value) || 0;

            let grosspay = num_of_days + ot_hr + holiday_pays;
            document.getElementById('grosspay').value = grosspay.toFixed(2);
        }
        function numdays_comp(value){
            let num_days = daily_rate * value;

            document.getElementById('num_of_days').value = num_days.toFixed(2);
            updateGrossPay();
            netPay();
        }
        function ot_hr_comp(value){
            let ot_hr = daily_rate / 8;
            let ot_hr_pay = value * ot_hr;
            document.getElementById('ot_hr').value = ot_hr_pay.toFixed(2);
            updateGrossPay();
            netPay();
        }
        function holid_comp(value){
            let holiday_pay_rate = daily_rate * 2;
            let holiday_pay = holiday_pay_rate * value;

            document.getElementById('holiday_pays').value = holiday_pay.toFixed(2);
            updateGrossPay();
            netPay();
        }
        function benefits_deductions(){
            let philHealth_total,pagibig_total,sss_total;
            let monthly = daily_rate * 30;
            let gross_pay_deduc = parseFloat(document.getElementById('grosspay').value) || 0;

            philHealth_total = monthly * 0.045;
            pagibig_total = monthly * 0.05;
            sss_total = monthly * 0.02;

            document.getElementById('philhealth').value = philHealth_total.toFixed(2);
            document.getElementById('pagibig').value = pagibig_total.toFixed(2);
            document.getElementById('sss').value = sss_total.toFixed(2);
        }
        benefits_deductions();
        function total_deductions(){
            let pagibig_deduc = parseFloat(document.getElementById('pagibig').value) || 0;
            let sss_deduc = parseFloat(document.getElementById('sss').value) || 0;
            let philhealth_deduc = parseFloat(document.getElementById('philhealth').value) || 0;

            let total_deductions =  philhealth_deduc + pagibig_deduc + sss_deduc;
            document.getElementById('total_deductions').value = total_deductions.toFixed(2);
        }
        total_deductions();
        function calculateTotalDeductions() {
            const inputs = document.querySelectorAll('.other_deduc');
            let additionalTotal = 0;

            inputs.forEach(input => {
                const value = parseFloat(input.value);
                if (!isNaN(value)) {
                    additionalTotal += value;
                }
            });

            const baseValue = parseFloat(document.getElementById('total_deductions').dataset.baseValue);
            document.getElementById('total_deductions').value = baseValue + additionalTotal;
            netPay();
        }

        // Initialize base value on page load
        window.addEventListener('load', () => {
            const totalDeductionsInput = document.getElementById('total_deductions');
            const baseValue = parseFloat(totalDeductionsInput.value) || 0;

            totalDeductionsInput.dataset.baseValue = baseValue;
        });

        // Add event listeners to input fields
        document.querySelectorAll('.other_deduc').forEach(input => {
            input.addEventListener('input', calculateTotalDeductions);
        });

        function netPay(){
            let gross_pay = parseFloat(document.getElementById('grosspay').value) || 0;
            let total_deduc = parseFloat(document.getElementById('total_deductions').value) || 0;

            if(gross_pay == 0){
                const netBaseValue = parseFloat(document.getElementById('netpay').dataset.netBaseValue);
                document.getElementById('netpay').value = netBaseValue;
            }
            else{
                let total_net_pay = gross_pay - total_deduc;
                document.getElementById('netpay').value = total_net_pay;
            }

            
            
        }
        window.addEventListener('load',() =>{
            const totalNetpayInput = document.getElementById('netpay');
            const netBaseValue = parseFloat(totalNetpayInput.value) || 0;

            totalNetpayInput.dataset.netBaseValue = netBaseValue;
        });
    </script>
</body>
</html>