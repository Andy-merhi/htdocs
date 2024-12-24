 // Initialize Swiper
 const swiper = new Swiper('.swiper', {
    // Configuration options
    loop: true, // Loop through slides
    autoplay: {
      delay: 5000, // Auto-slide every 5 seconds
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true, // Allow pagination bullets to be clickable
    }
  });

  // Function to handle menu-burger click
  document.getElementById('menu-burger-icon').addEventListener('click', function() {
    // Display something else
    document.getElementById('menu-burger-items').style.display = 'block';
  });

  document.getElementById('menu-burger-exit').addEventListener('click', function() {
    // Display something else
    document.getElementById('menu-burger-items').style.display = 'none';
  });


   // Function to handle menu-burger click
   document.getElementById('menu-burger-women').addEventListener('click', function() {
    // Display something else
    document.getElementById('menu-burger-items').style.display = 'none';
    document.getElementById('menu-1').style.display = 'block';
  });

  document.getElementById('menu-1-back-arrow').addEventListener('click', function() {
    // Display something else
    document.getElementById('menu-1').style.display = 'none';
    document.getElementById('menu-burger-items').style.display = 'block';
  });

   // Function to handle menu-burger click
   document.getElementById('menu-1-clothing').addEventListener('click', function() {
    // Display something else
    document.getElementById('menu-1').style.display = 'none';
    document.getElementById('menu-1-overlay').style.display = 'block';
  });

    // Function to handle menu-burger click
    document.getElementById('menu-1-overlay-back-arrow').addEventListener('click', function() {
    // Display something else
    document.getElementById('menu-1-overlay').style.display = 'none';
    document.getElementById('menu-1').style.display = 'block';
  });

    // Function to handle menu-burger click
    document.getElementById('profile-icon').addEventListener('click', function() {
     
      document.getElementById('profile-container').style.display = 'block';
    });

    function changeQuantity(amount) {
      const quantityElement = document.getElementById("cartQuantity");
      let currentQuantity = parseInt(quantityElement.innerText);
    
      // Adjust quantity but prevent it from going below 1
      currentQuantity += amount;
      if (currentQuantity < 1) {
        currentQuantity = 1;
      }
    
      quantityElement.innerText = currentQuantity;
    }

    function toggleShoppingCart() {
      // Target the nested UL by its ID
      var menuBurgerIcon = document.getElementById('menu-burger-icon');
      menuBurgerIcon.style.zIndex = '0';
  
      var shoppingCart = document.getElementById('shopping-cart');
      
      // Toggle the display property
      if (shoppingCart.style.display === 'none' || shoppingCart.style.display === '') {
          shoppingCart.style.display = 'block';
      } else {
          shoppingCart.style.display = 'none';
          menuBurgerIcon.style.zIndex = '1100';
      }
  }

  function toggleSignInContainer() {
    var signInContainer = document.getElementById('sign-in-container');
    if (signInContainer.style.display === 'none' || signInContainer.style.display === '') {
      signInContainer.style.display = 'flex';
    }
  }

  function closeSignInContainer() {
    var closeSignIn = document.getElementById('sign-in-container');
    if (closeSignIn.style.display === 'flex') {
      closeSignIn.style.display = 'none';
    }
  }

  $(document).ready(function () {
    $("#loginForm").validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6
        }
      },
      messages: {
        email: {
          required: "Please enter your email",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 6 characters long"
        }
      }
    });
  });
  



    const phoneInput = document.querySelector('#phone-number');
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: 'lb', // Default to Lebanon
        separateDialCode: true,
    });

    // OTP Timer Logic
    const timerElement = document.getElementById('otp-timer');
    let timeRemaining = 56;

    function startOtpTimer() {
        const timerInterval = setInterval(() => {
            if (timeRemaining > 0) {
                const minutes = Math.floor(timeRemaining / 60);
                const seconds = timeRemaining % 60;
                timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                timeRemaining--;
            } else {
                clearInterval(timerInterval);
                timerElement.textContent = "Expired";
            }
        }, 1000);
    }

    startOtpTimer();

    function toggleSignUpContainer() {
      var signUpContainer = document.getElementById('registration-form');
      if (signUpContainer.style.display === 'none' || signUpContainer.style.display === '') {
        signUpContainer.style.display = 'bloc';
      }
    }