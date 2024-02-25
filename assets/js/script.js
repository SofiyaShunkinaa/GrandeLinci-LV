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

// SELECT ONCHANGE
function getKitId() {
    const selector = document.getElementById('catImage');
    let kitId = document.getElementById('catSelect').value;
    const data = JSON.parse(document.getElementById('catSelect').getAttribute('data-kittens'));

    const selectedKitten = data.find(kitten => kitten.id === kitId);
    if (selectedKitten) {
        const img_path = selectedKitten.img_path;
        selector.style.backgroundImage = "url('" + img_path + "')";
    }
}

function PopUpShow(value){
    $('html, body').scrollTop(0);
    $("#popup1").show();
    $("#catSelect").val(value);
    getKitId()
}

function PopUpHide(){
    $("#popup1").hide();
}

function openPopup(value) {
    var url = "/core/layouts/pop-up/form.php" ;
    window.open(url, "Popup", "width=400, height=400");
}

// BUTTON SUBMIT
$('input').bind('blur', function(e){
    e.preventDefault();

    $('input').each(function(){
        $(this).removeClass('error_field');
    });

    let name = $('input[name="name"]').val(),
        email = $('input[name="email"]').val(),
        phone = $('input[name="phone"]').val(),
        q1 = $('input[name="q1"]').val(),
        q2 = $('input[name="q2"]').val(),
        q3 = $('input[name="q3"]').val(),
        q4 = $('input[name="q4"]').val(),
        kit_id = $('#catSelect').val();

    $.ajax({
        url: 'core/layouts/pop-up/get_data.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            name: name,
            phone: phone,
            q1: q1,
            q2: q2,
            q3: q3,
            q4: q4,
            kit_id: kit_id
        },
        success(data) {
            if(data.status ) {
                //$('.form-checkboxes').css({'color': 'var(--a-gray)'});
                $('input').removeClass('error-field');
                $('.error').addClass('none');
                data.successed.forEach(function(field) {
                    $('input[name="' + field + '"]').addClass('success-field');
                });
                console.log("success");
            } else {
                $('.error').removeClass('none').text(data.field);

                // let checkbox = $('input[name="policy"]');
                // if(checkbox.prop('checked')) {
                //     $('.form-checkboxes').css({'color': 'var(--a-gray)'});
                // }
                // else {
                //     $('.form-checkboxes').css({'color': 'red'});
                //     $('.error').removeClass('none').text("Check policy privacy!");
                // }

                data.fields.forEach(function(field) {
                    $('input[name="' + field + '"]').addClass('error-field');
                });

                data.successed.forEach(function(field) {
                    $('input[name="' + field + '"]').addClass('success-field');
                });

            }
        }

    })
});

// BUTTON CLEAR
$('#clear-btn').click(function (e){
    e.preventDefault();

    $('input[name="name"]').val('')
    $('input[name="email"]').val('')
    $('input[name="phone"]').val('')
    $('input[name="q1"]').val('')
    $('input[name="q2"]').val('')
    $('input[name="q3"]').val('')
    $('input[name="q4"]').val('')
    $('#catSelect').val(1)


})



