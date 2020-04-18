let carusel = document.getElementById('carusel');
carusel.style.webkitTransitionDuration = '0.7s';
let arrowLeft = document.getElementById('arrow_left');
let arrowRight = document.getElementById('arrow_right');
let delay = 1000;
let canPress = true;

function handlerArrowLeft() {
  if (canPress) {
    canPress = false;
    carusel.style.opacity = '0';
    setTimeout(function() {
      let left_film = carusel.firstElementChild;
      carusel.append(left_film);
      carusel.style.opacity = '1';
    }, 700);
    setTimeout(function() {
      canPress = true;
    }, delay);
  };
};

function handlerArrowRight() {
  if (canPress) {
    canPress = false;
    carusel.style.opacity = '0';
    setTimeout(function() {
      let right_film = carusel.lastElementChild;
      carusel.prepend(right_film);
      carusel.style.opacity = '1';
    }, 700);
    setTimeout(function() {
      canPress = true;
    }, delay);
  };
};

arrowLeft.addEventListener("click", handlerArrowLeft);
arrowRight.addEventListener("click", handlerArrowRight);