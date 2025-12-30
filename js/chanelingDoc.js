document.addEventListener('DOMContentLoaded', () => {
    const nextButton = document.getElementById('nextButton');
    const backButton = document.getElementById('backButton');

    nextButton.addEventListener('click', () => {
        // Show confirmation dialog
        const isConfirmed = confirm('Please remember your doctor\'s name before proceeding to the next page.');
        if (isConfirmed) {
            window.location.href = 'patient.php';
        }
        // If not confirmed, do nothing (stay on the current page)
    });
    

    backButton.addEventListener('click', () => {
        const confirmed = confirm('Would you like to return to the main page?');
        if (confirmed) {
            window.location.href = 'home.php';
        }
    });
});
