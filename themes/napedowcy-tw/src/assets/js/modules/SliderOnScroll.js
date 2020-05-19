import throttle from "lodash/throttle";
import debounce from "lodash/debounce";

import Slider from "./Slider";

class SliderOnScroll {
  constructor(tresholdPercent) {
    this.tresholdPercent = tresholdPercent;
    this.dataSlider = document.querySelector("[data-slider]");
    this.browserHeight = window.innerHeight;
    this.scrollThrottle = throttle(this.calcCaller, 200).bind(this);
    this.slider = null
    this.events();
  }
  events() {
    if (this.dataSlider) {
      this.slider = new Slider();
      window.addEventListener("scroll", this.scrollThrottle);
      window.addEventListener(
        "resize",
        debounce(() => {
          this.browserHeight = window.innerHeight;
        }, 333)
      );
    }
  }
  calcCaller() {
    if (!this.dataSlider.isRevealed) this.calculeteIfScrolledTo(this.dataSlider);
  }
  calculeteIfScrolledTo(el) {
    if (window.scrollY + this.browserHeight > el.offsetTop) {
      let scrollPercent =
        (el.getBoundingClientRect().y / this.browserHeight) * 100;
      if (scrollPercent < this.tresholdPercent) {
        this.slider.startSlider();
        window.removeEventListener("scroll", this.scrollThrottle);
      }
    }
  }
}

export default SliderOnScroll;