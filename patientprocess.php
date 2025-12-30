<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Details</title>
    <link rel="stylesheet" type="text/css" href="css/patientprocess.css">
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

    // Initialize an array to hold messages
    $messages = [];

    // Handling form submission to save data
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        // Collect data from POST request
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id_number = $_POST['id_number'];
        $city = $_POST['city'];
        $doctor_name = $_POST['doctor_name'];
        $booking_date = $_POST['booking_date'];
        $disease_type = $_POST['disease_type'];
        $booking_time = $_POST['booking_time'];

       // Insert data into the database
       $stmt = $conn->prepare("INSERT INTO patient_appointments (first_name, last_name, birth_date, gender, email, phone, id_number, city, doctor_name, booking_date, disease_type, booking_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmt->bind_param("ssssssssssss", $first_name, $last_name, $birth_date, $gender, $email, $phone, $id_number, $city, $doctor_name, $booking_date, $disease_type, $booking_time);

       if ($stmt->execute()) {
        echo "<br><center><h1>Data received and saved successfully</h1><center>";
    } else {
        echo "<p>Failed to save data: " . $stmt->error . "</p>";
    }

    $stmt->close();
   }

    // Fetching the patient data if an ID number is provided
    if (isset($_GET['id_number'])) {
        $id_number = $_GET['id_number'];
        $stmt = $conn->prepare("SELECT * FROM patient_appointments WHERE id_number = ?");
        $stmt->bind_param("s", $id_number);
        $stmt->execute();
        $result = $stmt->get_result();
        $lastData = $result->fetch_assoc();
        $stmt->close();
    }
    // Handle form submission for update or delete
    if (isset($_POST['action'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id_number = $_POST['id_number'];
        $city = $_POST['city'];
        $doctor_name = $_POST['doctor_name'];
        $booking_date = $_POST['booking_date'];
        $disease_type = $_POST['disease_type'];
        $booking_time = $_POST['booking_time'];
    
        if ($_POST['action'] == 'update') {
            // Update logic
            $stmt = $conn->prepare("UPDATE patient_appointments SET first_name=?, last_name=?, birth_date=?, gender=?, email=?, phone=?, city=?, doctor_name=?, booking_date=?, disease_type=?, booking_time=? WHERE id_number=?");
            $stmt->bind_param("ssssssssssss", $first_name, $last_name, $birth_date, $gender, $email, $phone, $city, $doctor_name, $booking_date, $disease_type, $booking_time, $id_number);
            
            if ($stmt->execute()) {
                echo "<br><center><h1>Data updated successfully</h1></center>";
            } else {
                echo "<p>Failed to update data: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } elseif ($_POST['action'] == 'delete') {
            // Delete logic
            $stmt = $conn->prepare("DELETE FROM patient_appointments WHERE id_number=?");
            $stmt->bind_param("s", $id_number);
            
            if ($stmt->execute()) {
                echo "<script>
                alert('Data deleted successfully');
                window.location.href = 'patient.php'; // Redirect immediately
              </script>";
            } else {
                echo "<p>Failed to delete data: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } elseif ($_POST['action'] == 'checkout') {
            // Handle checkout logic
            header("Location: checkout.php");
            exit();
        }
    }
    
    // If no data is available
    if (!isset($lastData)) {
       
    }
     else {
        $first_name = $lastData['first_name'];
        $last_name = $lastData['last_name'];
        $birth_date = $lastData['birth_date'];
        $gender = $lastData['gender'];
        $email = $lastData['email'];
        $phone = $lastData['phone'];
        $city = $lastData['city'];
        $doctor_name = $lastData['doctor_name'];
        $booking_date = $lastData['booking_date'];
        $disease_type = $lastData['disease_type'];
        $booking_time = $lastData['booking_time'];
    }

    $conn->close();
    ?>

    <div class="container">
        <h1>Confirm Your Details</h1>
        <div class="details">
            <h2>01. Patient Details</h2>
            <form action="patientprocess.php" method="POST">
                <div class="details-row">
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
                    </div>
                    <div>
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
                    </div>
                    <div>
                        <label for="birth_date">Birth Date:</label>
                        <input type="date" name="birth_date" id="birth_date" value="<?php echo htmlspecialchars($birth_date); ?>">
                    </div>
                    <div>
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" required>
                            <option value="Male" <?php echo ($gender == "Male") ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($gender == "Female") ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo ($gender == "Other") ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div>
                        <label for="phone">Phone:</label>
                        <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>">
                    </div>
                    <div>
                        <label for="id_number">ID Number:</label>
                        <input type="text" name="id_number" id="id_number" value="<?php echo htmlspecialchars($id_number); ?>">
                    </div>
                    <div>
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($city); ?>">
                    </div>
                </div>
                <section class="section doctor-details">
                    <br><h2>02. Doctor Details</h2>
                    <div class="form-group">
                        <label for="doctor-name">Doctor Name</label>
                        <select id="doctor-name" name="doctor_name" required>
                            <option value="Dr. John Doe" <?php echo ($doctor_name == "Dr. John Doe") ? 'selected' : ''; ?>>Dr. John Doe</option>
                            <option value="Dr. Sophia Clark" <?php echo ($doctor_name == "Dr. Sophia Clark") ? 'selected' : ''; ?>>Dr. Sophia Clark</option>
                            <option value="Dr. Olivia Martinez" <?php echo ($doctor_name == "Dr. Olivia Martinez") ? 'selected' : ''; ?>>Dr. Olivia Martinez</option>
                            <option value="Dr. Michael Brown" <?php echo ($doctor_name == "Dr. Michael Brown") ? 'selected' : ''; ?>>Dr. Michael Brown</option>
                            <option value="Dr. Emma Johnson" <?php echo ($doctor_name == "Dr. Emma Johnson") ? 'selected' : ''; ?>>Dr. Emma Johnson</option>
                            <option value="Dr. Alice Carter" <?php echo ($doctor_name == "Dr. Alice Carter") ? 'selected' : ''; ?>>Dr. Alice Carter</option>
                            <option value="Dr. James Davis" <?php echo ($doctor_name == "Dr. James Davis") ? 'selected' : ''; ?>>Dr. James Davis</option>
                            <option value="Dr. Daniel Lee" <?php echo ($doctor_name == "Dr. Daniel Lee") ? 'selected' : ''; ?>>Dr. Daniel Lee</option>
                            <option value="Dr. William Harris" <?php echo ($doctor_name == "Dr. William Harris") ? 'selected' : ''; ?>>Dr. William Harris</option>
                            <option value="Dr. Laura Wilson" <?php echo ($doctor_name == "Dr. Laura Wilson") ? 'selected' : ''; ?>>Dr. Laura Wilson</option>
                            <option value="Dr. Oliver Thompson" <?php echo ($doctor_name == "Dr. Oliver Thompson") ? 'selected' : ''; ?>>Dr. Oliver Thompson</option>
                            <option value="Dr. Robert Brown" <?php echo ($doctor_name == "Dr. Robert Brown") ? 'selected' : ''; ?>>Dr. Robert Brown</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="booking-date">Booking Date</label>
                        <input type="date" id="booking-date" name="booking_date" value="<?php echo htmlspecialchars($booking_date); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="disease-type">Type of Disease</label>
                        <select id="disease-type" name="disease_type" required>
                            <option value="cardiovascular_diseases" <?php echo ($disease_type == "cardiovascular_diseases") ? 'selected' : ''; ?>>Cardiovascular Diseases</option>
                            <option value="neurological_disorders" <?php echo ($disease_type == "neurological_disorders") ? 'selected' : ''; ?>>Neurological Disorders</option>
                            <option value="pediatric_conditions" <?php echo ($disease_type == "pediatric_conditions") ? 'selected' : ''; ?>>Pediatric Conditions</option>
                            <option value="orthopedic_conditions" <?php echo ($disease_type == "orthopedic_conditions") ? 'selected' : ''; ?>>Orthopedic Conditions</option>
                            <option value="dermatological_conditions" <?php echo ($disease_type == "dermatological_conditions") ? 'selected' : ''; ?>>Dermatological Conditions</option>
                            <option value="infectious_diseases" <?php echo ($disease_type == "infectious_diseases") ? 'selected' : ''; ?>>Infectious Diseases</option>
                            <option value="endocrine_disorders" <?php echo ($disease_type == "endocrine_disorders") ? 'selected' : ''; ?>>Endocrine Disorders</option>
                            <option value="gastrointestinal_disorders" <?php echo ($disease_type == "gastrointestinal_disorders") ? 'selected' : ''; ?>>Gastrointestinal Disorders</option>
                            <option value="rheumatological_conditions" <?php echo ($disease_type == "rheumatological_conditions") ? 'selected' : ''; ?>>Rheumatological Conditions</option>
                            <option value="obstetric_gynecological_conditions" <?php echo ($disease_type == "obstetric_gynecological_conditions") ? 'selected' : ''; ?>>Obstetric and Gynecological Conditions</option>
                            <option value="pulmonary_diseases" <?php echo ($disease_type == "pulmonary_diseases") ? 'selected' : ''; ?>>Pulmonary Diseases</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="booking-time">Booking Time</label>
                        <select id="booking-time" name="booking_time" required>
                            <option value="8-9am" <?php echo ($booking_time == "8-9am") ? 'selected' : ''; ?>>8:00 am to 9:00 am</option>
                            <option value="9-10am" <?php echo ($booking_time == "9-10am") ? 'selected' : ''; ?>>9:00 am to 10:00 am</option>
                            <option value="10-11am" <?php echo ($booking_time == "10-11am") ? 'selected' : ''; ?>>10:00 am to 11:00 am</option>
                            <option value="11-12pm" <?php echo ($booking_time == "11-12pm") ? 'selected' : ''; ?>>11:00 am to 12:00 pm</option>
                            <option value="12-1pm" <?php echo ($booking_time == "12-1pm") ? 'selected' : ''; ?>>12:00 pm to 1:00 pm</option>
                            <option value="1-2pm" <?php echo ($booking_time == "1-2pm") ? 'selected' : ''; ?>>1:00 pm to 2:00 pm</option>
                            <option value="2-3pm" <?php echo ($booking_time == "2-3pm") ? 'selected' : ''; ?>>2:00 pm to 3:00 pm</option>
                            <option value="3-4pm" <?php echo ($booking_time == "3-4pm") ? 'selected' : ''; ?>>3:00 pm to 4:00 pm</option>
                            <option value="4-5pm" <?php echo ($booking_time == "4-5pm") ? 'selected' : ''; ?>>4:00 pm to 5:00 pm</option>
                            <option value="5-6pm" <?php echo ($booking_time == "5-6pm") ? 'selected' : ''; ?>>5:00 pm to 6:00 pm</option>
                        </select>
                    </div>
                </section>

                <div class="button-actions">
                    <button type="submit" name="action" value="update" class="update-btn">Update</button>
                    <button type="submit" name="action" value="delete" class="delete-btn">Delete</button>
                    <button type="button" name="confirm" class="confirm">Confirm</button>
                    <input type="hidden" name="id_number" value="<?php echo htmlspecialchars($id_number); ?>">
                </div>
            </form>
        </div>
    </div>
    <script src="js/patientprocess.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
