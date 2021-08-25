$(document).ready(function() {
  $(window).scroll(function(event) {
    var vitri = $(window).scrollTop();
    if (vitri < 600) {
      $('.angle-up__icon').addClass('d-none');
    }
    else 
    {
      $('.angle-up__icon').removeClass('d-none');
    }
  });

  $('.angle-up__icon').click(function(){
    $('html, body').animate({'scrollTop': 0});
  });
});
var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    }
});
var swiper2 = new Swiper(".mySwiper2", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    }
});

var swipe3 = new Swiper('.swiper-container.product-slide', {
    slidesPerView: 5,
    direction: getDirection(),
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      resize: function () {
        swiper.changeDirection(getDirection());
      },
    },
  });

  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
    return direction;
}

var swipe3 = new Swiper('.swiper-container.cate-slide', {
    slidesPerView: 2,
    loop: true,
    spaceBetween: 8,
    direction: getDirection(),
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      resize: function () {
        swiper.changeDirection(getDirection());
      },
    },
  });

  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
    return direction;
}

var swipe4 = new Swiper('.swiper-container.product_detail_slide', {
    loop: true,
    slidesPerView: 4,
    direction: getDirection(),
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      resize: function () {
        swiper.changeDirection(getDirection());
      },
    },
  });

  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
    return direction;
}

