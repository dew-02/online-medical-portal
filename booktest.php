<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) { 
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
    <title>Test Booking</title>
    <link rel="stylesheet" href="css/booktest.css">
    <!--internal css part-->
    <script>
        h1 {
    font-size: 1.6em; /* Decreased size */
    color: #007bff;
    margin-bottom: 20px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
}
    </script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1>Book Your Test</h1>
        <form id="bookingForm" action="confirmtest.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">--Select--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="testType">Select Test Type</label>
                <select id="testType" name="testType" required>
                    <option value="">--Select--</option>
                    <option value="blood_test">Blood Test</option>
                    <option value="xray">X-Ray</option>
                    <option value="mri">MRI</option>
                    <option value="urine_test">Urine Test</option>
                    <option value="covid_test">COVID-19 Test</option>
                    <option value="cholesterol_test">Cholesterol Test</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Preferred Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="button-group">
                <button type="button" id="backBtn">Back</button>
                <!--internal js part-->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const backBtn = document.getElementById('backBtn');

                        // Handle Back button click
                        backBtn.addEventListener('click', function () {
                            const confirmBack = confirm("Are you sure you want to go to the home page?");
                            if (confirmBack) {
                                window.location.href = 'home.php'; // Redirect to home page
                            }
                        });
                    });
                </script>

                <!--inline css-->
                <button type="submit" id="submitBtn" style="padding: 10px; border: none; border-radius: 8px; font-size: 14px; font-weight: bold; cursor: pointer; background-color: #007bff; color: #fff; transition: background 0.3s ease, transform 0.3s ease; flex: 1; margin: 0 5px;">
                     Book Now
                </button>
            </div>
        </form>
    </div>

    <script src="js/booktest.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
