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


/******************* Logo color switch *************************************/

BackgroundCheck.init({
    targets: '.logo',
    images: '.image'
});    
  
window.onload = function () {
    BackgroundCheck.refresh();     
};

/******************* Hero Read More Button *************************************/

const ReadMoreBtn = document.querySelector('[data-read-more-btn]');
let pageHeight = window.innerHeight;

if (ReadMoreBtn != null){

    ReadMoreBtn.addEventListener('click', function(){
        window.scrollBy(0, pageHeight);
    });

}

/******************* Image Slider Scroll Right Button *************************************/

const HorizontalScrollContainer = document.querySelector('[data-horizontal-slider-container]');

function sideScroll(element,direction,speed,distance){
    scrollAmount = 0;
    step = window.innerWidth/2;
    var slideTimer = setInterval(function(){
        if(direction == 'left'){
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if(scrollAmount >= distance){
            window.clearInterval(slideTimer);
        }
    }, speed);
}

if (HorizontalScrollContainer != null){

    const HorizontalScrollBtnLeft = document.querySelector('[data-slide-left-btn]');
    const HorizontalScrollBtnRight = document.querySelector('[data-slide-right-btn]');

    HorizontalScrollBtnRight.addEventListener('click', function(){
        sideScroll(HorizontalScrollContainer, 'right', 25, 100);
        HorizontalScrollBtnLeft.classList.remove('hidden');
        BackgroundCheck.refresh(); 
    });

    HorizontalScrollBtnLeft.addEventListener('click', function(){
        sideScroll(HorizontalScrollContainer, 'left', 25, 100);
        BackgroundCheck.refresh();
    });

}

/******************* Hero Slider *************************************/

const HeroSliderContainer = document.querySelector('[data-siema-hero-slider]');

if (HeroSliderContainer != null){

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

}




/******************* Related Post Slider *************************************/

const RelatedPostSliderContainer = document.querySelector('[data-siema-related-post-slider]');

if (RelatedPostSliderContainer != null){

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

}

/******************* Promo Slider *************************************/


const PromoSliderContainer = document.querySelector('[data-siema-promo-slider]');

if (PromoSliderContainer != null){

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

}