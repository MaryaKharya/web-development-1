const Left = 'left';
const Right = 'right';
function swipeSlider() {
    let screenWidth = screen.width;
    let swipeSlider = {
        xStart: 0,
        xCurrent: 0,
        offset: 0,
        swipeThreshold: screenWidth / 3,
        countInserting: 0,
        leftPage: null,
        rightPage: null,
        start(event) {
            this.xStart = event.touches[0].clientX;
            this.leftPage = slider.firstElementChild;
            this.rightPage = slider.lastElementChild;
        },
        move(event) {
            this.xCurrent = event.touches[0].clientX;
            this.offset = this.xStart - this.xCurrent;
            console.log(`${this.offset}`)
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
            if ((offset > 0) && (offset < screenWidth)) {
                return Left;
            } else if ((offset < 0) && (offset > -screenWidth)) {
                return Right;
            } else {
                return null;
            }
        },
        moveToTheLeft() {
            this.leftPage.style.width = `calc(100vw - ${this.offset}px)`;
        },
        moveToTheRight() {
            if (this.countInserting === 0) {
                this.rightPage.style.width = '0';
                slider.prepend(this.rightPage);
                this.countInserting++;
            }
            let ABSOffset = Math.abs(this.offset);
            this.rightPage.style.width = `${ABSOffset}px`;
        },
        lastMovementLeft(offset) {
            this.leftPage.style.transition = 'all 300ms';
            if (offset < this.swipeThreshold) {
                this.leftPage.style.width = '100vw';
            } else {
                this.leftPage.style.width = '0';
                setTimeout( function() {
                    slider.append(swipeSlider.leftPage);
                    swipeSlider.leftPage.style.width = '100vw';
                },300);
            }
            setTimeout(function () {
                swipeSlider.leftPage.style.transition = 'all 0s';
            }, 300);
        },
        lastMovementRight(offset) {
            this.rightPage.style.transition = 'all 0.3s';
            if (offset > this.swipeThreshold) {
                this.rightPage.style.width = '100vw';
            } else {
                this.rightPage.style.width = '0';
                setTimeout( function() {
                    slider.append(swipeSlider.rightPage);
                    swipeSlider.rightPage.style.width = '100vw';
                },300);
            }
            setTimeout( function() {
                swipeSlider.rightPage.style.transition = 'all 0s';
                swipeSlider.countInserting = 0;
            }, 300);
        }
    }
    let slider = document.querySelector('.slider');
    for (page of slider.children) {
        page.addEventListener('touchstart', swipeSlider.start.bind(swipeSlider));
        page.addEventListener('touchmove', swipeSlider.move.bind(swipeSlider));
        page.addEventListener('touchend', swipeSlider.end.bind(swipeSlider));
    }
}