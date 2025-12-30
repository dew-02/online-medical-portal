

document.addEventListener('DOMContentLoaded', function() {
    // Get references to the footer navigation links and buttons
    const footerNavLinks = document.querySelectorAll('.footer-nav a');
    const socialIcons = document.querySelectorAll('.social-icon');
    const footerInfoLinks = document.querySelectorAll('.footer-info a');
    
    // Add click event listeners to the footer navigation links
    footerNavLinks.forEach(link => {
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

    // Add click event listeners to the social media icons
    socialIcons.forEach(icon => {
        icon.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor behavior
            const iconClass = this.querySelector('i').classList;
            
            // Handle social media links based on the icon class
            if (iconClass.contains('fa-facebook-f')) {
                window.open('https://www.facebook.com', '_blank');
            } else if (iconClass.contains('fa-twitter')) {
                window.open('https://twitter.com', '_blank');
            } else if (iconClass.contains('fa-facebook-messenger')) {
                window.open('https://www.messenger.com', '_blank');
            } else if (iconClass.contains('fa-envelope')) {
                window.open('mailto:example@gmail.com');
            } else {
                console.error('Unknown social media icon:', iconClass);
            }
        });
    });

    // Add click event listeners to the footer info links
    footerInfoLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor behavior
            const section = this.textContent.trim();
            
            // Handle navigation based on the clicked info link
            switch (section) {
                case 'FAQ':
                    window.location.href = 'fAQ.php';
                    break;
                case 'Privacy Policy':
                    window.location.href = 'privacyNote.php';
                    break;
                case 'Terms & Conditions':
                    window.location.href = 'terms.php';
                    break;
                default:
                    console.error('Unknown info section:', section);
            }
        });
    });
});
