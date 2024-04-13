document.addEventListener("DOMContentLoaded", function() {
    var accordionItems = document.querySelectorAll('.accordion > li');

    accordionItems.forEach(function(item) {
        var link = item.querySelector('.link');
        var submenu = item.querySelector('.submenu');

        link.addEventListener('click', function() {
            submenu.classList.toggle('show');
            item.classList.toggle('open');

            accordionItems.forEach(function(otherItem) {
                if (otherItem !== item) {
                    otherItem.querySelector('.submenu').classList.remove('show');
                    otherItem.classList.remove('open');
                }
            });
        });
    });
});