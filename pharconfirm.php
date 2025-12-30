<div class="main-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>NIC</th>
            <th>Address</th>
            <th>File</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<tr>
                <td>{$row['id']}</td>
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

<div class="form-container" id="updateForm">
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
    document.getElementById('updateForm').classList.add('active');
}
</script>

<?php include 'footer.php'; ?>
</body>
</html>

<?php
$conn->close();
?>