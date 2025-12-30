<?php
// Start the session
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
    <title>Upload Your Prescription</title>
    <link rel="stylesheet" type="text/css" href="css/pharmacy.css">
</head>
<body>
<?php include 'header.php'; ?>
<h2>Upload Your Prescription</h2>
<div class="main-container">
    <div class="form-container">
        <div class="form-card">
            <form action="order.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fileInput">
                        <i class="icon-upload"></i> Choose an image:
                    </label>
                    <input type="file" id="fileInput" name="fileToUpload" accept="image/*" required>
                    <img id="preview" src="#" alt="Image Preview" style="display:none;">
                </div>
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>
                <div class="form-group">
                    <label for="gmail">Gmail:</label>
                    <input type="email" id="gmail" name="gmail" required>
                </div>
                <div class="form-group">
                    <label for="telephoneNumber">Telephone Number:</label>
                    <input type="tel" id="telephoneNumber" name="telephoneNumber" required>
                </div>
                <div class="form-group">
                    <label for="nic">NIC:</label>
                    <input type="text" id="nic" name="nic" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                <div class="form-buttons">
                     <input type="submit" name="submit" value="Submit">
                    <input type="button" value="Cancel" id="cancelButton">
                </div>
            </form>
        </div>
    </div>
    <div class="image-container">
        <img src="images/pharmacy.jpg" alt="Prescription Image">
        <img src="images/cover5.jpg" alt="Prescription Image">
    </div>
</div>

<script src="js/pharmacy.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
