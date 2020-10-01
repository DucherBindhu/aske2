
$(function () {

    var timelineSwiper = new Swiper('.timeline .swiper-container', {
        direction: 'vertical',
        loop: false,
        speed: 1600,
        pagination: '.swiper-pagination',
        paginationBulletRender: function (swiper, index, className) {
            var year = document.querySelectorAll('.swiper-slide')[index].getAttribute('data-year');
            return '<span class="' + className + '">' + year + '</span>';
        },
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        breakpoints: {
            768: {
                direction: 'horizontal',
            }
        }
    });
});

var countDate = new Date('JULY 11, 2021 07:00:00').getTime();

function newYear() {
    var now = new Date().getTime();
    //Trouve le temps entre maintenant et la date finale
    var delta = countDate - now;

    var second = 1000;
    var minute = second * 60;
    var hour = minute * 60;
    var day = hour * 24;
    // calcul le temps pour le jour, les heures, les minutes et les secondes
    var d = Math.floor(delta / (day));
    var h = Math.floor(delta % (day)) / (hour);
    console.log(h)
    var m = Math.abs(delta % (hour)) / (minute);
    var s = Math.min(delta % (minute)) / (second);

    document.getElementById('days').innerHTML = Math.floor(d);
    document.getElementById('hours').innerHTML = Math.floor(h);
    document.getElementById('minutes').innerHTML = Math.floor(m);
    document.getElementById('seconds').innerHTML = Math.floor(s);
}
setInterval(function () {
    newYear();
}, 1000)
