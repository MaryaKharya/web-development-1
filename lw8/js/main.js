const buttonLeft = 'arrow_left';
const buttonRight = 'arrow_right';
const durationOfTransition = '160ms';
const zero = 0;
const width = 285;
const marginRight = 20;
const number = 'number';
let numberOfClicks = 0;

function main() {
  let arrowLeft = document.getElementById('arrow_left');
  let arrowRight = document.getElementById('arrow_right');
  let carusel = document.getElementById('carusel');
  for (let film of carusel.children) {
    film.style.WebkitTransition = durationOfTransition;
  }
  arrowLeft.addEventListener("click", handlerArrow);
  arrowRight.addEventListener("click", handlerArrow);
}

function handlerArrow() {
  numberOfClicks++;
  if (numberOfClicks === 1) {
    move(event.target.name);
    setTimeout(() => numberOfClicks = 0, 230);
  }
}

function move(button) {
  if (button === buttonLeft) {
    let leftFilm = carusel.firstElementChild;
    changeWidth(leftFilm, zero, zero)
    setTimeout( () => {
      carusel.append(leftFilm); 
      changeWidth(leftFilm, width, marginRight)
    }, 200);  
  } else if (button === buttonRight) {
    let rightFilm = carusel.lastElementChild;
    rightFilm.style.WebkitTransition = zero;
    changeWidth(rightFilm, zero, zero);
    carusel.prepend(rightFilm);
    rightFilm.style.WebkitTransition = durationOfTransition;
    setTimeout( () => {
      changeWidth(rightFilm, width, marginRight)
    }, 0); 
  }
}

function changeWidth(elem, width, marginRight) { 
  if ( typeof(width) === number ) {
    elem.style.width = `${width}px`;
  }
  if ( typeof(marginRight) === number ) {
    elem.style.marginRight = `${marginRight}px`;
  }
}

window.onload = main;