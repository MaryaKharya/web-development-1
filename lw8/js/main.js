function main() {
  const width = 305;
  let offset = -(7 * width);
  let count = 0;
  let numberOfClicks = 0;
  const carusel = document.getElementById('carusel');
  const arrowLeft = document.getElementById('arrow_left');
  const arrowRight = document.getElementById('arrow_right');
  carusel.style.WebkitTransitionDuration = '200ms';
  arrowLeft.addEventListener("click", handlerArrow);
  arrowRight.addEventListener("click", handlerArrow);
  move(null);

  function move(button) {
    if (button === arrowLeft) {
      offset -= width;
      count++;
    } else if (button === arrowRight) {
      offset += width;
      count--;
    }
    carusel.style.WebkitTransform = `translateX(${offset}px)`;
  }

  function reset() {
    count = 0;
    offset = -(7 * width);
    carusel.style.WebkitTransitionDuration = '0s';
    move(null);
    setTimeout(function () {
      carusel.style.WebkitTransitionDuration = '200ms';
    }, 20);
  }

  function handlerArrow() {
    numberOfClicks++;
    if (numberOfClicks === 1) {
      move(event.target);
      if ((count >= 7) || (count <= -7)) {
        setTimeout(reset, 200);
      }
      setTimeout(() => numberOfClicks = 0, 230);
    }
  }
}

window.onload = main;