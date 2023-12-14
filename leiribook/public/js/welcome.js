// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

let slideIndex = 0;
let slides = document.getElementsByClassName("slider")[0].getElementsByTagName("img");
showSlides();

// Automatic slideshow - change image every 3 seconds
let slideInterval = setInterval(function () {
    slideIndex++;
    showSlides();
}, 5000);

document.getElementById("next").addEventListener("click", function () {
    slideIndex++;
    clearInterval(slideInterval); // Stop the automatic slideshow when user manually changes slide
    showSlides();
    slideInterval = setInterval(function () { // Restart the automatic slideshow
        slideIndex++;
        showSlides();
    }, 5000);
});

document.getElementById("prev").addEventListener("click", function () {
    slideIndex--;
    clearInterval(slideInterval); // Stop the automatic slideshow when user manually changes slide
    showSlides();
    slideInterval = setInterval(function () { // Restart the automatic slideshow
        slideIndex++;
        showSlides();
    }, 5000);
});

function showSlides() {
    if (slideIndex >= slides.length) { slideIndex = 0 }
    if (slideIndex < 0) { slideIndex = slides.length - 1 }

    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
        slides[i].classList.remove('next');
    }

    slides[slideIndex].classList.add('active');
    slides[(slideIndex + 1) % slides.length].classList.add('next');
}
