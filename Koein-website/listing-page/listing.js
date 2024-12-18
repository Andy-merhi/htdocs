function toggleListItems() {
    // Target the nested UL by its ID
    var nestedList = document.getElementById('sort-by-list');

    // Toggle the display property
    if (nestedList.style.display === 'none' || nestedList.style.display === '') {
        nestedList.style.display = 'block'; // Show the list
    } else {
        nestedList.style.display = 'none'; // Hide the list
    }
}

function togglebrandItems() {
    // Target the nested UL by its ID
    var checkboxes = document.getElementById('checkboxes');

    // Toggle the display property
    if (checkboxes.style.display === 'none' || checkboxes.style.display === '') {
        checkboxes.style.display = 'block'; // Show the list
    } else {
        checkboxes.style.display = 'none'; // Hide the list
    }
}

// document.addEventListener("DOMContentLoaded", function() {

//     const container = document.getElementById('color-container');

//     const numOfColors = 24;

//     for (let i = 0; i < numOfColors; i++) {
//         const div = document.createElement('div'); 
//         container.appendChild(div);
//     }
// });

function toggleColorItems() {
    // Target the nested UL by its ID
    var colorContainer = document.getElementById('color-container');

    // Toggle the display property
    if (colorContainer.style.display === 'none' || colorContainer.style.display === '') {
        colorContainer.style.display = 'flex'; // Show the list
    } else {
        colorContainer.style.display = 'none'; // Hide the list
    }
}

function toggleSizeItems() {
    // Target the nested UL by its ID
    var sizeBtn = document.getElementById('sizeBtn');

    // Toggle the display property
    if (sizeBtn.style.display === 'none' || sizeBtn.style.display === '') {
        sizeBtn.style.display = 'flex'; // Show the list
    } else {
        sizeBtn.style.display = 'none'; // Hide the list
    }
}


document.addEventListener("DOMContentLoaded", () => {
    const rangeMin = document.querySelector(".range-min");
    const rangeMax = document.querySelector(".range-max");
    const progress = document.querySelector(".progress");
    const inputMin = document.querySelector(".input-min");
    const inputMax = document.querySelector(".input-max");
  
    const updateSlider = () => {
      const minValue = parseInt(rangeMin.value);
      const maxValue = parseInt(rangeMax.value);
  
      // Ensure the range values do not overlap
      if (minValue > maxValue - 50) {
        rangeMin.value = maxValue - 50;
      }
      if (maxValue < minValue + 50) {
        rangeMax.value = minValue + 50;
      }
  
      // Update progress bar
      const minPercent = (rangeMin.value / rangeMin.max) * 100;
      const maxPercent = (rangeMax.value / rangeMax.max) * 100;
      progress.style.left = `${minPercent}%`;
      progress.style.right = `${100 - maxPercent}%`;
  
      // Update the input fields
      inputMin.value = rangeMin.value;
      inputMax.value = rangeMax.value;
    };
  
    // Sync range slider and number inputs
    const syncInputToSlider = () => {
      const minValue = parseInt(inputMin.value);
      const maxValue = parseInt(inputMax.value);
  
      if (minValue >= maxValue) {
        inputMin.value = maxValue - 50;
      } else if (maxValue <= minValue) {
        inputMax.value = minValue + 50;
      }
  
      rangeMin.value = inputMin.value;
      rangeMax.value = inputMax.value;
      updateSlider();
    };
  
    // Event listeners for slider changes
    rangeMin.addEventListener("input", updateSlider);
    rangeMax.addEventListener("input", updateSlider);
  
    // Event listeners for number input changes
    inputMin.addEventListener("input", syncInputToSlider);
    inputMax.addEventListener("input", syncInputToSlider);
  
    // Initialize slider
    updateSlider();
});
  

function togglePriceItems() {
    // Target the nested UL by its ID
    var priceFilter = document.getElementById('price-filter');

    // Toggle the display property
    if (priceFilter.style.display === 'none' || priceFilter.style.display === '') {
        priceFilter.style.display = 'block'; // Show the list
    } else {
        priceFilter.style.display = 'none'; // Hide the list
    }
}

function toggleMaterialItems() {
    // Target the nested UL by its ID
    var materialFilter = document.getElementById('material-filter');

    // Toggle the display property
    if (materialFilter.style.display === 'none' || materialFilter.style.display === '') {
        materialFilter.style.display = 'block'; // Show the list
    } else {
        materialFilter.style.display = 'none'; // Hide the list
    }
}