 // Initialize Swiper
 const swiper = new Swiper('.swiper', {
    // Configuration options
    loop: true, // Loop through slides
    autoplay: {
      delay: 500000, // Auto-slide every 5 seconds
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true, // Allow pagination bullets to be clickable
    }
  });