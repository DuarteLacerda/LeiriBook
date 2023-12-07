document.addEventListener('DOMContentLoaded', function () {
    var cards = document.querySelectorAll('.card');




    cards.forEach(function (card) {
      card.addEventListener('click', function () {
        card.classList.toggle('expanded');
        var content = card.querySelector('.content');
        if (card.classList.contains('expanded')) {
          content.style.display = 'block';
        } else {
          content.style.display = 'none';
        }
      });
    });





  });
