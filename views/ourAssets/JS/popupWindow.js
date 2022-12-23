const btns = document.querySelectorAll('.btn-absence');
const popupModals = document.querySelectorAll('.popup-modal-1');

for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click',()=>{
        popupModals[i].style.display = "flex";
    });
}

window.onclick = function(event) {
    for (let i = 0; i < popupModals.length; i++) {
        if (event.target === popupModals[i]) {
            popupModals[i].style.display = "none";
        }
    }
}
