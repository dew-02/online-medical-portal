document.addEventListener('DOMContentLoaded', function() {
    const updateButton = document.querySelector('.update-btn');
    const deleteButton = document.querySelector('.delete-btn');
    const confirmButton = document.querySelector('.confirm');

    // Confirm Button Click Event
    if (confirmButton) {
        confirmButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor behavior

            // Show confirmation dialog before checking out
            const isConfirmed = confirm("Are you sure you want to check out and pay?");
            if (isConfirmed) {
                // Redirect to payment.php
                window.location.href = 'payment.php';
            } else {
                console.log("Check-out cancelled.");
            }
        });
    }
});