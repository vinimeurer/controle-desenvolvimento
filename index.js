$(window).load(() => {
  windowLoaded();
});

const windowLoaded = () => {
  $('.preloader')
    .delay(400)
    .fadeOut('slow');

  const popUpElem = $('.popUp');
  const mainElem = $('main');
  let popUpState = false;
  const closePopUpBtn = $('#cancelBtn');

  const projectElem = $('.project-item');


  $(closePopUpBtn).on('click', () => {
    if (popUpState === true) {
      $(popUpElem).fadeOut(500);

      //   Unblur the main element and take off overflow: hidden
    }
    if ($(window).width() >= 768) {
      // blur the shiit outta the main element and make it unscrollable. ONLY ON TAB AND DESKTOPS
      $('.projects').css('filter', 'blur(0px)');
      $('body').css('overflow', 'scroll');
    } else {
      // if been viewed on mobile just take away all element except popUp.
      $('.projects').css('display', 'block');
      $('footer').css('display', 'block');
      $('.intro').css('display', 'block');
      $('.contact').css('display', 'block');
    }
    // set popUpState back to false so it could work accoridingly.
    popUpState = false;
  });
};
