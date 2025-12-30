document.addEventListener('DOMContentLoaded', function() {
    // Get references to the buttons
    const updateButton = document.querySelector('.update');
    const deleteButton = document.querySelector('.delete');
    const confirmButton = document.querySelector('.confirm');

    // Update Button Click Event
    if (updateButton) {
        updateButton.addEventListener('click', function(event) {
            const isConfirmed = confirm("Do you want to update this data?");
            if (!isConfirmed) {
                event.preventDefault(); // Prevent form submission if not confirmed
            }
        });
    }

    // Delete Button Click Event
    if (deleteButton) {
        deleteButton.addEventListener('click', function(event) {
            const isConfirmed = confirm("Do you want to delete this data?");
            if (!isConfirmed) {
                event.preventDefault(); // Prevent form submission if not confirmed
            }
        });
    }

    // Confirm Button Click Event
    if (confirmButton) {
        confirmButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default anchor or form behavior
    
            // Ask for confirmation before proceeding with payment
            const isConfirmed = confirm("Are you sure you want to proceed with checkout and payment?");
            if (isConfirmed) {
                // Notify the user that the report will be sent
                alert('After completing your payment, your report will automatically be sent to the provided email address.');
                
                // Redirect to payment.php
                window.location.href = 'payment.php';
            }
        });
    }
    
});
