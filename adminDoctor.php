<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Doctor Dashboard - Manage Appointments</title>
    <link rel="stylesheet" type="text/css" href="css/adminallpage.css"> 
</head>
<body>
    <div class="container">
        <header class="admin-header">
            <h1>Admin Dashboard</h1>
            <button id="dashboardBtn" onclick="window.location.href='admin.php'">Back to Dashboard</button>
            <button id="logoutBtn">Logout</button>
        </header>
        
        <h2>Manage Appointments</h2>

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
            $id_number = $conn->real_escape_string($_POST['id_number']);
            $sql = "DELETE FROM patient_appointments WHERE id_number = '$id_number'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record deleted successfully.');</script>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        // Update logic
        if (isset($_POST['update'])) {
            $id_number = $conn->real_escape_string($_POST['id_number']);
            $first_name = $conn->real_escape_string($_POST['first_name']);
            $last_name = $conn->real_escape_string($_POST['last_name']);
            $birth_date = $conn->real_escape_string($_POST['birth_date']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $email = $conn->real_escape_string($_POST['email']);
            $phone = $conn->real_escape_string($_POST['phone']);
            $city = $conn->real_escape_string($_POST['city']);
            $doctor_name = $conn->real_escape_string($_POST['doctor_name']); 
            $booking_date = $conn->real_escape_string($_POST['booking_date']);
            $disease_type = $conn->real_escape_string($_POST['disease_type']);
            $booking_time = $conn->real_escape_string($_POST['booking_time']);

            $sql = "UPDATE patient_appointments SET 
                    first_name='$first_name', 
                    last_name='$last_name', 
                    birth_date='$birth_date', 
                    gender='$gender', 
                    email='$email', 
                    phone='$phone', 
                    city='$city',
                    doctor_name='$doctor_name',  
                    booking_date='$booking_date', 
                    disease_type='$disease_type', 
                    booking_time='$booking_time' 
                    WHERE id_number='$id_number'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record updated successfully.');</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Fetch all appointment records
        $sql = "SELECT * FROM patient_appointments";
        $result = $conn->query($sql);
        ?>

        <!-- Display appointments -->
        <table border="1">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>ID Number</th>
                    <th>City</th>
                    <th>Doctor Name</th> 
                    <th>Booking Date</th>
                    <th>Disease Type</th>
                    <th>Booking Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['first_name']); ?></td>
                        <td><?= htmlspecialchars($row['last_name']); ?></td>
                        <td><?= htmlspecialchars($row['birth_date']); ?></td>
                        <td><?= htmlspecialchars($row['gender']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['phone']); ?></td>
                        <td><?= htmlspecialchars($row['id_number']); ?></td>
                        <td><?= htmlspecialchars($row['city']); ?></td>
                        <td><?= htmlspecialchars($row['doctor_name']); ?></td>
                        <td><?= htmlspecialchars($row['booking_date']); ?></td>
                        <td><?= htmlspecialchars($row['disease_type']); ?></td>
                        <td><?= htmlspecialchars($row['booking_time']); ?></td>
                        <td>
                            <button onclick="showUpdateForm('<?= htmlspecialchars($row['id_number']); ?>', '<?= htmlspecialchars($row['first_name']); ?>', '<?= htmlspecialchars($row['last_name']); ?>', '<?= htmlspecialchars($row['birth_date']); ?>', '<?= htmlspecialchars($row['gender']); ?>', '<?= htmlspecialchars($row['email']); ?>', '<?= htmlspecialchars($row['phone']); ?>', '<?= htmlspecialchars($row['city']); ?>', '<?= htmlspecialchars($row['doctor_name']); ?>', '<?= htmlspecialchars($row['booking_date']); ?>', '<?= htmlspecialchars($row['disease_type']); ?>', '<?= htmlspecialchars($row['booking_time']); ?>')">Update</button>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id_number" value="<?= htmlspecialchars($row['id_number']); ?>">
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="13">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Update Form -->
    <div class="form-container" id="updateForm" style="display:none;">
        <h2>Update Appointment</h2>
        <form method="POST">
            <input type="hidden" id="id_number" name="id_number">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="doctor_name">Doctor Name:</label> 
            <input type="text" id="doctor_name" name="doctor_name" required>

            <label for="booking_date">Booking Date:</label>
            <input type="date" id="booking_date" name="booking_date" required>

            <label for="disease_type">Disease Type:</label>
            <input type="text" id="disease_type" name="disease_type" required>

            <label for="booking_time">Booking Time:</label>
            <input type="time" id="booking_time" name="booking_time" required>

            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <script>
        function showUpdateForm(id_number, first_name, last_name, birth_date, gender, email, phone, city, doctor_name, booking_date, disease_type, booking_time) {
            document.getElementById('id_number').value = id_number;
            document.getElementById('first_name').value = first_name;
            document.getElementById('last_name').value = last_name;
            document.getElementById('birth_date').value = birth_date;
            document.getElementById('gender').value = gender;
            document.getElementById('email').value = email;
            document.getElementById('phone').value = phone;
            document.getElementById('city').value = city;
            document.getElementById('doctor_name').value = doctor_name; 
            document.getElementById('booking_date').value = booking_date;
            document.getElementById('disease_type').value = disease_type;
            document.getElementById('booking_time').value = booking_time;
            document.getElementById('updateForm').style.display = 'block';
        }
    </script>

    <script src="js/admin.js"></script>
    <footer class="admin-footer">
            <p>&copy; 2024 Medical Portal. All rights reserved.</p>
        </footer>
</body>
</html>
