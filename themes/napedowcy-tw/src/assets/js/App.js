// import "../styles/styles.css";
import MobileMenu from "./modules/MobileMenu";
import RevealOnScroll from "./modules/RevealOnScroll";
import StickyHeader from "./modules/StickyHeader";
// import Slider from "./modules/Slider";
import SliderOnScroll from "./modules/SliderOnScroll";

// let slider = new Slider();
let sliderOnScroll = new SliderOnScroll(90);
let stickyHeader = new StickyHeader(80);
let mobileMenu = new MobileMenu();

new RevealOnScroll(document.querySelectorAll(".scroll"), 90);
new RevealOnScroll(document.querySelectorAll(".main-section__title"), 90);
new RevealOnScroll(document.querySelectorAll(".article"), 90);
new RevealOnScroll(document.querySelectorAll(".main-section__btn"), 90);
new RevealOnScroll(document.querySelectorAll(".site-slider__text-content"), 90);
if (module.hot) {
  module.hot.accept();
}

let x = 0

console.log(x)