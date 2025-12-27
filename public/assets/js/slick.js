$(document).ready(function () {
  function initSlick() {
    var isRTL = $('html').attr('dir') === 'rtl';

    // logo-slider
$('.logo-slider').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 0, 
  speed: 3000, 
  cssEase: 'linear', 
  centerMode: true,
  centerPadding: '200px',
  lazyLoad: 'ondemand',
  pauseOnHover: false,
  pauseOnFocus: false,
  pauseOnDotsHover: false,
  rtl: isRTL,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2.5,
        centerPadding: '60px'
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        centerMode: false,
        centerPadding: '40px'
      }
    }
  ]
});

    // Main slider
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
      rtl: isRTL
    });

    // Thumbnail click → go to slide
    $('.thumbnail-wrapper .thumb-item').on('click', function () {
        let index = $(this).data('index');
        $('.slider-for').slick('slickGoTo', index);
    });


    // testimonial-slider
    $('.testimonial-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 1200,
      centerMode: false,
      dots: true,
      rtl: isRTL,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  }

  initSlick();

  let currentDir = $('html').attr('dir');

  setInterval(function () {
    let newDir = $('html').attr('dir');
    if (newDir !== currentDir) {
      currentDir = newDir;
      $('.testimonial-slider').slick('unslick');
      initSlick();
    }
  }, 500);
});



