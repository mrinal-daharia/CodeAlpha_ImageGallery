// Typing Effect for "PrimePhoto"
const siteName = "Optics Flow";
const typedText = document.getElementById("typed-text");
const cursor = document.getElementById("cursor");

let index = 0;
let isDeleting = false;

function typeEffect() {
  if (!typedText) return;

  let currentText = siteName.substring(0, index);
  typedText.textContent = currentText;

  if (!isDeleting) {
    if (index < siteName.length) {
      index++;
    } else {
      isDeleting = true;
      setTimeout(typeEffect, 1000); // pause before delete
      return;
    }
  } else {
    if (index > 0) {
      index--;
    } else {
      isDeleting = false;
    }
  }

  setTimeout(typeEffect, isDeleting ? 80 : 120);
}

typeEffect();
