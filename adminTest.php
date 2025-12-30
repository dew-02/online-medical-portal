<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Medical Tests</title>
    <link rel="stylesheet" type="text/css" href="css/adminallpage.css"> 
</head>
<body>
    <div class="container">
        <header class="admin-header">
            <h1>Admin Dashboard</h1>
            <button id="dashboardBtn" onclick="window.location.href='admin.php'">Back to Dashboard</button>
            <button id="logoutBtn">Logout</button>
        </header>
        
        <h2>Manage Medical Test Bookings</h2>

        <?php
       
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
            $sql = "DELETE FROM testbookings WHERE id = '$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record deleted successfully.');</script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        // Update logic
        if (isset($_POST['update'])) {
            $id = $conn->real_escape_string($_POST['id']);
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $phone = $conn->real_escape_string($_POST['phone']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $dob = $conn->real_escape_string($_POST['dob']);
            $testType = $conn->real_escape_string($_POST['test_type']);
            $preferredDate = $conn->real_escape_string($_POST['preferred_date']);

            $sql = "UPDATE testbookings SET 
                    name='$name', 
                    email='$email', 
                    phone='$phone', 
                    gender='$gender', 
                    dob='$dob', 
                    test_type='$testType', 
                    preferred_date='$preferredDate' 
                    WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record updated successfully.');</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Fetch all test booking records
        $sql = "SELECT * FROM testbookings";
        $result = $conn->query($sql);
        ?>

        <!-- Display test bookings -->
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Test Type</th>
                    <th>Preferred Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['phone']); ?></td>
                        <td><?= htmlspecialchars($row['gender']); ?></td>
                        <td><?= htmlspecialchars($row['dob']); ?></td>
                        <td><?= htmlspecialchars($row['test_type']); ?></td>
                        <td><?= htmlspecialchars($row['preferred_date']); ?></td>
                        <td>
                            <button onclick="showUpdateForm('<?= htmlspecialchars($row['id']); ?>', '<?= htmlspecialchars($row['name']); ?>', '<?= htmlspecialchars($row['email']); ?>', '<?= htmlspecialchars($row['phone']); ?>', '<?= htmlspecialchars($row['gender']); ?>', '<?= htmlspecialchars($row['dob']); ?>', '<?= htmlspecialchars($row['test_type']); ?>', '<?= htmlspecialchars($row['preferred_date']); ?>')">Update</button>
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
        <h2>Update Test Booking</h2>
        <form method="POST">
            <input type="hidden" id="id" name="id">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="test_type">Test Type:</label>
            <input type="text" id="test_type" name="test_type" required>

            <label for="preferred_date">Preferred Date:</label>
            <input type="date" id="preferred_date" name="preferred_date" required>

            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <script>
        function showUpdateForm(id, name, email, phone, gender, dob, testType, preferredDate) {
            document.getElementById('id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            document.getElementById('phone').value = phone;
            document.getElementById('gender').value = gender;
            document.getElementById('dob').value = dob;
            document.getElementById('test_type').value = testType;
            document.getElementById('preferred_date').value = preferredDate;
            document.getElementById('updateForm').style.display = 'block';
        }
    </script>

    <script src="js/admin.js"></script>
    <footer class="admin-footer">
            <p>&copy; 2024 Medical Portal. All rights reserved.</p>
        </footer>
</body>
</html>
