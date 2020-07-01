/*jshint esversion: 6 */


/* Language & Main menu */

const   languageToggle = document.querySelector('[data-language-menu-toggle]'),
        languageClose = document.querySelector('[data-language-close]'),
        languageMenu = document.querySelector('[data-language-menu]'),
        mainToggle = document.querySelector('[data-main-menu-toggle]'),
        mainClose = document.querySelector('[data-main-close]'),
        mainMenu = document.querySelector('[data-main-menu]');

languageToggle.addEventListener('click', function(e) {
    e.preventDefault();
    languageMenu.classList.remove('hidden');
    languageMenu.classList.add('visible');
});

languageClose.addEventListener('click', function(e) {
    e.preventDefault();
    languageMenu.classList.add('hidden');
    languageMenu.classList.remove('visible');
}); 

mainToggle.addEventListener('click', function(e) {
    e.preventDefault();
    mainMenu.classList.remove('hidden');
    mainMenu.classList.add('visible');
});

mainClose.addEventListener('click', function(e) {
    e.preventDefault();
    mainMenu.classList.add('hidden');
    mainMenu.classList.remove('visible');
}); 



/* Logo color switch */

BackgroundCheck.init({
    targets: '.logo',
    images: '.image'
});    
  
window.onload = function () {
    BackgroundCheck.refresh(); 
};


/******************* Hero Slider *************************************/

const heroSlider = new Siema({
    selector: '[data-siema-hero-slider]',
    duration: 400,
    easing: 'ease-out',
    perPage: 1,
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    threshold: 20,
    loop: true,    
  });

const HeroSliderPrev = document.querySelector('[data-siema-hero-slider-prev]');
const HeroSliderNext = document.querySelector('[data-siema-hero-slider-next]');

HeroSliderPrev.addEventListener('click', () => heroSlider.prev());
HeroSliderNext.addEventListener('click', () => heroSlider.next());

/******************* Hero Read More Button *************************************/

const ReadMoreBtn = document.querySelector('[data-read-more-btn]');
let pageHeight = window.innerHeight;

ReadMoreBtn.addEventListener('click', function(){
    window.scrollBy(0, pageHeight);
});



/******************* Related Post Slider *************************************/

const RelatedPostSlider = new Siema({
    selector: '[data-siema-related-post-slider]',
    duration: 400,
    easing: 'ease-out',
    perPage: 3,
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    threshold: 20,
    loop: true,    
  });

const RelatedPostSliderPrev = document.querySelector('[data-siema-related-post-slider-prev]');
const RelatedPostSliderNext = document.querySelector('[data-siema-related-post-slider-next]');

RelatedPostSliderPrev.addEventListener('click', () => RelatedPostSlider.prev());
RelatedPostSliderNext.addEventListener('click', () => RelatedPostSlider.next());


/******************* Promo Slider *************************************/

const PromoSlider = new Siema({
    selector: '[data-siema-promo-slider]',
    duration: 400,
    easing: 'ease-out',
    perPage: 1,
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    threshold: 20,
    loop: true,    
  });

const PromoSliderPrev = document.querySelector('[data-siema-promo-slider-prev]');
const PromoSliderNext = document.querySelector('[data-siema-promo-slider-next]');

PromoSliderPrev.addEventListener('click', () => PromoSlider.prev());
PromoSliderNext.addEventListener('click', () => PromoSlider.next());