$(document).ready(function () {
    $(".card").each(function (index) {
        // Use fadeIn para transição suave
        $(this).delay(250 * index).fadeIn();
    });

    // Adicione um manipulador de evento para os botões
    $('.card-header button').on('click', function () {
        // Encontre o alvo do botão, que é o próximo elemento de colapso
        var targetCollapse = $(this).attr('data-target');

        // Alternar a visibilidade do elemento de colapso
        $(targetCollapse).collapse('toggle');
    });
});
