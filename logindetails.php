<?php

include 'loginConfig.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and retrieve form data
    $email = htmlspecialchars(trim($_POST['email']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    // Basic validation
    if (empty($email) || empty($pass)) {
        echo "<script>alert('Please fill all fields.'); window.history.back();</script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.history.back();</script>";
        exit();
    }

    // Check if email exists in the admin table
    $query = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch admin data
        $admin = $result->fetch_assoc();

        // Verify the password for admin
        if (password_verify($pass, $admin['password'])) {
            // If login is successful, start a session for admin
            session_start();
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_email'] = $admin['email'];
            echo "<script>alert('Admin login successful! Redirecting to admin panel.'); window.location.href = 'admin.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect admin password.'); window.history.back();</script>";
            exit();
        }
    }

    // Check if email exists in the users table
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<script>alert('Email does not exist in users.'); window.history.back();</script>";
        exit();
    }

    // Fetch user data
    $user = $result->fetch_assoc();

    // Verify the password for user
    if (!password_verify($pass, $user['password'])) {
        echo "<script>alert('Incorrect user password.'); window.history.back();</script>";
        exit();
    }

    // If login is successful, start a session for user
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];

    echo "<script>alert('User login successful! Redirecting to your dashboard.'); window.location.href = 'home.php';</script>";
    exit();

    $stmt->close();
    $conn->close();
}
?>
