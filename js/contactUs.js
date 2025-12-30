document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('.contact-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform basic validation
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        if (!name || !email || !message) {
            alert('Please fill out all fields.');
            return; // Exit the function
        }

        // Create a FormData object to send form data
        const formData = new FormData(form);

        // Use Fetch API to submit the form data
        fetch('submitContact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.text(); // Process the response
            } else {
                throw new Error('Network response was not ok.');
            }
        })
        .then(data => {
            alert('Your message has been sent successfully!');

            // Ask the user if they want to send another message
            if (confirm('Do you want to send another message?')) {
                form.reset(); // Reset the form fields
            } else {
                window.location.href = 'home.php'; // Redirect to home.php
            }
        })
        .catch(error => {
            alert('There was an error sending your message: ' + error.message);
        });
    });
});
