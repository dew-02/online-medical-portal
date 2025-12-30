<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Admins</title>
    <link rel="stylesheet" type="text/css" href="css/adminallpage.css"> 
</head>
<body>
    <div class="container">
        <header class="admin-header">
            <h1>Admin Dashboard</h1>
            <button id="dashboardBtn" onclick="window.location.href='admin.php'">Back to Dashboard</button>
            <button id="logoutBtn">Logout</button>
        </header>
        
        <h2>Manage Admins</h2>

        <?php
       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "online_medical_portal";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete logic for admins
        if (isset($_POST['delete'])) {
            $id = $conn->real_escape_string($_POST['id']);
            $sql = "DELETE FROM admin WHERE id = '$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Admin deleted successfully.');</script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        // Update logic for admins
        if (isset($_POST['update'])) {
            $id = $conn->real_escape_string($_POST['id']);
            $full_name = $conn->real_escape_string($_POST['full_name']);
            $email = $conn->real_escape_string($_POST['email']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $phone = $conn->real_escape_string($_POST['phone']);
            $city = $conn->real_escape_string($_POST['city']);

            // Update query 
            $sql = "UPDATE admin SET 
                    full_name='$full_name', 
                    email='$email', 
                    gender='$gender', 
                    phone='$phone', 
                    city='$city' 
                    WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Admin updated successfully.');</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Fetch all admin records
        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);
        ?>

        <!-- Display Admin details -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['full_name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['gender']); ?></td>
                        <td><?= htmlspecialchars($row['phone']); ?></td>
                        <td><?= htmlspecialchars($row['city']); ?></td>
                        <td>
                            <button onclick="showUpdateForm('<?= htmlspecialchars($row['id']); ?>', '<?= htmlspecialchars($row['full_name']); ?>', '<?= htmlspecialchars($row['email']); ?>', '<?= htmlspecialchars($row['gender']); ?>', '<?= htmlspecialchars($row['phone']); ?>', '<?= htmlspecialchars($row['city']); ?>')">Update</button>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7">No admin records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Update Form -->
    <div class="form-container" id="updateForm" style="display:none;">
        <h2>Update Admin</h2>
        <form method="POST">
            <input type="hidden" id="id" name="id">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <script>
        function showUpdateForm(id, full_name, email, gender, phone, city) {
            document.getElementById('id').value = id;
            document.getElementById('full_name').value = full_name;
            document.getElementById('email').value = email;
            document.getElementById('gender').value = gender;
            document.getElementById('phone').value = phone;
            document.getElementById('city').value = city;
            document.getElementById('updateForm').style.display = 'block';
        }
    </script>

    <script src="js/admin.js"></script>
    <footer class="admin-footer">
            <p>&copy; 2024 Medical Portal. All rights reserved.</p>
    </footer>
</body>
</html>
