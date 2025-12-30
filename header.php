<?php
// Check if a session is already active before starting a new one
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_medical_portal";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variable for user first name
$fname = '';

// Check if user is logged in
if (isset($_SESSION['user_email'])) {
    // Fetch user first name from the database
    $user_email = $_SESSION['user_email'];
    $stmt = $conn->prepare("SELECT fname FROM users WHERE email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $fname = htmlspecialchars($user['fname']); // User's first name
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Care</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="images/logo.jpg" alt="Medical Care Logo">
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Channeling</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
            <div class="auth-button">
                <?php if (isset($_SESSION['user_email'])): ?>
                    <span class="welcome-message">Welcome back, <?php echo $fname; ?></span>
                    <a href="profile.php" class="profile-logo">
                        <i class="fas fa-user-circle profile-icon"></i> 
                    </a>
                    <a href="?logout=true" class="btn-logout">Logout</a>
                <?php else: ?>
                    <a href="register.php" class="btn-login-register">Login/Register</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <?php
    // Handle logout
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: login.php"); // Redirect to login page after logout
        exit();
    }
    ?>
    <script src="js/header.js"></script>
</body>
</html>
