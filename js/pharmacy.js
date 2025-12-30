document.addEventListener('DOMContentLoaded', function() {
    // Handle the Cancel button
    const cancelButton = document.getElementById('cancelButton');
    cancelButton.addEventListener('click', function() {
        if (confirm("Are you sure you want to go to the home page?")) {
            window.location.href = 'home.php';
        }
    });

    // Handle the Submit button
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately

        if (confirm("Are you sure you want to submit the data?")) {
            // Allow the form to submit if the user confirms
            const formData = new FormData(form); // Create FormData object to include files
            
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Handle the server response
                if (data.includes("Data received and saved successfully.")) {
                    alert("Your prescription has been saved successfully. Please wait for review. You'll receive an email notification once the review is complete.");
                    window.location.href = 'order.php';
                } else {
                    alert("There was an error submitting your data. Please double-check all fields and try again.");
                }
            })
            .catch(error => {
                alert("An error occurred: " + error);
            });
        }
    });

    // Handle the file input change to show preview
    const fileInput = document.getElementById('fileInput');
    const previewImage = document.getElementById('preview');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block'; // Show the image
            }
            reader.readAsDataURL(file); // Convert file to base64 string
        } else {
            previewImage.style.display = 'none'; // Hide the image if no file is selected
        }
    });
});
