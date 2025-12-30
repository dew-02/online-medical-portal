<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <link rel="stylesheet" type="text/css" href="css/confirmtest.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_medical_portal";

   
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Initialize variables for booking details
    $bookingDetails = [];

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $testType = $_POST['testType'];
        $preferredDate = $_POST['date'];

        
        $stmt = $conn->prepare("INSERT INTO testbookings (name, email, phone, gender, dob, test_type, preferred_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $email, $phone, $gender, $dob, $testType, $preferredDate);

        if ($stmt->execute()) {
            echo "<br><center><h1>Data received and saved successfully</h1><center>";
        } else {
            echo "<p>Failed to save data: " . $stmt->error . "</p>";
        }
    
        $stmt->close();

        // Fetch the booking details to display
        if (isset($_GET['id_number'])) {
            $id_number = $_GET['id_number'];
            $stmt = $conn->prepare("SELECT * FROM testbookings WHERE id = ?");
            $stmt->bind_param("i", $bookingId);
            $stmt->execute();
            $result = $stmt->get_result();
            $bookingDetails = $result->fetch_assoc();
            $stmt->close();
        }
    }

    // Fetch the last booking entry
    $result = $conn->query("SELECT * FROM testbookings ORDER BY id DESC LIMIT 1");
    if ($result && $result->num_rows > 0) {
        $bookingDetails = $result->fetch_assoc();
    }

    // Handle form submission for update or delete
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $id = $_POST['id'];
        if ($_POST['action'] === 'update') {
            // Update booking
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $testType = $_POST['testType'];
            $preferredDate = $_POST['preferredDate'];

            $stmt = $conn->prepare("UPDATE testbookings SET name=?, email=?, phone=?, gender=?, dob=?, test_type=?, preferred_date=? WHERE id=?");
            $stmt->bind_param("sssssssi", $name, $email, $phone, $gender, $dob, $testType, $preferredDate, $id);
            
            if ($stmt->execute()) {
                echo "<br><center><h1>Booking updated successfully!</h1></center>";
                echo "<center><h2>Please refresh the page!</h2></center>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } elseif ($_POST['action'] === 'delete') {
            // Delete booking
            $stmt = $conn->prepare("DELETE FROM testbookings WHERE id=?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                echo "<script>
                alert('Booking deleted successfully');
                window.location.href = 'booktest.php';
                </script>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
            $conn->close();
            exit; // Stop further execution
        }
    }
    ?>

    <div class="container">
        <h1>Confirm Booking Details</h1>
        <div class="details">
            <form id="bookingDetailsForm" method="POST">
                <input type="hidden" name="id" value="<?php echo isset($bookingDetails['id']) ? $bookingDetails['id'] : ''; ?>">
                
                <div class="form-group">
                    <div class="input-container">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?php echo isset($bookingDetails['name']) ? htmlspecialchars($bookingDetails['name']) : ''; ?>" required>
                    </div>
                    <div class="input-container">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo isset($bookingDetails['email']) ? htmlspecialchars($bookingDetails['email']) : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <label for="phone">Phone:</label>
                        <input type="tel" name="phone" id="phone" value="<?php echo isset($bookingDetails['phone']) ? htmlspecialchars($bookingDetails['phone']) : ''; ?>" required>
                    </div>
                    <div class="input-container">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" required>
                            <option value="">--Select--</option>
                            <option value="male" <?php echo (isset($bookingDetails['gender']) && $bookingDetails['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo (isset($bookingDetails['gender']) && $bookingDetails['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
                            <option value="other" <?php echo (isset($bookingDetails['gender']) && $bookingDetails['gender'] === 'other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" id="dob" value="<?php echo isset($bookingDetails['dob']) ? htmlspecialchars($bookingDetails['dob']) : ''; ?>" required>
                    </div>
                    <div class="input-container">
                        <label for="testType">Test Type:</label>
                        <select name="testType" id="testType" required>
                            <option value="">--Select--</option>
                            <option value="blood_test" <?php echo (isset($bookingDetails['test_type']) && $bookingDetails['test_type'] === 'blood_test') ? 'selected' : ''; ?>>Blood Test</option>
                            <option value="xray" <?php echo (isset($bookingDetails['test_type']) && $bookingDetails['test_type'] === 'xray') ? 'selected' : ''; ?>>X-Ray</option>
                            <option value="mri" <?php echo (isset($bookingDetails['test_type']) && $bookingDetails['test_type'] === 'mri') ? 'selected' : ''; ?>>MRI</option>
                            <option value="urine_test" <?php echo (isset($bookingDetails['test_type']) && $bookingDetails['test_type'] === 'urine_test') ? 'selected' : ''; ?>>Urine Test</option>
                            <option value="covid_test" <?php echo (isset($bookingDetails['test_type']) && $bookingDetails['test_type'] === 'covid_test') ? 'selected' : ''; ?>>COVID-19 Test</option>
                            <option value="cholesterol_test" <?php echo (isset($bookingDetails['test_type']) && $bookingDetails['test_type'] === 'cholesterol_test') ? 'selected' : ''; ?>>Cholesterol Test</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container">
                        <label for="preferredDate">Preferred Date:</label>
                        <input type="date" name="preferredDate" id="preferredDate" value="<?php echo isset($bookingDetails['preferred_date']) ? htmlspecialchars($bookingDetails['preferred_date']) : ''; ?>" required>
                    </div>
                </div>

                <div class="button-actions">
                    <button type="submit" name="action" value="update" class="update-btn">Update</button>
                    <button type="submit" name="action" value="delete" class="delete-btn">Delete</button>
                    <button type="button" name="confirm" class="confirm">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/confirmtest.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
