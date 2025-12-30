<?php
// Include database connection
include 'loginConfig.php';

// Function to handle admin registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin'])) {
    // Sanitize and retrieve form data
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pass = htmlspecialchars(trim($_POST['password']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $city = htmlspecialchars(trim($_POST['city']));

    // Basic validation
    if (empty($full_name) || empty($email) || empty($pass) || empty($gender) || empty($phone) || empty($city)) {
        echo "<script>alert('Please fill all fields.'); window.history.back();</script>";
        exit();
    }

    // Validate email domain
    if (!preg_match('/@medicare\.my\.lk$/', $email)) {
        echo "<script>alert('Email must be from the @medicare.my.lk domain.'); window.history.back();</script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Insert new admin into the database
    $query = "INSERT INTO admin (full_name, email, password, gender, phone, city) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $full_name, $email, $hashed_password, $gender, $phone, $city);

    if ($stmt->execute()) {
        echo "<script>alert('New admin added successfully.'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Error adding admin. Please try again.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Medical Portal</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       /* Search bar styles */
.search-bar {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.search {
    width: 400px;
    padding: 10px;
    border-radius: 5px 0 0 5px; /* Rounded left side */
    border: 1px solid #ccc; /* Light border */
    font-size: 1em;
}

.search-button {
    padding: 10px 15px;
    border: none;
    background-color: #5bc0de; /* Light blue button */
    color: white;
    border-radius: 0 5px 5px 0; /* Rounded right side */
    cursor: pointer;
    transition: background-color 0.3s;
}

.search-button:hover {
    background-color: #31b0d5; /* Darker blue on hover */
}
    </style>
</head>
<body>
    <div class="container">
        <header class="admin-header">
            <div class="header-content">
            <img src="images/logo.jpg" id="logo" alt="Logo" style="width: 100px;"> <!-- Inline CSS for logo size -->
                <h1>Admin Dashboard</h1>
                <button id="logoutBtn">Logout</button>
            </div>
        </header>

        <div class="search-bar">
            <input type="text" class="search" placeholder="Search here..." />
            <button id="searchBtn" class="search-button"><i class="fas fa-search"></i></button>
        </div>

        <main class="admin-content">
            <section id="dashboard">
                <h2>Welcome, Admin</h2>
                <p>Select an option from the menu to manage the portal.</p>
            </section>

            <div class="button-container">
                <button id="pharmacy" class="menu-button">Pharmacy</button>
                <button id="doctor_channeling" class="menu-button">Doctor Channeling</button>
                <button id="download_report" class="menu-button">Download Report</button>
                <button id="test_booking" class="menu-button">Test Booking</button>
                <button id="users_login" class="menu-button">Manage Users</button>
                <button id="admin_login" class="menu-button">Manage Admin</button>
            </div>

            <section id="add-admin">
                <h2>Add New Admin</h2>
                <form method="POST" action="">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>

                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>

                    <button type="submit" name="add_admin">Add Admin</button>
                </form>
            </section>
        </main>

        <footer class="admin-footer">
            <p>&copy; 2024 Medical Portal. All rights reserved.</p>
        </footer>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>
