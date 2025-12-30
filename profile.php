<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) { // Keep this as user_email
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit(); // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>

<?php include 'header.php'; ?>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_medical_portal";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user email from session
$user_email = $_SESSION['user_email'];

// Fetch user details from the users table using the email
$stmt_user = $conn->prepare("SELECT id, fname, lname, email, gender, birthday, city, address, bio, phone, profile_image FROM users WHERE email = ?"); // Use email for fetching user
$stmt_user->bind_param("s", $user_email);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();
    $id = htmlspecialchars($user['id']);
    $fname = htmlspecialchars($user['fname']);
    $lname = htmlspecialchars($user['lname']);
    $email = htmlspecialchars($user['email']);
    $gender = htmlspecialchars($user['gender']);
    $birthday = htmlspecialchars($user['birthday']);
    $city = htmlspecialchars($user['city']);
    $address = htmlspecialchars($user['address']);
    $bio = htmlspecialchars($user['bio']);
    $phone = htmlspecialchars($user['phone']);
    $profile_image = htmlspecialchars($user['profile_image']);
} else {
    $error_message = "No user found.";
}
$stmt_user->close();

// Handle form submission for update or delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $updated_fname = $_POST['first_name'];
    $updated_lname = $_POST['last_name'];
    $updated_email = $_POST['email'];
    $updated_gender = $_POST['gender'];
    $updated_birthday = $_POST['birthday'];
    $updated_city = $_POST['city'];
    $updated_address = $_POST['address'];
    $updated_bio = $_POST['bio'];
    $updated_phone = $_POST['phone'];
    $profile_image_name = $profile_image;

    // Handle profile image upload
    if (!empty($_FILES['profile_image']['name'])) {
        $target_dir = "profile_images/";
        $target_file = $target_dir . basename($_FILES['profile_image']['name']);
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
            $profile_image_name = $target_file;
        }
    }

    if ($_POST['action'] == 'update') {
        // Update logic
        $stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, email=?, gender=?, birthday=?, city=?, address=?, bio=?, phone=?, profile_image=? WHERE id=?");
        $stmt->bind_param("ssssssssssi", $updated_fname, $updated_lname, $updated_email, $updated_gender, $updated_birthday, $updated_city, $updated_address, $updated_bio, $updated_phone, $profile_image_name, $id);

        if ($stmt->execute()) {
            echo "<br><center><h3>Profile updated successfully!</h3></center>";
            echo "<center><h4>Please refresh the page!</h4></center>";
        } else {
            echo "<p>Failed to update profile: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } elseif ($_POST['action'] == 'delete') {
        // Delete logic
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            session_destroy(); // Log out the user
            echo "<script>
                alert('Profile deleted successfully');
                window.location.href = 'home.php'; // Redirect immediately
              </script>";
            exit();
        } else {
            echo "<p>Failed to delete profile: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <!-- Update profile image display in the profile card -->
            <img id="preview" src="<?php echo $profile_image ? $profile_image : 'images/default-profile.png'; ?>" alt="Profile Image" class="profile-image">
            <div class="profile-name">
                <h1><?php echo $fname . ' ' . $lname; ?></h1>
            </div>
        </div>

        <!-- Update form -->
        <form method="POST" action="profile.php" enctype="multipart/form-data">
            <div class="profile-info">
                <div class="profile-image-section">
                    <label for="profile_image">Change Profile Image:</label>
                    <input type="file" id="profile_image" name="profile_image" class="form-control">
                </div>

                <div class="info-section">
                    <h2>Information</h2>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $fname; ?>" class="form-control" readonly>

                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $lname; ?>" class="form-control">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control" readonly>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="Male" <?php echo $gender == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $gender == 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo $gender == 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>

                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>" class="form-control">

                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" value="<?php echo $city; ?>" class="form-control">

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $address; ?>" class="form-control">

                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="bio" class="form-control"><?php echo $bio; ?></textarea>

                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" class="form-control">
                </div>
            </div>

            <input type="hidden" name="action" value="update">
            <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
        </form>

        <!-- Delete form -->
        <form method="POST" action="profile.php">
            <input type="hidden" name="action" value="delete">
            <button type="submit" class="btn btn-danger mt-3">Delete Profile</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
<script src="js/profile.js"></script>
</body>
</html>
