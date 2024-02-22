// DROPDOWN LANG LIST
const lang_dropdown = document.querySelector('.dropdown');

lang_dropdown.addEventListener('click', function() {
    lang_dropdown.classList.add('open');
});

document.addEventListener('click', function(event) {
    if (!lang_dropdown.contains(event.target)) {
        lang_dropdown.classList.remove('open');
    }
});

//HOMEPAGE SLIDER
var splide = new Splide( '.splide', {
    perPage: 2,
    type   : 'loop',
    drag   : 'free',
    snap   : true,
} );

splide.mount();

//POPUP
$(document).ready(function(){
    //Скрыть PopUp при загрузке страницы
    PopUpHide();
});
//Функция отображения PopUp
function PopUpShow(value){
    $('html, body').scrollTop(0);
    $("#popup1").show();
    $("#catSelect").val(value);
}

//Функция скрытия PopUp
function PopUpHide(){
    $("#popup1").hide();
}
function openPopup(value) {
    var url = "/core/layouts/pop-up/form.php" ; // Передача значения через URL параметр
    window.open(url, "Popup", "width=400, height=400");
}
