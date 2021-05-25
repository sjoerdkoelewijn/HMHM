/*jshint esversion: 6 */

/* Language & Main menu */

const   languageToggle = document.querySelectorAll('[data-language-menu-toggle]'),
        languageClose = document.querySelectorAll('[data-language-close]'),
        languageMenu = document.querySelector('[data-language-menu]'),
        mainToggle = document.querySelector('[data-main-menu-toggle]'),
        mainClose = document.querySelectorAll('[data-main-close]'),
        mainMenu = document.querySelector('[data-main-menu]');

languageToggle.forEach(function(elem) {

    elem.addEventListener('click', function(e) {
        e.preventDefault();
        languageMenu.classList.remove('hidden');
        languageMenu.classList.add('visible');
    });

});

languageClose.forEach(function(elem) {

    elem.addEventListener('click', function(e) {
        e.preventDefault();
        languageMenu.classList.add('hidden');
        languageMenu.classList.remove('visible');
    }); 

});

mainToggle.addEventListener('click', function(e) {
    e.preventDefault();
    mainMenu.classList.remove('hidden');
    mainMenu.classList.add('visible');
});

mainClose.forEach(function(elem) {

    elem.addEventListener('click', function(e) {
        e.preventDefault();
        mainMenu.classList.add('hidden');
        mainMenu.classList.remove('visible');
    });  

});


/******************* Hero Read More Button *************************************/

const ReadMoreBtn = document.querySelector('[data-read-more-btn]');
let pageHeight = window.innerHeight;

if (ReadMoreBtn != null) {

    ReadMoreBtn.addEventListener('click', function(){
        window.scrollBy(0, pageHeight);
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

    const HeroSliderNext = document.querySelector('[data-siema-hero-slider-next]');
    const HeroSliderPrev = document.querySelector('[data-siema-hero-slider-prev]');

    HeroSliderNext.addEventListener('click', () => heroSlider.next());
    HeroSliderPrev.addEventListener('click', () => heroSlider.prev());
    
}

/******************* Home Hero Mobile Slider *************************************/

const MobileHeroSliderContainer = document.querySelector('[data-siema-home-hero-mobile-slider]');

if (MobileHeroSliderContainer != null){

    const MobileHeroSlider = new Siema({
        selector: '[data-siema-home-hero-mobile-slider]',
        duration: 400,
        easing: 'ease-out',
        perPage: 1,
        startIndex: 0,
        draggable: true,
        multipleDrag: true,
        threshold: 20,
        loop: true,    
    });

    const MobileHeroSliderNext = document.querySelector('[data-siema-home-hero-mobile-slider-next]');

    MobileHeroSliderNext.addEventListener('click', () => MobileHeroSlider.next());

}

/******************* Home hero *************************************/

const item1 = document.getElementById("item_1");
const item2 = document.getElementById("item_2");
const item3 = document.getElementById("item_3");

const image1 = document.getElementById("image_1");
const image2 = document.getElementById("image_2");
const image3 = document.getElementById("image_3");

if (item1 != null){

    item1.addEventListener("mouseover", functionMouseOver1, false);
    item2.addEventListener("mouseover", functionMouseOver2, false);
    item3.addEventListener("mouseover", functionMouseOver3, false);

}

function functionMouseOver1(){
    item1.classList.add("active");
        item2.classList.remove("active");
        item3.classList.remove("active");
        image1.classList.add("active");
        image2.classList.remove("active");
        image3.classList.remove("active");
    }

    function functionMouseOver2(){
    item2.classList.add("active");
        item1.classList.remove("active");
        item3.classList.remove("active");
        image2.classList.add("active");
        image1.classList.remove("active");
        image3.classList.remove("active");
    }

    function functionMouseOver3(){
    item3.classList.add("active");
        item1.classList.remove("active");
        item2.classList.remove("active");
        image3.classList.add("active");
        image1.classList.remove("active");
        image2.classList.remove("active");
    }



/******************* Ticket Modal *************************************/

const ticketModal = document.querySelector('[data-ticket-modal]');
const ticketModalClose = document.querySelector('[data-ticket-modal-close]');

if (ticketModal != null) {

    ticketModalClose.addEventListener('click', function(event) {
        event.preventDefault();
        ticketModal.classList.remove('active');
    }); 
    
    document.querySelectorAll('a[href="#tickets"]').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            ticketModal.classList.add('active');
        });
      });

}


/******************* Top & Bottom Menu Hide *************************************/

if (window.matchMedia("(max-width: 799px)").matches) {

    const body = document.querySelector('[data-mobile-menu-hide]');
    const scrollUp = "scroll-up";
    const scrollDown = "scroll-down";
    let lastScroll = 0;

    window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    if (currentScroll == 0) {
        body.classList.remove(scrollUp);
        return;
    }
    
    if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
        // down
        body.classList.remove(scrollUp);
        body.classList.add(scrollDown);
    } else if (currentScroll < lastScroll && body.classList.contains(scrollDown)) {
        // up
        body.classList.remove(scrollDown);
        body.classList.add(scrollUp);
    }
    lastScroll = currentScroll;
    });

}

/******************* Logo color switch *************************************/

if (window.matchMedia("(min-width: 800px)").matches) {

    BackgroundCheck.init({
        targets: '.logo',
        images: '.image'
    }); 

    window.addEventListener('load', (event) => {
        BackgroundCheck.refresh();
    });
    
    const HeaderLogo = document.querySelector('[data-logo]');
    observer = new IntersectionObserver((entry, observer) => {
        BackgroundCheck.refresh();
    });
    observer.observe(HeaderLogo);

}