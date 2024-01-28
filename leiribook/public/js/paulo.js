function toggleViewMode() {
    // var pedidosList = document.querySelector('.pedidos-list');

    // // Toggle between grid and list views
    // pedidosList.classList.toggle('grid-view');

    // Change the class of all .pedido-card elements inside .pedidos-list
    var pedidoCards = document.querySelectorAll('.pedidos-list .pedido-card');
    pedidoCards.forEach(function (card) {
        card.classList.toggle('list-card');
        card.classList.toggle('vertical-card');
    });
}

// Attach the function to the button clicks
document.getElementById('grid-list').addEventListener('click', toggleViewMode);
document.getElementById('icon-list').addEventListener('click', toggleViewMode);








function updateSearchResults() {
    var searchBar = document.getElementById('searchBar');
    var query = searchBar.value.toLowerCase();

    var pedidoCards = document.querySelectorAll('.pedidos-list .pedido-card');

    pedidoCards.forEach(function (card) {
        var cardTitle = card.querySelector('.pedido-info .card-title');
        var originalTitle = cardTitle.textContent;  // Keep the original case for styling

        // Clear previous highlighting
        cardTitle.innerHTML = originalTitle;

        // Highlight matching text
        if (originalTitle.toLowerCase().includes(query)) {
            var startIndex = originalTitle.toLowerCase().indexOf(query);
            var endIndex = startIndex + query.length;
            var highlightedText = originalTitle.substring(0, startIndex) +
                '<span class="highlight">' + originalTitle.substring(startIndex, endIndex) + '</span>' +
                originalTitle.substring(endIndex);
            cardTitle.innerHTML = highlightedText;
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Attach the function to the input event of the search bar
document.getElementById('searchBar').addEventListener('input', updateSearchResults);
