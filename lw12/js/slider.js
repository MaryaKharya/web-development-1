const Left = 'left';
const Right = 'right';
function swipeSlider() {
    let filmWidth = 305;
    let swipeSlider = {
        xStart: 0,
        xCurrent: 0,
        offset: 0,
        swipeThreshold: filmWidth / 3,
        countInserting: 0,
        leftFilm: null,
        rightFilm: null,
        start(event) {
            this.xStart = event.touches[0].clientX;
            this.leftFilm = carusel.firstElementChild;
            this.rightFilm = carusel.lastElementChild;
        },
        move(event) {
            this.xCurrent = event.touches[0].clientX;
            this.offset = this.xStart - this.xCurrent;
            if (this.direction(this.offset) === Left) {
                this.moveToTheLeft();
            } else if (this.direction(this.offset) === Right) {
                this.moveToTheRight();
            }
            event.preventDefault();
        },
        end() {
            if ( this.direction(this.offset) === Left ) {
                this.lastMovementLeft(this.offset);
            } else if (this.direction(this.offset) === Right) {
                this.lastMovementRight( Math.abs(this.offset) );
            }
        },
        direction(offset) {
            if (offset > 0) {
                return Left;
            } else if (offset < 0) {
                return Right;
            } else {
                return null;
            }
        },
        moveToTheLeft() {
            if (this.offset < filmWidth) {
                this.leftFilm.style.width = `calc(285px - ${this.offset}px)`;
            }
        },
        moveToTheRight() {
            if (this.countInserting === 0) {
                this.rightFilm.style.width = '0';
                carusel.prepend(this.rightFilm);
                this.countInserting++;
            }
            if (-this.offset < filmWidth) {
                let ABSOffset = Math.abs(this.offset);
                this.rightFilm.style.width = `${ABSOffset}px`;
            }
        },
        lastMovementLeft(offset) {
            this.leftFilm.style.transition = 'all 300ms';
            if (offset < this.swipeThreshold) {
                this.leftFilm.style.width = '285px';
                this.leftFilm.style.marginRight = '20px';
            } else {
                this.leftFilm.style.width = '0';
                this.leftFilm.style.marginRight = '0';
                setTimeout( function() {
                    carusel.append(swipeSlider.leftFilm);
                    swipeSlider.leftFilm.style.width = '285px';
                    swipeSlider.leftFilm.style.marginRight = '20px';
                },300);
            }
            setTimeout(function () {
                swipeSlider.leftFilm.style.transition = 'all 0s';
            }, 300);
        },
        lastMovementRight(offset) {
            this.rightFilm.style.transition = 'all 0.3s';
            if (offset > this.swipeThreshold) {
                this.rightFilm.style.width = '285px';
                this.rightFilm.style.marginRight = '20px';
            } else {
                this.rightFilm.style.width = '0';
                this.rightFilm.style.marginRight = '0';
                setTimeout( function() {
                    carusel.append(swipeSlider.rightFilm);
                    swipeSlider.rightFilm.style.width = '285px';
                    swipeSlider.rightFilm.style.marginRight = '20px';
                },300);
            }
            setTimeout(function() {
                swipeSlider.rightFilm.style.transition = 'all 0s';
                swipeSlider.countInserting = 0;
            }, 300);
        }
    }
    let carusel = document.getElementById('carusel');
    let filmPhotos = document.querySelectorAll('.film_photo');
    for (photo of filmPhotos) {
        photo.addEventListener('touchstart', swipeSlider.start.bind(swipeSlider));
        photo.addEventListener('touchmove', swipeSlider.move.bind(swipeSlider));
        photo.addEventListener('touchend', swipeSlider.end.bind(swipeSlider));
    }
}