const buttonLeft = 'arrow_left';
const buttonRight = 'arrow_right';
const timeout = 200;
const zero = 0;
const width = 285;
const number = 'number';
const marginRight = 20;
let durationOfTransition = '160ms';
let numberOfClicks = 0;
let toggleForDescriptions = 0;

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

function mainForMobile() {
  let toggles = document.querySelectorAll('.toggle_description');
  for (toggle of toggles) {
    toggle.addEventListener('click', toggleFilmDescription);
  }
  //Запускаем свайп-слайдер..
}

function toggleFilmDescription(e) {
  let descriptions = document.querySelectorAll('.film_text');
  for (description of descriptions) {
    description.classList.toggle('active');
  }
  if (toggleForDescriptions === 0) {
    e.target.innerHTML = 'Скрыть';
    toggleForDescriptions = 1;
    //При нажатии фиксировать pageYOffset
  } else {
    e.target.innerHTML = 'Подробнее';
    toggleForDescriptions = 0;
    //При нажатии фиксировать pageYOffset
  }
}

function showMenu() {
  let burger = document.querySelector('.burger');
  let nav = document.querySelector('.nav');
  burger.classList.toggle('active');
  nav.classList.toggle('active');
}

function run() {
  let nav = document.querySelector('.nav');
  nav.classList.toggle('transition');
  if (screen.width < 1024) {
    let burger = document.querySelector('.burger');
    burger.addEventListener('click', showMenu);
    burger.classList.toggle('transition');
    nav.addEventListener('click', showMenu);
    mainForMobile();
  } else {
    window.addEventListener('scroll', function () {
      if (pageYOffset >= 40) {
        nav.classList.add('hidden')
      } else {
        nav.classList.remove('hidden')
      }
    })
    main();
  }
}

window.onload = run;