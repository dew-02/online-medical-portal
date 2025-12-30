<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) { // Change to user_email
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit(); // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Report</title>
    <link rel="stylesheet" type="text/css" href="css/downlodReport.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <h1>Submit Report Information</h1>
    <form action="confirmdownlod.php" method="post" class="contact-form">
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

        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile" required>

        <label for="report_type">Type of Report:</label>
        <select id="report_type" name="report_type" required>
            <option value="X-Ray">X-Ray</option>
            <option value="Blood Test">Blood Test</option>
            <option value="MRI Scan">MRI Scan</option>
            <option value="CT Scan">CT Scan</option>
            <option value="Ultrasound">Ultrasound</option>
            <option value="Blood Pressure">Blood Pressure</option>
            <option value="Cholesterol Test">Cholesterol Test</option>
        </select>

        <button type="button" class="back-button" onclick="window.history.back();">Back</button>
        <button type="submit">Submit Report</button>
    </form>
</div>

<script src="js/downlodReport.js"></script>
<?php include 'footer.php'; ?>    
</body>
</html>
