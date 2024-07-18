// Add this JavaScript code in a file named script.js or include it in a script tag in your HTML file

document.addEventListener("DOMContentLoaded", function() {
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const doctorsGrid = document.getElementById('doctorsGrid');
  
    let currentIndex = 0;
    const totalCards = document.querySelectorAll('.doctors__card').length;
    const visibleCards = 6; // Number of cards visible at a time
    const cardWidth = document.querySelector('.doctors__card').offsetWidth;
    const maxIndex = Math.ceil(totalCards / visibleCards) - 1;
  
    function updateButtons() {
      prevButton.style.display = currentIndex === 0 ? 'none' : 'inline-block';
      nextButton.style.display = currentIndex === maxIndex ? 'none' : 'inline-block';
    }
  
    function slideCards() {
      const offset = -currentIndex * (cardWidth * visibleCards);
      doctorsGrid.style.transform = `translateX(${offset}px)`;
    }
  
    prevButton.addEventListener('click', function() {
      if (currentIndex > 0) {
        currentIndex--;
        slideCards();
        updateButtons();
      }
    });
  
    nextButton.addEventListener('click', function() {
      if (currentIndex < maxIndex) {
        currentIndex++;
        slideCards();
        updateButtons();
      }
    });
  
    doctorsGrid.addEventListener('scroll', function() {
      const scrollLeft = doctorsGrid.scrollLeft;
      const cardIndex = Math.round(scrollLeft / cardWidth);
      currentIndex = Math.floor(cardIndex / visibleCards);
      updateButtons();
    });
  
    updateButtons(); // Initial button state
  });
  