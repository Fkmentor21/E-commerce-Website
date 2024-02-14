const header = document.querySelector('header');

function fixedNavbar() {
    header.classList.toggle('scroll', window.scrollY > 0);
}

fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click', function () {
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
});

userBtn.addEventListener('click', function () {
    let userBox = document.querySelector('.user-box'); // Corrected selector
    userBox.classList.toggle('active');
});


//  home slider 

 "use strict" ;

 const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow'),
       rightArrow = document.querySelector('.right-arrow .bxs-right-arrow'), // Corrected selector
       slider = document.querySelector('.slider');
 
 // Scroll to the right
 function scrollRight() {
    if (slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {
       slider.scrollTo({
          left: 0,
          behavior: "smooth" // Corrected property name
       });
    } else {
       slider.scrollBy({
          left: window.innerWidth,
          behavior: "smooth" // Corrected property name
       });
    }
 }
 
 // Scroll to the left
 function scrollLeft() {
    slider.scrollBy({
       left: -window.innerWidth,
       behavior: "smooth" // Corrected property name
    });
 }
 
 let timerId = setInterval(scrollRight, 7000);
 
 // Reset timer to scroll right
 function resetTimer() {
    clearInterval(timerId);
    timerId = setInterval(scrollRight, 7000);
 }
 
 // Scroll event
 slider.addEventListener('click', function (ev) {
    if (ev.target === leftArrow) {
       scrollLeft();
       resetTimer();
    } else if (ev.target === rightArrow) { // Combined two event listeners into one using else if
       scrollRight();
       resetTimer();
    }
 });

// ------------- testimoniial slider ----------------















