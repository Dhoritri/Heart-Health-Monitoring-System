let menu = document.querySelector('#menu-btn');
let nav = document.querySelector('.nav');

menu.onclick=()=>{
    menu.classList.toggle('fa-times')
    nav.classList.toggle('active')
}
window.onscroll=()=>{
    menu.classList.remove('fa-times')
    nav.classList.remove('active')
}

$(document).ready(function(){
    $('.doctors-layout').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});
