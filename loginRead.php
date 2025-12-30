<?php
include 'loginConfig.php';

if (isset($_POST['read'])) {
    $email = $_POST['email'];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "User Name: " . $row['fname'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
}

$conn->close();
?>
