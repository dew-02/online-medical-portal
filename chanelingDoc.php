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
    <title>Doctor Channeling</title>
    <link rel="stylesheet" type="text/css" href="css/chanelingDoc.css">
    <style>
        .header p {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="container">
        <div class="header">
            <h1>Our Doctor Panel</h1>
            <p>Select a doctor from below</p>
        </div>

        <div class="profile-card">
            <img src="images/doctor 1.png" alt="Dr. John Doe">
            <div class="profile-info">
                <h3>Dr. John Doe</h3>
                <p><strong>Education:</strong> MD in Cardiology from Harvard University</p>
                <p><strong>Specialization:</strong> Expert in Cardiology with over 15 years of experience.</p>
                <p><strong>Experience:</strong> Extensive experience in treating heart diseases and conducting advanced cardiac procedures.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 2.png" alt="Dr. Sophia Clark">
            <div class="profile-info">
                <h3>Dr. Sophia Clark</h3>
                <p><strong>Education:</strong> PhD in Neurology from Stanford University</p>
                <p><strong>Specialization:</strong> Renowned Neurologist specializing in brain disorders.</p>
                <p><strong>Experience:</strong> Skilled in diagnosing and treating complex neurological conditions.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 3.jpg" alt="Dr. Olivia Martinez">
            <div class="profile-info">
                <h3>Dr. Olivia Martinez</h3>
                <p><strong>Education:</strong> MD in Pediatrics from Johns Hopkins University</p>
                <p><strong>Specialization:</strong> Experienced in Pediatrics with a passion for child health.</p>
                <p><strong>Experience:</strong> Focused on preventive care and treatment of childhood diseases.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 4.png" alt="Dr. Michael Brown">
            <div class="profile-info">
                <h3>Dr. Michael Brown</h3>
                <p><strong>Education:</strong> MD in Orthopedics from Mayo Clinic</p>
                <p><strong>Specialization:</strong> Specialist in Orthopedics with advanced surgical skills.</p>
                <p><strong>Experience:</strong> Expertise in joint replacement and orthopedic trauma.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 5.jpg" alt="Dr. Emma Johnson">
            <div class="profile-info">
                <h3>Dr. Emma Johnson</h3>
                <p><strong>Education:</strong> MD in Dermatology from Cleveland Clinic</p>
                <p><strong>Specialization:</strong> Expert in Dermatology with a focus on skin conditions.</p>
                <p><strong>Experience:</strong> Provides treatments for acne, eczema, and skin cancer.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 6.jpg" alt="Dr. Alice Carter">
            <div class="profile-info">
                <h3>Dr. Alice Carter</h3>
                <p><strong>Education:</strong> MD in Cardiology from Mayo Clinic</p>
                <p><strong>Specialization:</strong> Cardiologist with experience in advanced heart treatments.</p>
                <p><strong>Experience:</strong> Skilled in managing chronic heart conditions and preventive cardiology.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 7.png" alt="Dr. James Davis">
            <div class="profile-info">
                <h3>Dr. James Davis</h3>
                <p><strong>Education:</strong> MD in Infectious Diseases from Johns Hopkins University</p>
                <p><strong>Specialization:</strong> Renowned for her work in Infectious Diseases.</p>
                <p><strong>Experience:</strong> Expert in managing and treating complex infectious diseases.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 8.jpg" alt="Dr. Daniel Lee">
            <div class="profile-info">
                <h3>Dr. Daniel Lee</h3>
                <p><strong>Education:</strong> MD in Endocrinology from Cleveland Clinic</p>
                <p><strong>Specialization:</strong> Highly skilled in Endocrinology with a focus on diabetes management.</p>
                <p><strong>Experience:</strong> Expertise in hormonal disorders and diabetes care.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 9.jpg" alt="Dr. William Harris">
            <div class="profile-info">
                <h3>Dr. William Harris</h3>
                <p><strong>Education:</strong> MD in Gastroenterology from Stanford University</p>
                <p><strong>Specialization:</strong> Expert in Gastroenterology with extensive experience in digestive health.</p>
                <p><strong>Experience:</strong> Specializes in treating gastrointestinal disorders and endoscopic procedures.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 10.jpg" alt="Dr. Laura Wilson">
            <div class="profile-info">
                <h3>Dr. Laura Wilson</h3>
                <p><strong>Education:</strong> MD in Rheumatology from Harvard University</p>
                <p><strong>Specialization:</strong> Specializes in Rheumatology with expertise in arthritis and autoimmune diseases.</p>
                <p><strong>Experience:</strong> Provides comprehensive care for inflammatory and autoimmune conditions.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 11.jpg" alt="Dr. Oliver Thompson">
            <div class="profile-info">
                <h3>Dr. Oliver Thompson</h3>
                <p><strong>Education:</strong> MD in Obstetrics and Gynecology from Mayo Clinic</p>
                <p><strong>Specialization:</strong> Expert in Obstetrics and Gynecology with a focus on women's health.</p>
                <p><strong>Experience:</strong> Skilled in prenatal care, gynecological surgeries, and women's health issues.</p>
            </div>
        </div>
        <div class="profile-card">
            <img src="images/doctor 12.jpg" alt="Dr. Robert Brown">
            <div class="profile-info">
                <h3>Dr. Robert Brown</h3>
                <p><strong>Education:</strong> MD in Pulmonology from Stanford University</p>
                <p><strong>Specialization:</strong> Specialist in Pulmonology with experience in respiratory diseases.</p>
                <p><strong>Experience:</strong> Expertise in treating conditions like asthma, COPD, and sleep apnea.</p>
            </div>
        </div>

        <div class="button-group">
            <button id="backButton">Back</button>
            <button id="nextButton">Next</button>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="js/chanelingDoc.js"></script>
</body>
</html>
