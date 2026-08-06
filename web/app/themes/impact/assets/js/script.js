/*!
 * Author: DigitalDots
    name: script.js	
    requires: jquery	
 */


$(document).ready(function() {
    const swiper = new Swiper('.mySwiper', {
        loop: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // ============================================
    // STELLARNAV INIT
    // ============================================
    $('.stellarnav').stellarNav({
        theme: 'light',
        breakpoint: 1200,
        position: 'right',
        closeBtn: true,
        menuLabel: '',
        closeLabel: '',
        showArrows: false,
    });
   
    $('.stellarnav').addClass('is-loaded');
    $('#main-nav').fadeIn(400);

    var header = $('.site-header');  
    var stickyOffset = header.offset().top;
      
    $(window).on('scroll', function() {    
        if ($(window).scrollTop() > stickyOffset) {      
            header.addClass('header-sticky');    
        } else {      
            header.removeClass('header-sticky');    
        }  
    });

    // ============================================
    // SCROLL TO TOP (SAFE BINDING)
    // ============================================
    const btn = $('.scrollup');

    $(window).off('scroll.scrollup').on('scroll.scrollup', function() {
        if ($(window).scrollTop() > 100) {
            btn.addClass('activate');
        } else {
            btn.removeClass('activate');
        }
    });

    btn.off('click.scrollup').on('click.scrollup', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });
  
    // ============================================
    // Remove/Add active class from core value section cards
    // ============================================
    const cards = document.querySelectorAll('.core-value .card');
    const container = document.querySelector('.core-value .card-container');
    const defaultCard = cards[0];
    
    const mq = window.matchMedia('(min-width: 1025px)');

    function clearAllActive() {
      cards.forEach(c => c.classList.remove('active'));
    }
    
    function setDefaultActive() {
      clearAllActive();
      if (defaultCard) defaultCard.classList.add('active');
    }
    
    // desktop behavior only
    function enableDesktop() {
      setDefaultActive();
    
      cards.forEach(card => {
        card.addEventListener('mouseenter', handleHover);
      });
    
      container.addEventListener('mouseleave', handleLeave);
    }
    
    // remove desktop behavior
    function disableDesktop() {
      clearAllActive();
    
      cards.forEach(card => {
        card.removeEventListener('mouseenter', handleHover);
      });
    
      container.removeEventListener('mouseleave', handleLeave);
    }
    
    // handlers
    function handleHover(e) {
      clearAllActive();
      e.currentTarget.classList.add('active');
    }
    
    function handleLeave() {
      setDefaultActive();
    }
    
    // mode switch
    function handleMode(e) {
      if (e.matches) {
        enableDesktop();
      } else {
        disableDesktop();
      }
    }
    
    mq.addEventListener('change', handleMode);
    handleMode(mq);
});