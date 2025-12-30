// Wait for the DOM to fully load
document.addEventListener('DOMContentLoaded', function () {
    // Select the logout button by its ID
    const logoutBtn = document.getElementById('logoutBtn');
    
    // Add a click event listener to the logout button
    logoutBtn.addEventListener('click', function () {
        // Redirect to the logout.php file when clicked
        window.location.href = 'logout.php';
    });

    // Set up navigation for other buttons
    document.getElementById("pharmacy").onclick = function() {
        window.location.href = "adminPharmacy.php";
    };

    document.getElementById("doctor_channeling").onclick = function() {
        window.location.href = "adminDoctor.php";
    };

    document.getElementById("download_report").onclick = function() {
        window.location.href = "adminDownload.php";
    };
    document.getElementById("test_booking").onclick = function() {
        window.location.href = "adminTest.php";
    };

    document.getElementById("users_login").onclick = function() {
        window.location.href = "adminUsers.php";
    };
    document.getElementById("admin_login").onclick = function() {
        window.location.href = "admindetails.php";
    };
});
