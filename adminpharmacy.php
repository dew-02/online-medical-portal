<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pharmacy Dashboard - Medical Portal</title>
    <link rel="stylesheet" type="text/css" href="css/adminallpage.css">
</head>
<body>
    <div class="container">
        <header class="admin-header">
            <h1>Admin Dashboard</h1>
            <button id="dashboardBtn" onclick="window.location.href='admin.php'">Back to Dashboard</button>
            <button id="logoutBtn">Logout</button>
        </header>
        
        <h2>Manage Prescriptions</h2>
        
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
            $sql = "DELETE FROM prescriptions WHERE id = '$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record deleted successfully.');</script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        // Update logic
        if (isset($_POST['update'])) {
            $id = $conn->real_escape_string($_POST['id']);
            $fullName = $conn->real_escape_string($_POST['fullName']);
            $gmail = $conn->real_escape_string($_POST['gmail']);
            $telephoneNumber = $conn->real_escape_string($_POST['telephoneNumber']);
            $nic = $conn->real_escape_string($_POST['nic']);
            $address = $conn->real_escape_string($_POST['address']);
            
            $sql = "UPDATE prescriptions SET fullName='$fullName', gmail='$gmail', telephoneNumber='$telephoneNumber', nic='$nic', address='$address' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record updated successfully.');</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Fetch all prescription records
        $sql = "SELECT * FROM prescriptions";
        $result = $conn->query($sql);
        ?>

        <!-- Display prescriptions -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['fullName']; ?></td>
                        <td><?= $row['gmail']; ?></td>
                        <td><?= $row['telephoneNumber']; ?></td>
                        <td><?= $row['nic']; ?></td>
                        <td><?= $row['address']; ?></td>
                        <td><a href="<?= $row['filePath']; ?>" target="_blank">View File</a></td>
                        <td>
                            <button onclick="showUpdateForm(<?= $row['id']; ?>, '<?= $row['fullName']; ?>', '<?= $row['gmail']; ?>', '<?= $row['telephoneNumber']; ?>', '<?= $row['nic']; ?>', '<?= $row['address']; ?>')">Update</button>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
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
        <h2>Update Prescription</h2>
        <form method="POST">
            <input type="hidden" id="id" name="id">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>
            
            <label for="gmail">Email:</label>
            <input type="email" id="gmail" name="gmail" required>

            <label for="telephoneNumber">Telephone Number:</label>
            <input type="tel" id="telephoneNumber" name="telephoneNumber" required>

            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <script>
        function showUpdateForm(id, fullName, gmail, telephoneNumber, nic, address) {
            document.getElementById('id').value = id;
            document.getElementById('fullName').value = fullName;
            document.getElementById('gmail').value = gmail;
            document.getElementById('telephoneNumber').value = telephoneNumber;
            document.getElementById('nic').value = nic;
            document.getElementById('address').value = address;
            document.getElementById('updateForm').style.display = 'block';
        }
    </script>

    <script src="js/admin.js"></script>
    <footer class="admin-footer">
            <p>&copy; 2024 Medical Portal. All rights reserved.</p>
        </footer>
</body>
</html>

<?php
$conn->close();
?>
