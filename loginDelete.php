<?php
include 'loginConfig.php';

if (isset($_POST['delete'])) {
    $email = $_POST['email'];

    // Debugging: Check if the email is received
    if (empty($email)) {
        echo "No email provided for deletion.";
        exit();
    }

   
    $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully.');</script>";
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "No delete request received.";
}

$conn->close();
?>
