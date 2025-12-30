<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Reports</title>
    <link rel="stylesheet" type="text/css" href="css/adminallpage.css"> 
</head>
<body>
    <div class="container">
        <header class="admin-header">
            <h1>Admin Dashboard</h1>
            <button id="dashboardBtn" onclick="window.location.href='admin.php'">Back to Dashboard</button>
            <button id="logoutBtn">Logout</button>
        </header>
        
        <h2>Manage Reports</h2>

        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "online_medical_portal";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete logic
        if (isset($_POST['delete'])) {
            $id = $conn->real_escape_string($_POST['id']);
            $sql = "DELETE FROM reports WHERE id = '$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record deleted successfully.');</script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        // Update logic
        if (isset($_POST['update'])) {
            $id = $conn->real_escape_string($_POST['id']);
            $patient_id = $conn->real_escape_string($_POST['patient_id']);
            $full_name = $conn->real_escape_string($_POST['full_name']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $email = $conn->real_escape_string($_POST['email']);
            $mobile = $conn->real_escape_string($_POST['mobile']);
            $report_type = $conn->real_escape_string($_POST['report_type']);

            $sql = "UPDATE reports SET 
                    patient_id='$patient_id', 
                    full_name='$full_name', 
                    gender='$gender', 
                    email='$email', 
                    mobile='$mobile', 
                    report_type='$report_type' 
                    WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record updated successfully.');</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Fetch all report records
        $sql = "SELECT * FROM reports";
        $result = $conn->query($sql);
        ?>

        <!-- Display reports -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Report Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['patient_id']); ?></td>
                        <td><?= htmlspecialchars($row['full_name']); ?></td>
                        <td><?= htmlspecialchars($row['gender']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['mobile']); ?></td>
                        <td><?= htmlspecialchars($row['report_type']); ?></td>
                        <td>
                            <button onclick="showUpdateForm('<?= htmlspecialchars($row['id']); ?>', '<?= htmlspecialchars($row['patient_id']); ?>', '<?= htmlspecialchars($row['full_name']); ?>', '<?= htmlspecialchars($row['gender']); ?>', '<?= htmlspecialchars($row['email']); ?>', '<?= htmlspecialchars($row['mobile']); ?>', '<?= htmlspecialchars($row['report_type']); ?>')">Update</button>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Update Form -->
    <div class="form-container" id="updateForm" style="display:none;">
        <h2>Update Report</h2>
        <form method="POST">
            <input type="hidden" id="id" name="id">
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" required>
            
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" required>

            <label for="report_type">Report Type:</label>
            <input type="text" id="report_type" name="report_type" required>

            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <script>
        function showUpdateForm(id, patient_id, full_name, gender, email, mobile, report_type) {
            document.getElementById('id').value = id;
            document.getElementById('patient_id').value = patient_id;
            document.getElementById('full_name').value = full_name;
            document.getElementById('gender').value = gender;
            document.getElementById('email').value = email;
            document.getElementById('mobile').value = mobile;
            document.getElementById('report_type').value = report_type;
            document.getElementById('updateForm').style.display = 'block';
        }
    </script>

    <script src="js/admin.js"></script>
    <footer class="admin-footer">
            <p>&copy; 2024 Medical Portal. All rights reserved.</p>
        </footer>
</body>
</html>
