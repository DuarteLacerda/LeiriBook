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

function filterEvents(filter) {
    const eventos = document.querySelectorAll('#eventos-container .eventos-carta');


    const buttons = document.querySelectorAll('#botaodatas button');
    buttons.forEach(button => {
        button.classList.remove('active');
    });


    const activeButton = document.querySelector(`#botaodatas button[data-filter="${filter}"]`);
    activeButton.classList.add('active');


    eventos.forEach(evento => {
        evento.style.transition = 'opacity 0.6s ease-in-out';
        evento.style.opacity = 0;
        setTimeout(() => {
            evento.style.display = 'none';
        }, 400);
    });


    setTimeout(() => {
        eventos.forEach(evento => {
            const dataInicio = new Date(evento.dataset.dataInicio);
            const dataFim = new Date(evento.dataset.dataFim);
            const currentDate = new Date();

            switch (filter) {
                case 'decorrer':
                    if (dataInicio <= currentDate && dataFim >= currentDate) {
                        evento.style.display = 'block';
                        evento.style.opacity = 1;
                    }
                    break;
                case 'futuro':
                    if (dataInicio > currentDate) {
                        evento.style.display = 'block';
                        evento.style.opacity = 1;
                    }
                    break;
                case 'passado':
                    if (dataFim < currentDate) {
                        evento.style.display = 'block';
                        evento.style.opacity = 1;
                    }
                    break;
                default:
                    evento.style.display = 'block';
                    evento.style.opacity = 1;
            }
        });
    }, 400);
}

