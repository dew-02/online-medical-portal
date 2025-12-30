<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Your Prescription</title>
    <link rel="stylesheet" type="text/css" href="css/order.css">
</head>
<body>
<?php include 'header.php'; ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_medical_portal";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle file upload, insert or update data, and delete requests
    if (isset($_POST['delete'])) {
        $id = $conn->real_escape_string($_POST['id']);
        $sql = "DELETE FROM prescriptions WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
            alert('Record deleted successfully.');
            window.location.href = 'home.php'; // Redirect to home.php
          </script>";
        } else {
            echo "<script>
                    alert('Error deleting record: " . addslashes($conn->error) . "');
                  </script>"; $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        $id = $conn->real_escape_string($_POST['id']);
        $fullName = $conn->real_escape_string(trim($_POST['fullName']));
        $gmail = $conn->real_escape_string(trim($_POST['gmail']));
        $telephoneNumber = $conn->real_escape_string(trim($_POST['telephoneNumber']));
        $nic = $conn->real_escape_string(trim($_POST['nic']));
        $address = $conn->real_escape_string(trim($_POST['address']));

        $sql = "UPDATE prescriptions SET fullName='$fullName', gmail='$gmail', telephoneNumber='$telephoneNumber', nic='$nic', address='$address' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<h4>Record updated successfully.<h4>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        if (!isset($_FILES['fileToUpload'])) {
            echo "File input not found.";
            exit();
        }

        if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
            echo "Upload error: " . $_FILES['fileToUpload']['error'];
            exit();
        }

        $fullName = $conn->real_escape_string(trim($_POST['fullName']));
        $gmail = $conn->real_escape_string(trim($_POST['gmail']));
        $telephoneNumber = $conn->real_escape_string(trim($_POST['telephoneNumber']));
        $nic = $conn->real_escape_string(trim($_POST['nic']));
        $address = $conn->real_escape_string(trim($_POST['address']));

        $targetDir = "uploads/";
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO prescriptions (fullName, gmail, telephoneNumber, nic, address, filePath) 
                         VALUES ('$fullName', '$gmail', '$telephoneNumber', '$nic', '$address', '$targetFilePath')";

                if ($conn->query($sql) === TRUE) {
                    echo "Data received and saved successfully.";
                } else {
                    echo "Error in submitting data: " . $conn->error;
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }
}
?>

<h2>Your Latest Prescription</h2>
<div class="main-container">
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>NIC</th>
            <th>Address</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        <?php
        
        $sql = "SELECT * FROM prescriptions ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<tr>
                <td>{$row['fullName']}</td>
                <td>{$row['gmail']}</td>
                <td>{$row['telephoneNumber']}</td>
                <td>{$row['nic']}</td>
                <td>{$row['address']}</td>
                <td><a href='{$row['filePath']}' target='_blank'>View</a></td>
                <td>
                    <button onclick=\"showUpdateForm({$row['id']}, '{$row['fullName']}', '{$row['gmail']}', '{$row['telephoneNumber']}', '{$row['nic']}', '{$row['address']}')\">Edit</button>
                    <form method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button type='submit' name='delete'>Delete</button>
                    </form>
                </td>
            </tr>";
        } else {
            echo "<tr><td colspan='8'>No prescriptions found.</td></tr>";
        }
        ?>
    </table>
</div>

<button class="checkout-btn">Check Out</button>

<div class="form-container" id="updateForm" style="display:none;">
    <h2>Update Prescription Details</h2>
    <form method="POST">
        <input type="hidden" id="id" name="id">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="gmail">Email:</label>
        <input type="email" id="gmail" name="gmail" required>

        <label for="telephoneNumber">Telephone Number:</label>
        <input type="tel" id="telephoneNumber" name="telephoneNumber" required>

        <label for="nic">NIC:</label>
        <input type="text" id="nic" name="nic" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>

        <button type="submit" name="update">Update</button>
    </form>
</div>
<script>
function showUpdateForm(id, fullName, gmail, telephoneNumber, nic, address) {
    document.getElementById('id').value = id;
    document.getElementById('fullName').value = fullName;
    document.getElementById('gmail').value = gmail;
    document.getElementById('telephoneNumber').value = telephoneNumber;
    document.getElementById('nic').value = nic;
    document.getElementById('address').value = address;
    document.getElementById('updateForm').style.display = 'block';
}
</script>
<script src="js/order.js"></script>
<?php include 'footer.php'; ?>

</body>
</html>

<?php
$conn->close();
?>