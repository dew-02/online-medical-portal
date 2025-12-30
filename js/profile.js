// Handle the file input change to show preview
const fileInput = document.getElementById('profile_image'); // Adjusting to the file input's ID
const previewImage = document.getElementById('preview'); // Ensure this ID matches the profile image ID

fileInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result; // Set the preview image source
            previewImage.style.display = 'block'; // Show the preview image
        }
        reader.readAsDataURL(file); // Convert file to base64 string
    } else {
        previewImage.style.display = 'none'; // Hide the image if no file is selected
    }
});
