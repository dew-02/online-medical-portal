<?php
include 'loginConfig.php';
session_start();

if (isset($_POST['edit'])) {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update User</title>
            <link rel="stylesheet" type="text/css" href="css/loginUpdate.css">
        </head>
        <body>
        <h2>Update User</h2>
        <form method="post" action="loginUpdateProcess.php">
            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
            <fieldset>
                <label for="new_fname">New User Name:</label>
                <input type="text" id="new_fname" name="new_fname" value="<?php echo $row['fname']; ?>" required><br>
                <label for="new_pass">New Password:</label>
                <input type="password" id="new_pass" name="new_pass" required><br>
                <label for="cpass">Confirm Password:</label>
                <input type="password" id="cpass" name="cpass" required><br>
                <button type="submit" name="update" class="button">Update</button>
            </fieldset>
        </form>
        </body>
        </html>
        <?php
    } else {
        echo "User not found.";
    }
    $stmt->close();
}

$conn->close();
?>
