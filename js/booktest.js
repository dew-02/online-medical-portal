document.addEventListener("DOMContentLoaded", function () {

    const submitBtn = document.getElementById('submitBtn');
    const bookingForm = document.getElementById('bookingForm');


    submitBtn.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission for confirmation

        const confirmSubmit = confirm("Are you sure you want to submit this data?");
        if (confirmSubmit) {
            // Try to submit the form
            bookingForm.submit();
        }
    });
});
