const buttonLeft = 'arrow_left';
const buttonRight = 'arrow_right';
const timeout = 200;
const zero = 0;
const width = 285;
const number = 'number';
const marginRight = 20;
let initialDisplacement = 'translateX(-106%)';
let durationOfTransition = '160ms';
let numberOfClicks = 0;

function main() {
  let arrowLeft = document.getElementById(buttonLeft);
  let arrowRight = document.getElementById(buttonRight);
  addMovieFlippingTime(durationOfTransition)
  arrowLeft.addEventListener('click', handlerArrow);
  arrowRight.addEventListener('click', handlerArrow);
}

function addMovieFlippingTime(time) {
  let carusel = document.getElementById('carusel');
  for (let film of carusel.children) {
    film.style.WebkitTransition = time;
  }
}

function handlerArrow() {
  numberOfClicks++;
  if (numberOfClicks === 1) {
    move(event.target.name);
    setTimeout(() => numberOfClicks = zero, 1.2 * timeout);
  }
}

function move(button) {
  if (button === buttonLeft) {
    let leftFilm = carusel.firstElementChild;
    changeWidth(leftFilm, zero, zero)
    setTimeout( () => {
      carusel.append(leftFilm); 
      changeWidth(leftFilm, width, marginRight)
    }, timeout);
  } else if (button === buttonRight) {
    let rightFilm = carusel.lastElementChild;
    rightFilm.style.WebkitTransition = zero;
    changeWidth(rightFilm, zero, zero);
    carusel.prepend(rightFilm);
    rightFilm.style.WebkitTransition = durationOfTransition;
    setTimeout( () => {
      changeWidth(rightFilm, width, marginRight)
    }, zero);
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

function autoCarusel() {
  setTimeout( () => {
    move(buttonRight);
    autoCarusel();
  }, 5000)
}

function run() {
  if ( (screen.width >= 320) && (screen.width < 480) ) {
    durationOfTransition = '1000ms';
    addMovieFlippingTime(durationOfTransition)
    autoCarusel();
  } else if ( (screen.width >= 480) && (screen.width < 768) ) {
    durationOfTransition = '1000ms';
    addMovieFlippingTime(durationOfTransition)
    autoCarusel();
  } else if ((screen.width >= 768) && (screen.width < 1366)) {
    durationOfTransition = '1000ms';
    addMovieFlippingTime(durationOfTransition)
    autoCarusel();
  } else {
    main();
  }
}

window.onload = run;