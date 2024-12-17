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
