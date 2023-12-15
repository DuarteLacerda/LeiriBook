$(document).ready(); {
    // Get the modal
    var modal = document.getElementById("navModal");
    // Get the button that opens the modal
    var btn = document.getElementById("search");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.classList.remove("modal-hidden");
        modal.classList.add("modal-visible");
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.classList.remove("modal-visible");
            modal.classList.add("modal-hidden");
        }
    }
    document.getElementById('navbarDropdown').addEventListener('click', function (event) {
        event.preventDefault();
        var dropdownMenu = this.nextElementSibling;
        if (dropdownMenu.classList.contains('show')) {
            dropdownMenu.classList.remove('show');
            setTimeout(function () {
                dropdownMenu.style.visibility = 'hidden';
            }, 500); // Matches the transition duration
        } else {
            dropdownMenu.style.visibility = 'visible';
            dropdownMenu.classList.add('show');
        }
    });
};
