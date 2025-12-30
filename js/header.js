

document.addEventListener('DOMContentLoaded', function() {
    // Get references to the navigation links and buttons
    const navLinks = document.querySelectorAll('.nav-links a');
    const loginButton = document.querySelector('.btn-login');
    const registerButton = document.querySelector('.btn-register');
    
    // Add click event listeners to the navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor behavior
            const section = this.textContent.trim();
            
            // Handle navigation based on the clicked link
            switch (section) {
                case 'Home':
                    window.location.href = 'home.php';
                    break;
                case 'Channeling':
                    window.location.href = 'chanelingDoc.php';
                    break;
                case 'About Us':
                    window.location.href = 'aboutUs.php';
                    break;
                case 'Contact Us':
                    window.location.href = 'contactUs.php';
                    break;
                default:
                    console.error('Unknown section:', section);
            }
        });
    });

    // Add click event listeners to the authentication buttons
    loginButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default anchor behavior
        window.location.href = 'login.php'; // Redirect to login page
    });

    registerButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default anchor behavior
        window.location.href = 'register.php'; // Redirect to register page
    });
});
