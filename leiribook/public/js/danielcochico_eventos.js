let slideIndex = 1;
let slideTimer;

function resetTimer() {
    clearInterval(slideTimer);
    slideTimer = setInterval(function () {
        plusSlides(1);
    }, 10000);
}

showSlides(slideIndex);
resetTimer();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    resetTimer();
}

$(document).ready(function () {

    $('.prev').hide();
    $('.next').hide();

    $('#sliders').hover(
        function () {

            $('.prev').fadeIn(600);
            $('.next').fadeIn(600);
        },
        function () {

            $('.prev').fadeOut(600);
            $('.next').fadeOut(600);
        }
    );
});

function onMouseOver(element) {
    element.classList.add('hovered');
    resetTimer();
}

function onMouseOut(element) {
    element.classList.remove('hovered');
}
