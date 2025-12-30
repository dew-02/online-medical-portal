<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/contactUs.css">
    <title>Contact Us - Medical Care</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="contact-container">
    <h1>Contact Us</h1>
    <p>If you have any questions, feel free to reach out to us using the form below or via the contact information provided.</p>

    <div class="contact-section">
        <div class="contact-info">
            <div class="info-item">
                <i class="fas fa-phone-alt icon"></i>
                <div class="info-text">
                    <h2>Phone</h2>
                    <p>Call us <strong>+94-234567890</strong>.</p>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-envelope icon"></i>
                <div class="info-text">
                    <h2>Email</h2>
                    <p>For inquiries, email us at <a href="mailto:support@medicare.com">support@medicare.com</a>.</p>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-map-marker-alt icon"></i>
                <div class="info-text">
                    <h2>Address</h2>
                    <p>Visit us at <strong>No.456 Wellness Avenue, Colombo 07, Sri Lanka</strong>.</p>
                </div>
            </div>
        </div>

        <form action="submitContact.php" method="post" class="contact-form">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
<script src="js\contactUs.js"></script>
</body>
</html>
