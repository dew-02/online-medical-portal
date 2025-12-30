<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <link rel="stylesheet" type="text/css" href="css/patient.css">
    <!--internal css-->
    <style>
        h2 {
            font-size: 1.75em;
            color: #0056b3;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <form action="patientprocess.php" method="POST">
            <div class="form-sections">
                <section class="section patient-details">
                    <h2>01. Patient Details</h2>
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last_name" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="birth-date">Birth Date</label>
                        <input type="date" id="birth-date" name="birth_date" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radio-group">
                            <input type="radio" id="male" name="gender" value="male" required>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                        <label for="id-number">ID number</label>
                        <input type="text" id="id-number" name="id_number" placeholder="ID number" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="City" required>
                    </div>
                </section>
                <section class="section doctor-details">
                    <h2>02. Doctor Details</h2>
                    <div class="form-group">
                        <label for="doctor-name">Doctor Name</label>
                        <select id="doctor-name" name="doctor_name" required>
                            <option value="Dr. John Doe">Dr. John Doe</option>
                            <option value="Dr. Sophia Clark">Dr. Sophia Clark</option>
                            <option value="Dr. Olivia Martinez">Dr. Olivia Martinez</option>
                            <option value="Dr. Michael Brown">Dr. Michael Brown</option>
                            <option value="Dr. Emma Johnson">Dr. Emma Johnson</option>
                            <option value="Dr. Alice Carter">Dr. Alice Carter</option>
                            <option value="Dr. James Davis">Dr. James Davis</option>
                            <option value="Dr. Daniel Lee">Dr. Daniel Lee</option>
                            <option value="Dr. William Harris">Dr. William Harris</option>
                            <option value="Dr. Laura Wilson">Dr. Laura Wilson</option>
                            <option value="Dr. Oliver Thompson">Dr. Oliver Thompson</option>
                            <option value="Dr. Robert Brown">Dr. Robert Brown</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="booking-date">Booking Date</label>
                        <input type="date" id="booking-date" name="booking_date" required>
                    </div>
                    <div class="form-group">
                        <label for="disease-type">Type of Disease</label>
                        <select id="disease-type" name="disease_type" required>
                            <option value="cardiovascular_diseases">Cardiovascular Diseases</option>
                            <option value="neurological_disorders">Neurological Disorders</option>
                            <option value="pediatric_conditions">Pediatric Conditions</option>
                            <option value="orthopedic_conditions">Orthopedic Conditions</option>
                            <option value="dermatological_conditions">Dermatological Conditions</option>
                            <option value="infectious_diseases">Infectious Diseases</option>
                            <option value="endocrine_disorders">Endocrine Disorders</option>
                            <option value="gastrointestinal_disorders">Gastrointestinal Disorders</option>
                            <option value="rheumatological_conditions">Rheumatological Conditions</option>
                            <option value="obstetric_gynecological_conditions">Obstetric and Gynecological Conditions</option>
                            <option value="pulmonary_diseases">Pulmonary Diseases</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="booking-time">Booking Time</label>
                        <select id="booking-time" name="booking_time" required>
                            <option value="8-9am">8:00 am to 9:00 am</option>
                            <option value="9-10am">9:00 am to 10:00 am</option>
                            <option value="10-11am">10:00 am to 11:00 am</option>
                            <option value="11-12pm">11:00 am to 12:00 pm</option>
                            <option value="12-1pm">12:00 pm to 1:00 pm</option>
                            <option value="1-2pm">1:00 pm to 2:00 pm</option>
                            <option value="2-3pm">2:00 pm to 3:00 pm</option>
                            <option value="3-4pm">3:00 pm to 4:00 pm</option>
                            <option value="4-5pm">4:00 pm to 5:00 pm</option>
                            <option value="5-6pm">5:00 pm to 6:00 pm</option>
                        </select>
                    </div>
                    
                    <div class="button-summary">
                        <div class="button-actions">
                            <button type="button" class="backbtn">Back</button>
                            <button type="submit" name="submit" class="checkout-btn">Submit</button>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
    <script src="js/patient.js"></script> 
</body>
</html>
