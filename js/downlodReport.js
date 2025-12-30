
// Function to handle the back button
function goBack() {
    window.history.back();
}

// Add event listeners to buttons once the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    const backButton = document.querySelector('.back-button');
    if (backButton) {
        backButton.addEventListener('click', goBack);
    }
});
