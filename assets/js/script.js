const lang_dropdown = document.querySelector('.dropdown');

lang_dropdown.addEventListener('click', function() {
    lang_dropdown.classList.add('open');
});

document.addEventListener('click', function(event) {
    if (!lang_dropdown.contains(event.target)) {
        lang_dropdown.classList.remove('open');
    }
});
