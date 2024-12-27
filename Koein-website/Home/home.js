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
     if (document.getElementById('profile-container').style.display === 'none' || document.getElementById('profile-container').style.display === '') {
      document.getElementById('profile-container').style.display = 'block';
     }
     else {
      document.getElementById('profile-container').style.display = 'none';
     }
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
      var menuBurgerIcon = document.getElementById('menu-burger-icon');
      var shoppingCart = document.getElementById('shopping-cart');
      
      // Toggle the display property
      if (shoppingCart.style.display === 'none' || shoppingCart.style.display === '') {
          shoppingCart.style.display = 'block';
          menuBurgerIcon.style.display = 'none';
      } else{
          shoppingCart.style.display = 'none';
          menuBurgerIcon.style.display = 'block';
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
    let timeRemaining = 60;

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
      var signInContainer = document.getElementById('sign-in-container');
      if (signUpContainer.style.display === 'none' || signUpContainer.style.display === '') {
        signUpContainer.style.display = 'block';
        signInContainer.style.display = 'none';
      }
    }

    function closeSignUpContainer() {
      var closeSignUp = document.getElementById('registration-form');
      if (closeSignUp.style.display === 'block') {
        closeSignUp.style.display = 'none';
      }
    }

    $(document).ready(function () {
      // Log when the script starts
      console.log("jQuery validation script loaded.");
  
      // Custom method for phone number validation
      jQuery.validator.addMethod(
          "phoneFormat",
          function (value, element) {
              console.log("Validating phone number:", value);
              return this.optional(element) || /^\d{10}$/.test(value);
          },
          "Please enter a valid 10-digit phone number."
      );
  
      // Initialize form validation
      $("#sign-up-form").validate({
          debug: true, // Prevent actual form submission during testing
          rules: {
              "first-name": {
                  required: true,
                  minlength: 2,
              },
              "last-name": {
                  required: true,
                  minlength: 2,
              },
              "phone-number": {
                  required: true,
                  phoneFormat: true,
              },
              "sign-up-email": {
                  required: true,
                  email: true,
              },
              "sign-up-password": {
                  required: true,
                  minlength: 6,
              },
              "sign-up-confirm-password": {
                  required: true,
                  equalTo: "#sign-up-password",
              },
              "otp-input": {
                  required: true,
                  minlength: 4,
                  maxlength: 4,
              },
              terms: {
                  required: true,
              },
          },
          messages: {
              "first-name": {
                  required: "First name is required.",
                  minlength: "First name must be at least 2 characters long.",
              },
              "last-name": {
                  required: "Last name is required.",
                  minlength: "Last name must be at least 2 characters long.",
              },
              "phone-number": {
                  required: "Phone number is required.",
              },
              "sign-up-email": {
                  required: "Email is required.",
                  email: "Please enter a valid email address.",
              },
              "sign-up-password": {
                  required: "Password is required.",
                  minlength: "Password must be at least 6 characters long.",
              },
              "sign-up-confirm-password": {
                  required: "Please confirm your password.",
                  equalTo: "Passwords do not match.",
              },
              terms: {
                  required: "You must agree to the terms and conditions.",
              },
              "otp-input": {
                  required: "OTP is required.",
                  minlength: "OTP must be 4 digits.",
                  maxlength: "OTP must be 4 digits.",
              },
          },
          errorPlacement: function (error, element) {
              error.css("color", "red"); // Set error message color to red
              error.insertAfter(element); // Place error message after the input field
          },
          highlight: function (element) {
              $(element).css({
                  // "border-color": "red", // Highlight input field with red border
                  // "box-shadow": "0 0 5px rgba(255, 0, 0, 0.5)",
              });
          },
          unhighlight: function (element) {
              $(element).css({
                  "border-color": "", // Remove red border
                  "box-shadow": "",
              });
          },
          submitHandler: function (form) {
              alert("Form submitted successfully!");
              console.log("Form validated successfully.");
              form.submit();
          },
      });
  
      // Show only the error message for the active field
      $("input, select").on("focus blur", function () {
          const inputName = $(this).attr("name");
          $(".error").each(function () {
              if ($(this).attr("for") !== inputName) {
                  $(this).hide(); // Hide other error messages
              } else {
                  $(this).show(); // Show the error message for the active input
              }
          });
      });
  });
  



  //   document.addEventListener('DOMContentLoaded', function () {
  //     const otpGroup = document.querySelector('.otp-group');
  //     const emailGroup = document.querySelector('.email-group');
  //     const phoneGroup = document.querySelector('.phone-group');
  //     const parentContainer = otpGroup.parentElement;
  
  //     function reorderElements() {
  //         if (window.innerWidth <= 394) {
  //             // Move otp-group before email-group for smaller screens
  //             if (emailGroup && otpGroup && emailGroup.previousElementSibling !== otpGroup) {
  //                 parentContainer.insertBefore(otpGroup, emailGroup);
  //             }
  //         } else {
  //             // Restore otp-group to its original position for larger screens
  //             if (phoneGroup && otpGroup && phoneGroup.nextElementSibling !== otpGroup) {
  //                 parentContainer.insertBefore(otpGroup, phoneGroup.nextSibling);
  //             }
  //         }
  //     }
  
  //     // Reorder on page load
  //     reorderElements();
  
  //     // Reorder on window resize
  //     window.addEventListener('resize', reorderElements);
  // });
  