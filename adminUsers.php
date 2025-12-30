<?php
include 'loginConfig.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List - Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/adminallpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container">
        <header class="admin-header">
            <h1>Admin Dashboard</h1>
            <button id="dashboardBtn" onclick="window.location.href='admin.php'">Back to Dashboard</button>
            <button id="logoutBtn">Logout</button>
        </header>
        <main class="admin-content">
            <section id="user-list">
                <h2>User List</h2>
                <?php
                // Fetch all users from the database
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='user-table'>
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Password (Hashed)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['fname']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['password']) . "</td>
                               <td>
                                    <form method='post' action='loginUpdate.php' style='display:inline;'>
                                        <input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>
                                        <button type='submit' name='edit' class='update-btn'>Update</button>
                                    </form>
                                    <form method='post' action='loginDelete.php' style='display:inline;'>
                                        <input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>
                                        <button type='submit' name='delete' class='delete-btn'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                    echo "</tbody>
                          </table>";
                } else {
                    echo "<p>No users found.</p>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </section>
        </main>

        <footer class="admin-footer">
            <p>&copy; 2024 Medical Portal. All rights reserved.</p>
        </footer>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>
