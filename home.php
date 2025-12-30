<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Care - Home</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!--intenal css-->
    <style>
        p {
            margin-bottom: 20px;
            line-height: 1.6rem;
            font-size: 1rem;
        }
    </style>

</head>
<body>

   <section id="hero">
        <?php include 'header.php'; ?>
        <div class="hero-content">
            <div class="hero-text">
                <br>
                <h1>Feel Better About Finding HealthCare</h1>
                <p><b>Welcome to <b>Medical Care</b> online medical portal for expert medical advice and services.<br> Enjoy convenient virtual consultations and easy access to health resources, all from the <br>comfort of your home. Your well-being is our top priority.</b></p>
               
                <div class="hero-text-btns">
                    <a id="contactUsBtn" href="#">Contact Us</a>
                    <!--internal js part-->
                    <script>
                            const contactUsBtn = document.getElementById('contactUsBtn');
                            contactUsBtn.addEventListener('click', function(event) {
                            event.preventDefault(); 
                            alert('Our support hours are from 8:00 AM to 6:00 PM onwards daily. For any inquiries outside these hours, please email us at support@medicare.com.');
                            window.location.href = 'contactUs.php';
                            });
                    </script>

                    <a id="bookAppointmentBtn" href="#">Book Appointment</a>
                </div>
            </div>
            <div class="hero-img">
                <img src="images/main-bg.png" alt="cover_image">
            </div>
        </div>
    </section>

    <section class="options-section">
        <div class="options-header">
            <!--inline css-->
        <h2 style="font-size: 2.4rem; color: #122853; margin-bottom: 15px; font-family: 'Helvetica Neue', sans-serif;">Our Services</h2> 
        </div>
        <div class="options-container">
            <div class="option">
                <i class="fa-solid fa-pills"></i>
                <a id="buyMedicineBtn" class="nav-button" href="#">Buy Medicine</a>
            </div>
            <div class="option">
                <i class="fa-solid fa-calendar-plus"></i>
                <a id="bookAppointmentBtn" class="nav-button" href="#">Book Appointment</a>
            </div>
            <div class="option">
                <i class="fa-solid fa-vial"></i>
                <a id="bookTestBtn" class="nav-button" href="#">Book Medical Test</a>
            </div>
            <div class="option">
                <i class="fa-solid fa-file-pdf"></i>
                <a id="downloadReportBtn" class="nav-button" href="#">Download Reports</a>
            </div>
        </div>
    </section>
    <section class="about-us-section">
        <div class="about-us-content">
            <div class="about-us-image">
                <img src="images/medicover1.jpg" alt="About Us">
            </div>
            <div class="about-us-text">
                <h2>About Us</h2>
                <p>
                Welcome to Medical Care! We are dedicated to providing exceptional healthcare services that prioritize your well-being. Our experienced team of doctors and healthcare professionals is committed to delivering personalized care in a compassionate environment. With modern facilities and a focus on innovative treatment options, we strive to enhance your health and ensure a positive experience every step of the way. Experience the difference with Medical Care, where quality meets compassion.
                </p>
                <div class="about-us-stats">
                    <div class="stat">
                        <div class="stat-text">
                            <div class="stat-icon">👥</div>
                            <h3>250+</h3>
                            <p>Patients</p>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="stat-text">
                            <div class="stat-icon">🩺</div>
                            <h3>20+</h3>
                            <p>Doctors</p>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="stat-text">
                            <div class="stat-icon">🏥</div>
                            <h3>15+</h3>
                            <p>Branches</p>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="stat-text">
                            <div class="stat-icon">🏆</div>
                            <h3>50+</h3>
                            <p>Awards</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="medical-tests-section">
        <div class="medical-tests-content">
            <h2>Our Medical Tests</h2>
            <p>Explore our range of specialized medical tests designed to provide accurate and timely diagnostic insights. Our experienced team ensures that you receive the highest quality care and results.</p>
            <div class="medical-tests">
                <div class="test-card">
                    <div class="test-icon">🔬</div>
                    <h3>Forensic Pathology</h3>
                    <p>Involves the examination of tissues and organs to determine the cause of death or injury in legal cases.</p>
                </div>
                <div class="test-card">
                    <div class="test-icon">🧬</div>
                    <h3>Cytopathology</h3>
                    <p>Focuses on the study of individual cells to diagnose diseases, particularly cancers.</p>
                </div>
                <div class="test-card">
                    <div class="test-icon">🧪</div>
                    <h3>Molecular Pathology</h3>
                    <p>Uses molecular techniques to understand disease mechanisms and identify genetic mutations.</p>
                </div>
                <div class="test-card">
                    <div class="test-icon">🩺</div>
                    <h3>Clinical Pathology</h3>
                    <p>Involves analyzing blood and other bodily fluids to diagnose and manage diseases.</p>
                </div>
                <div class="test-card">
                    <div class="test-icon">🔍</div>
                    <h3>Histopathology</h3>
                    <p>Studies tissue samples to diagnose disease and assess disease severity through microscopic examination.</p>
                </div>
            </div>
        </div>
    </section>
<section class="cover-section">
    <div class="cover-image">
        <img src="images/coverimage1.png" alt="cover image">
    </div>
    <div class="cover-overlay">
        <div class="cover-content">
            <h2> Experience Modern Healthcare at Its Finest</h2>
            <p>Join our community and discover personalized care, cutting-edge technology, and compassionate service.</p>
            <a href="#" id="joinNowBtn" class="cover-btn">Join Now</a>
        </div>
    </div>
</section>
    <script src="js/home.js"></script><!--external js part-->
    <?php include 'footer.php'; ?>
</body>
</html>
