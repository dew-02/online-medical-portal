// Handle "Come and Pay" button click
document.getElementById('come-and-pay-button').addEventListener('click', function() {
    alert('Thank you for choosing us! Please come and pay your bill.');
    window.location.href = 'home.php';
});

// Handle "Cancel" button click
document.querySelector('.cancel-button').addEventListener('click', function() {
    if (confirm('Are you sure you want to cancel this? You will be redirected to the home page.')) {
        window.location.href = 'home.php';
    }
});

// Handle "Pay Now" button click
document.querySelector('.pay-now-button').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default button behavior

    // Check if all fields are filled
    const name = document.getElementById('name').value;
    const cardNumber = document.getElementById('card-number').value;
    const expiryDate = document.getElementById('expiry-date').value;
    const cvv = document.getElementById('cvv').value;

    if (!name || !cardNumber || !expiryDate || !cvv) {
        alert('Please fill in all fields before proceeding.');
        return; // Stop the function if any field is empty
    }

    // Display alert for payment success
    alert('Payment successful! Thank you, and have a wonderful day!');

    // Redirect to home page
    window.location.href = 'home.php';
});
