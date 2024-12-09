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

  document.addEventListener("DOMContentLoaded", () => {
    const navItems = document.querySelectorAll(".women-nav ul li"); // All <li> elements
    const overlay = document.getElementById("overlay");
  
    navItems.forEach((item) => {
      item.addEventListener("click", () => {
        if (overlay.style.display === "block") {
          overlay.style.display = "none"; // Hide overlay
          // Make all <li> elements bold
          navItems.forEach((li) => {
            li.style.fontWeight = "700"; // Bold font weight
          });
        } else {
          overlay.style.display = "block"; // Show overlay
          // Reset all <li> to regular font weight
          navItems.forEach((li) => {
            li.style.fontWeight = "400"; // Regular font weight
          });
          // Set the clicked <li> to bold
          item.style.fontWeight = "700"; // Bold font weight
        }
      });
    });
  
    // Close the overlay when clicking outside its content
    overlay.addEventListener("click", (e) => {
      if (e.target === overlay) {
        overlay.style.display = "none";
        // Reset all <li> elements to bold when overlay is hidden
        navItems.forEach((li) => {
          li.style.fontWeight = "700"; // Bold font weight
        });
      }
    });
  });
  