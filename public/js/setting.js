$('.multiple-items').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows : false,
    dots: true,
    autoplaySpeed: 2000,
    prevArrow:`<button type='button' class='slick-arrow slick-prev pull-left'><i class="fas fa-arrow-left"></i></button>`,
    nextArrow:`<button type='button' class='slick-arrow slick-next pull-right'><i class="fas fa-arrow-right"></i></button>`
  });


$('.multiple-post').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    arrows : false,
    dots: true,
    autoplaySpeed: 2000,
    prevArrow:`<button type='button' class='slick-arrow slick-prev pull-left'><i class="fas fa-arrow-left"></i></button>`,
    nextArrow:`<button type='button' class='slick-arrow slick-next pull-right'><i class="fas fa-arrow-right"></i></button>`
});

