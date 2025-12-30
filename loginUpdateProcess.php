<?php
include 'loginConfig.php';

if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $new_fname = $_POST['new_fname'];
    $new_password = $_POST['new_pass'];
    $cpassword = $_POST['cpass'];

    if ($new_password === $cpassword) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        
        $stmt = $conn->prepare("UPDATE users SET fname = ?, password = ? WHERE email = ?");
        $stmt->bind_param("sss", $new_fname, $hashed_password, $email);

        if ($stmt->execute() === TRUE) {
            echo "<script>alert('Record deleted successfully.');</script>";
        } else {
            echo "Error updating user: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }
}

$conn->close();
?>
