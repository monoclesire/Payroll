
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "payroll_system_db");

// Retrieve search query
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Build SQL query
    $sql = "SELECT employee_id, first_name, gender, contact_number, password, position, leave_id, email_address, bank_name 
            FROM employee_accounts 
            WHERE first_name LIKE '%$search_query%' OR employee_id LIKE '%$search_query%' OR gender LIKE '%$search_query%' OR position LIKE '%$search_query%' OR surname LIKE '%$search_query%'";

    $result = $conn->query($sql);

    // Generate HTML for search results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Truncate long fields (adjust the number based on your design needs)
            $first_name = strlen($row['first_name']) > 20 ? substr($row['first_name'], 0, 14) . '...' : $row['first_name'];
            
            $contact_number = strlen($row['contact_number']) > 9 ? substr($row['contact_number'], 0, 7) . '...' : $row['contact_number'];
            $email_address = strlen($row['email_address']) > 15 ? substr($row['email_address'], 0, 8) . '...' : $row['email_address'];

            echo "<tr>
                    <td>{$row['employee_id']}</td>
                    <td>{$first_name}</td>
                    <td>{$row['gender']}</td>
                    <td>{$contact_number}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['leave_id']}</td>
                    <td>{$email_address}</td>
                    <td>{$row['bank_name']}</td>
                    <td>
                        <button type='button' class='btn btn-info edit-btn' data-bs-toggle='modal' data-bs-target='#editEmployeeModal' data-employee-id='{$row['employee_id']}' data-first-name='{$row['first_name']}' data-gender='{$row['gender']}' data-contact-number='{$row['contact_number']}' data-password='{$row['password']}' data-leave-id='{$row['leave_id']}' data-email-address='{$row['email_address']}' data-bank-name='{$row['bank_name']}'>
                            UPDATE
                        </button>
                        <button type='button' class='btn btn-info delete-btn' style='background-color: red; color:white;' onclick='confirmDelete({$row['employee_id']})'>DELETE</button>
                    </td>
                </tr>";
            
        }
        
    } else {
        
        echo '<tr><td colspan="9">No records found (0) </td></tr>';
    }
}
?>
<script>
                // Handle click on edit button
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

                        // Set values in the edit modal form
                        document.getElementById('editEmployeeId').value = employeeId;
                        document.getElementById('editFirstName').value = firstName;
                        document.getElementById('editGender').value = gender;
                        document.getElementById('editContact').value = contact;
                        document.getElementById('editPassword').value = password;
                        document.getElementById('editLeaveid').value = leaveid;
                        document.getElementById('editEmail').value = email;
                        document.getElementById('editBankname').value = bankname;

                        // Set other fields similarly
                    });
                });
            </script>
