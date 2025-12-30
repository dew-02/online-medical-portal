     
    // Handle checkout button click
    const checkoutButton = document.querySelector('.checkout-btn');
    checkoutButton.addEventListener('click', function () {
      // Alert user that the order is saved and email is sent
      alert("Your order is saved. You will receive a review in your email.");
  
      // Redirect to home.php
      window.location.href = 'home.php';
    });
