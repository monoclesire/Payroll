<?php 
include('database.php');
$query = "SELECT * FROM employee_pending_leaves";
$sql = mysqli_query($connect,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Button Tables</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .table-container {
            display: none;
        }
        .table-container.active {
            display: block;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Select a Table</h2>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio1" value="table1">
        <label class="form-check-label" for="tableRadio1">Table 1</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio2" value="table2">
        <label class="form-check-label" for="tableRadio2">Table 2</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="tableRadios" id="tableRadio3" value="table3">
        <label class="form-check-label" for="tableRadio3">Table 3</label>
    </div>
    <div id="table1" class="table-container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                    <th>Header 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($leaves = mysqli_fetch_assoc($sql)){
                        echo "
                        <tr>
                            <td>".$leaves['employee_leave_id']."</td>
                            <td>".$leaves['Name']."</td>
                            <td>".$leaves['Position']."</td>
                            <td>".$leaves['Leave_type']."</td>
                        </tr>
                        ";
                    }
                ?>      
                <tr>
                    <td>Content 4</td>
                    <td>Content 5</td>
                    <td>Content 6</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="table2" class="table-container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Header A</th>
                    <th>Header B</th>
                    <th>Header C</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Content A1</td>
                    <td>Content B1</td>
                    <td>Content C1</td>
                </tr>
                <tr>
                    <td>Content A2</td>
                    <td>Content B2</td>
                    <td>Content C2</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="table3" class="table-container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Header X</th>
                    <th>Header Y</th>
                    <th>Header Z</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Content X1</td>
                    <td>Content Y1</td>
                    <td>Content Z1</td>
                </tr>
                <tr>
                    <td>Content X2</td>
                    <td>Content Y2</td>
                    <td>Content Z2</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

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
    });
</script>
</body>
</html>
