
// Popup Window
const toggleWindow = () =>document.querySelector('.popup-modal-1').style.display = "flex";
const addClickEvent = elem => elem.addEventListener('click', toggleWindow);

//Open overlay
document.querySelectorAll('.btn-absence').forEach(addClickEvent);

// Close overlay
// document.querySelector('.popup-window-1 i').addEventListener('click', function() {
//     document.querySelector(".popup-modal-1").style.display = "none";
// });

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == document.querySelector('.popup-modal-1')) {
        document.querySelector('.popup-modal-1').style.display = "none";
    }
}
