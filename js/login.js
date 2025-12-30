document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        const password = document.getElementById('pass').value;
        const confirmPassword = document.getElementById('cpass').value;
        
        if (password !== confirmPassword) {
            event.preventDefault();
            alert('Passwords do not match.');
        }
    });
});
