class Slider {
  constructor() {
    this.slides = document.querySelectorAll("[data-slide]");
    this.dotsContainer = document.querySelector("[data-dots-container]");
    this.btnPrev = document.querySelector("[data-btn-prev]");
    this.btnNext = document.querySelector("[data-btn-next]");

    (this.slideIndex = 0), this.next, (this.dots = []);

    this.indexInterval = null;
    this.initSlider();
  }

  startSlider() {
    this.indexInterval = setInterval(
      () => this.moveSlide(this.slideIndex + 1),
      7000
    );
  }

  initSlider() {
    if (this.slides.length > 1) {
      this.slides[this.slideIndex].style.opacity = 1;
      for (let i = 0; i < this.slides.length; i++) {
        let dot = document.createElement("div");
        dot.classList.add("site-slider__dots");
        this.dotsContainer.append(dot);
        this.dots.push(dot);
      }
      this.dots[this.slideIndex].classList.add("site-slider__dots--active");
      this.dots.forEach((dot, index) => {
        dot.addEventListener("click", () => this.changeSlider(index));
      });
      this.btnPrev.addEventListener("click", () =>
        this.changeSlider(this.slideIndex - 1)
      );
      this.btnNext.addEventListener("click", () =>
        this.changeSlider(this.slideIndex + 1)
      );
    }
  }

  changeSlider(index) {
    clearInterval(this.indexInterval);
    this.moveSlide(index);
    this.indexInterval = setInterval(() => {
      this.moveSlide(this.slideIndex + 1);
    }, 7000);
  }
  moveSlide(n) {
    let moveSlideAnimClass = {
      forCurrent: "",
      forNext: "",
    };

    if (n > this.slideIndex) {
      if (n >= this.slides.length) n = 0;
      moveSlideAnimClass.forCurrent = "site-slider--moveLeftCurrentSlide";
      moveSlideAnimClass.forNext = "site-slider--moveLeftNextSlide";
    } else if (n < this.slideIndex) {
      if (n < 0) n = this.slides.length - 1;
      moveSlideAnimClass.forCurrent = "site-slider--moveRightCurrentSlide";
      moveSlideAnimClass.forNext = "site-slider--moveRightPrevSlide";
    }
    if (n != this.slideIndex) {
      this.next = this.slides[n];
      let current = this.slides[this.slideIndex];
      for (let i = 0; i < this.slides.length; i++) {
        this.slides[i].className = "site-slider__slide";
        this.slides[i].style.opacity = 0;
        this.dots[i].classList.remove("site-slider__dots--active");
      }
      current.classList.add(moveSlideAnimClass.forCurrent);
      this.next.classList.add(moveSlideAnimClass.forNext);
      this.dots[n].classList.add("site-slider__dots--active");
      this.slideIndex = n;
    }
  }
}

export default Slider;