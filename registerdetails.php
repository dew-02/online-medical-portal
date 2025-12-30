<?php

include 'loginConfig.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $cpass = htmlspecialchars(trim($_POST['cpass']));
    
    
    if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($cpass)) {
        echo "<script>alert('Please fill all fields.'); window.history.back();</script>";
        exit();
    }

    
    if ($pass !== $cpass) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit();
    }

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.history.back();</script>";
        exit();
    }

    
    if (strpos($email, '@medicare.my.lk') !== false) {
        echo "<script>alert('Email addresses with @medicare.my.lk domain are not allowed.'); window.history.back();</script>";
        exit();
    }

    
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email is already registered.'); window.history.back();</script>";
        exit();
    }

    
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

   
    $query = "INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $fname, $lname, $email, $hashedPassword);

    if ($stmt->execute()) {
       
        echo "<script>alert('Account created successfully! Redirecting to login page.'); window.location.href = 'login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>
