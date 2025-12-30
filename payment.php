<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "online_medical_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor names from patient_appointments table
$sql = "SELECT doctor_name FROM patient_appointments"; // Adjust column name if necessary
$result = $conn->query($sql);

$bill_items = [];
$total_service_charge = 0;
$total_doctor_price = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $doctor_name = $row['doctor_name'];

        // Check for the doctor's fees
        $fee_sql = "SELECT service_charge, doctor_price FROM Doctorsfees WHERE name = ?";
        $stmt = $conn->prepare($fee_sql);
        $stmt->bind_param("s", $doctor_name);
        $stmt->execute();
        $fee_result = $stmt->get_result();

        if ($fee_result->num_rows > 0) {
            while ($fee_row = $fee_result->fetch_assoc()) {
                $bill_items[] = [
                    'name' => $doctor_name,
                    'service_charge' => $fee_row['service_charge'],
                    'doctor_price' => $fee_row['doctor_price']
                ];
                $total_service_charge += $fee_row['service_charge'];
                $total_doctor_price += $fee_row['doctor_price'];
            }
        }
    }
} else {
    echo "No appointments found.";
}

$total_price = $total_service_charge + $total_doctor_price;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" type="text/css" href="css/payment.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="main-container">
        <div class="payment-container">
            <div class="payment-form-container">
                <h1>Payment Details</h1>
                <form id="payment-form">
                    <div class="form-group">
                        <label for="name">Name on Card</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" name="card-number" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" required>
                    </div>
                    <div class="button-group">
                        <button type="button" class="cancel-button">Cancel</button>
                        <button type="button" class="pay-now-button">Pay Now</button>
                        <button type="button" class="come-and-pay-button" id="come-and-pay-button">Come and Pay</button>
                    </div>
                </form>
            </div>
            <div class="bill-summary">
                <h2>Bill Summary</h2>
                <ul>     
                    <h3> Medical Care Online System</h3>   
                </ul>
                <div class="totals">
                    <div class="total-row"><strong>Your Total Price:</strong> $<?php echo number_format($total_doctor_price, 2); ?></div>
                    <div class="total-row"><strong>Total Service Charge:</strong> $<?php echo number_format($total_service_charge, 2); ?></div>
                    
                    <hr>
                    <div class="total"><strong>Total Price:</strong> $<?php echo number_format($total_price, 2); ?></div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/payment.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
