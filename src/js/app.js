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

/******************* Logo color switch *************************************/

BackgroundCheck.init({
    targets: '.logo',
    images: '.image'
}); 

window.onload = (event) => {
    BackgroundCheck.refresh();
};
  
const HeaderLogo = document.querySelector('[data-logo]');
observer = new IntersectionObserver((entry, observer) => {
    BackgroundCheck.refresh();
});
observer.observe(HeaderLogo);
    

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

/******************* Review Slider *************************************/

const ReviewSliderContainer = document.querySelector('[data-siema-review-slider]');

if (ReviewSliderContainer != null){

    const ReviewSlider = new Siema({
        selector: '[data-siema-review-slider]',
        duration: 400,
        easing: 'ease-out',
        perPage: 2,
        startIndex: 0,
        draggable: true,
        multipleDrag: true,
        threshold: 20,
        loop: true,    
    });

    const ReviewSliderPrev = document.querySelector('[data-siema-review-slider-prev]');
    const ReviewSliderNext = document.querySelector('[data-siema-review-slider-next]');

    ReviewSliderPrev.addEventListener('click', () => ReviewSlider.prev());
    ReviewSliderNext.addEventListener('click', () => ReviewSlider.next());

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

/******************* Animate & Add Visitor Count *************************************/

const visitorNumber = document.querySelector('[data-visitor-count]');

if (visitorNumber != null){

    const startDateCount = visitorNumber.getAttribute('data-visitor-count-date');

    // We start with this amount of visitors
    let startCount = visitorNumber.getAttribute('data-visitor-start-count');

    // Amount of visitors per day 
    const dailyVisitors = visitorNumber.getAttribute('data-visitor-per-day');

    // Date that we started counting 
    const startDate = new Date(startDateCount);

    // Current date
    const today = new Date();

    // Calculating difference in days between current date and start date
    const timeDiff = Math.abs(today.getTime() - startDate.getTime());   
    const diffDays = Math.ceil(timeDiff /(1000 * 60 * 60 * 24));

    // Amount of visitors since startdate
    const diffVisitor = diffDays * parseInt(dailyVisitors);
    const visitorAmount = parseInt(startCount) + diffVisitor;

    if ('IntersectionObserver' in window) {

        observer = new IntersectionObserver((entry, observer) => {

            animateValue(visitorNumber, startCount, visitorAmount, 1200);

        });

        observer.observe(visitorNumber);
        
    } else {

        animateValue(visitorNumber, startCount, visitorAmount, 1000);

    }

}    

 // Animate the counter
 function animateValue(visitorCountEl, start, end, duration) {
    // assumes integer values for start and end
    const obj = visitorCountEl;
    let range = end - start;
    // no timer shorter than 50ms (not really visible any way)
    let minTimer = 50;
    // calc step time to show all interediate values
    let stepTime = Math.abs(Math.floor(duration / range));
    
    // never go below minTimer
    stepTime = Math.max(stepTime, minTimer);
    
    // get current time and calculate desired end time
    let startTime = new Date().getTime();
    let endTime = startTime + duration;
    let timer;

    function run() {
        let now = new Date().getTime();
        let remaining = Math.max((endTime - now) / duration, 0);
        let value = Math.round(end - (remaining * range));
        obj.innerHTML = Number(value).toLocaleString('en-US');
        if (value == end) {
            clearInterval(timer);
        }
    }
    
    timer = setInterval(run, stepTime);

    run();

}


/******************* Ticket Modal *************************************/

const ticketModal = document.querySelector('[data-ticket-modal]');
const ticketModalClose = document.querySelector('[data-ticket-modal-close]');

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

/******************* JS Tabs *************************************/

var Tabs = function(options) {
    var elem         = document.querySelector(options.elem),
        open         = options.open || 0,
        titleClass   = 'tab_title',
        activeClass  = 'tab_title-active',
        contentClass = 'tab_content',
        tabsNum      = elem.querySelectorAll('.' + titleClass).length;
        
    render();
    
    function render(n) {
        elem.addEventListener('click', onClick);

        var init = (n == null) ? checkTab(open) : checkTab(n);
  
        for (var i = 0; i < tabsNum; i++) {
            elem.querySelectorAll('.' + titleClass)[i].setAttribute('data-index', i);
            if (i === init) openTab(i);
        }
    }

    function onClick(e) {
        if (e.target.className.indexOf(titleClass) === -1) return;
        e.preventDefault();
        openTab(e.target.getAttribute('data-index'));
    }
    
    function reset() {
        [].forEach.call(elem.querySelectorAll('.' + contentClass), function(item) {
            item.style.display = 'none';
        });
        
        [].forEach.call(elem.querySelectorAll('.' + titleClass), function(item) {
            item.className = removeClass(item.className, activeClass);
        });
    }
    
    function removeClass(str, cls) {
        var reg = new RegExp('(\ )' + cls + '(\)', 'g');
        return str.replace(reg, '');
    }

    function checkTab(n) {
        return (n < 0 || isNaN(n) || n > tabsNum) ? 0 : n;
    }
    
    function openTab(n) {
        reset();

        var i = checkTab(n);

        elem.querySelectorAll('.' + titleClass)[i].className += ' ' + activeClass;
        elem.querySelectorAll('.' + contentClass)[i].style.display = '';
    }

    function update(n) {
        destroy();
        reset();
        render(n);
    }

       function destroy() {
        elem.removeEventListener('click', onClick);
    }

    return {
        open: openTab,
        update: update,
        destroy: destroy
    };
};

/** Mobile Menu Tabs **/

if (window.matchMedia("(max-width: 767px)").matches) {

    var mobileMenuTabs = new Tabs({
        elem: '[data-mobile-menu-tabs]',
        open: 1
    });

}