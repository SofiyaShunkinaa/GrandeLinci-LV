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
    PopUpHide();
});

function PopUpShow(value){
    $('html, body').scrollTop(0);
    $("#popup1").show();
    $("#catSelect").val(value);
}

function PopUpHide(){
    $("#popup1").hide();
}

function openPopup(value) {
    var url = "/core/layouts/pop-up/form.php" ;
    window.open(url, "Popup", "width=400, height=400");
}

// BUTTON SUBMIT
$('#submit-btn').click(function (e){
    e.preventDefault();

    let name = $('input[name="name"]').val(),
        email = $('input[name="email"]').val(),
        phone = $('input[name="phone_number"]').val(),
        q1 = $('input[name="q1"]').val(),
        q2 = $('input[name="q2"]').val(),
        q3 = $('input[name="q3"]').val(),
        q4 = $('input[name="q4"]').val(),
        kit_id = $('#catSelect').val(),
        submit1 = $('input[name="submit1"]').val(),
        submit2 = $('input[name="submit2"]').val();

    let formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('q1', q1);
    formData.append('q2', q2);
    formData.append('q3', q3);
    formData.append('q4', q4);
    formData.append('kit_id', kit_id);
    formData.append('submit1', submit1);
    formData.append('submit2', submit2);

    $.ajax({
        url: 'core/layouts/pop-up/get_data.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        success (data) {

            if(data.status){
                console.log("nice!")
            }else{
                console.log(data.field);
                $('.error').removeClass('none').text(data.field);
            }
        }
    })
});
