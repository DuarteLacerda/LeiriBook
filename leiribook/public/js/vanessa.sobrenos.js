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



$(document).ready(function () {
    $(window).scroll(function () {
        var windowHeight = $(window).height();
        var scrollPosition = $(window).scrollTop();

        $("#leiriBookRow").each(function () {
            var offset = $(this).offset().top;

            if (scrollPosition > offset - windowHeight + 200) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });
    });
});


$(document).ready(function () {
    $(window).scroll(function () {
        var windowHeight = $(window).height();
        var scrollPosition = $(window).scrollTop();

        // id leiriBookRow
        $("#leiriBookRow").each(function () {
            var offset = $(this).offset().top;

            if (scrollPosition > offset - windowHeight + 200) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });

        // id titulo
        $("#leiriBookTitulo").each(function () {
            var offset = $(this).offset().top;

            if (scrollPosition > offset - windowHeight + 200) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });




        // id leiriBookDescricao
        // $("#leiriBookDescricao").each(function () {
        //     var offset = $(this).offset().top;

        //     if (scrollPosition > offset - windowHeight + 200) {
        //         $(this).css({
        //             'opacity': '1',
        //             'transform': 'translateY(0)'
        //         });
        //     }
        // });

        // id historia
        // $("#leiriBookHistoria").each(function () {
        //     var offset = $(this).offset().top;

        //     if (scrollPosition > offset - windowHeight + 200) {
        //         $(this).css({
        //             'opacity': '1',
        //             'transform': 'translateY(0)'
        //         });
        //     }
        // });




        // id leiriBookEquipa
        $("#leiriBookEquipa").each(function () {
            var offset = $(this).offset().top;

            if (scrollPosition > offset - windowHeight + 200) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });

        // id Eq
        $("#leiriBookEq").each(function () {
            var offset = $(this).offset().top;

            if (scrollPosition > offset - windowHeight + 200) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });
    });
});

$(document).ready(function () {
    // id leiriBookHistoria
    $("#leiriBookHistoria").each(function () {
        $(this).css({
            'opacity': '1',
            'transform': 'translateY(0)'
        });
    });

    $("#leiriBookDescricao").each(function () {
        $(this).css({
            'opacity': '1',
            'transform': 'translateY(0)'
        });
    });


    $(".card").addClass("show");



});
