<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Report</title>
    <link rel="stylesheet" href="css/confirmtest.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_medical_portal";

 
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Initialize success message
    $successMessage = '';

    // Handle form submission for update or delete
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action'])) {
            $id = $_POST['report_id'];

            if ($_POST['action'] === 'update') {
                // Update report
                $patient_id = $_POST['patient_id'];
                $full_name = $_POST['full_name'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $report_type = $_POST['report_type'];

                $stmt = $conn->prepare("UPDATE reports SET patient_id=?, full_name=?, gender=?, email=?, mobile=?, report_type=? WHERE id=?");
                $stmt->bind_param("isssssi", $patient_id, $full_name, $gender, $email, $mobile, $report_type, $id);

                if ($stmt->execute()) {
                    $successMessage = "Data updated successfully!";

                    // Fetch updated data after update
                    $stmt = $conn->prepare("SELECT * FROM reports WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $reportDetails = $result->fetch_assoc();
                    $stmt->close();
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }
            } elseif ($_POST['action'] === 'delete') {
                // Delete report
                $stmt = $conn->prepare("DELETE FROM reports WHERE id=?");
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    $successMessage = "Data deleted successfully!";
                    
                   
                    echo "<script>alert('Delete successful!'); window.location.href = 'home.php';</script>";
                    exit();
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }
            }
        }
    }

    // Fetch report details if coming from the submission form
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action'])) {
        $patient_id = $_POST['patient_id'];
        $full_name = $_POST['full_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $report_type = $_POST['report_type'];

        // Prepare and bind for insertion
        $stmt = $conn->prepare("INSERT INTO reports (patient_id, full_name, gender, email, mobile, report_type) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $patient_id, $full_name, $gender, $email, $mobile, $report_type);

        if ($stmt->execute()) {
            $reportId = $stmt->insert_id; // Get the last inserted ID
            $stmt->close();

            // Fetch the report details to display
            $stmt = $conn->prepare("SELECT * FROM reports WHERE id = ?");
            $stmt->bind_param("i", $reportId);
            $stmt->execute();
            $result = $stmt->get_result();
            $reportDetails = $result->fetch_assoc();
            $stmt->close();
        } else {
            die("Error: " . $stmt->error);
        }
    }
    $conn->close(); // Close connection here after all operations
    ?>

    <div class="container">
        <h1>Confirm Report Submission</h1>
        <?php if ($successMessage): ?>
            <p><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <form id="reportDetailsForm" method="POST">
            <input type="hidden" name="report_id" value="<?php echo isset($reportId) ? htmlspecialchars($reportId) : (isset($reportDetails['id']) ? htmlspecialchars($reportDetails['id']) : ''); ?>">
            <div class="form-group">
                <label>Patient ID:</label>
                <input type="text" name="patient_id" value="<?php echo isset($reportDetails['patient_id']) ? htmlspecialchars($reportDetails['patient_id']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="full_name" value="<?php echo isset($reportDetails['full_name']) ? htmlspecialchars($reportDetails['full_name']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <select name="gender" required>
                    <option value="">--Select--</option>
                    <option value="Male" <?php echo (isset($reportDetails['gender']) && $reportDetails['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo (isset($reportDetails['gender']) && $reportDetails['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo (isset($reportDetails['gender']) && $reportDetails['gender'] === 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo isset($reportDetails['email']) ? htmlspecialchars($reportDetails['email']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Mobile Number:</label>
                <input type="text" name="mobile" value="<?php echo isset($reportDetails['mobile']) ? htmlspecialchars($reportDetails['mobile']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Type of Report:</label>
                <select name="report_type" required>
                    <option value="">--Select--</option>
                    <option value="X-Ray" <?php echo (isset($reportDetails['report_type']) && $reportDetails['report_type'] === 'X-Ray') ? 'selected' : ''; ?>>X-Ray</option>
                    <option value="Blood Test" <?php echo (isset($reportDetails['report_type']) && $reportDetails['report_type'] === 'Blood Test') ? 'selected' : ''; ?>>Blood Test</option>
                    <option value="MRI Scan" <?php echo (isset($reportDetails['report_type']) && $reportDetails['report_type'] === 'MRI Scan') ? 'selected' : ''; ?>>MRI Scan</option>
                    <option value="CT Scan" <?php echo (isset($reportDetails['report_type']) && $reportDetails['report_type'] === 'CT Scan') ? 'selected' : ''; ?>>CT Scan</option>
                    <option value="Ultrasound" <?php echo (isset($reportDetails['report_type']) && $reportDetails['report_type'] === 'Ultrasound') ? 'selected' : ''; ?>>Ultrasound</option>
                    <option value="Blood Pressure" <?php echo (isset($reportDetails['report_type']) && $reportDetails['report_type'] === 'Blood Pressure') ? 'selected' : ''; ?>>Blood Pressure</option>
                    <option value="Cholesterol Test" <?php echo (isset($reportDetails['report_type']) && $reportDetails['report_type'] === 'Cholesterol Test') ? 'selected' : ''; ?>>Cholesterol Test</option>
                </select>
            </div>
            <div class="button-group">
                <button type="submit" name="action" value="update" class="update" style="background-color: green; color: white;">Update</button>
                <button type="submit" name="action" value="delete" class="delete" style="background-color: green; color: white;">Delete</button>
                <button type="button" name="confirm" class="confirm" style="background-color: green; color: white;">Check Out</button>
            </div>
        </form>
    </div>

    <script src="js/confirmdownlod.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
