// Wait for the DOM to fully load
document.addEventListener('DOMContentLoaded', function() {
    // Get references to the form and buttons
    const form = document.querySelector('form');
    const backButton = document.querySelector('.backbtn');
    const submitButton = document.querySelector('.checkout-btn');

    // Handle form submission
    form.addEventListener('submit', function(event) {
        // Add custom validation or processing logic here if needed
        // For example, you can show a confirmation message before submitting
        if (!confirm('Are you sure you want to submit the form?')) {
            event.preventDefault(); // Prevent form submission if not confirmed
        }
    });

    // Handle back button click
    backButton.addEventListener('click', function() {
        if (confirm('Are you sure you want to go back?')) {
            window.location.href = 'chanelingDoc.php'; // Redirect to chanelingDoc.php
        }
    });

    // Optional: Handle form field changes or any other interactions
});
