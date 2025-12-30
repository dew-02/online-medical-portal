document.addEventListener('DOMContentLoaded', (event) => {
    // Function to handle button clicks
    function handleButtonClick(event) {
        // Prevent the default link behavior
        event.preventDefault();

        // Get the ID of the clicked element
        const buttonId = event.target.id || event.target.closest('a').id;

        // Determine the target URL based on the button clicked
        let targetUrl = '';
        switch (buttonId) {
            case 'bookAppointmentBtn':
                targetUrl = 'chanelingDoc.php';
                break;
            case 'buyMedicineBtn':
                targetUrl = 'pharmacy.php';
                break;
            case 'bookTestBtn':
                targetUrl = 'bookTest.php';
                break;
            case 'downloadReportBtn':
                targetUrl = 'downloadReport.php';
                break;
            case 'joinNowBtn':
                targetUrl = 'register.php';
                break;
            default:
                console.error('Unknown button ID:', buttonId);
                return;
        }

        // Redirect to the target URL
        if (targetUrl) {
            window.location.href = targetUrl;
        }
    }

    // Add event listeners to hero buttons
    document.getElementById('bookAppointmentBtn').addEventListener('click', handleButtonClick);

    // Add event listeners to option buttons
    document.querySelectorAll('.nav-button').forEach(button => {
        button.addEventListener('click', handleButtonClick);
    });

    // Add event listener to the cover button
    document.getElementById('joinNowBtn').addEventListener('click', handleButtonClick);
});
