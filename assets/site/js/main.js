(function ($) {
    "use strict";


    jQuery(document).ready(function ($) {


        /*---------------------------------------------*
        * Carousel
        ---------------------------------------------*/
        $('#Carousel').carousel({
                interval: 5000,
                item: 2
            })
            /*------------------------*/

    });

    /*---------------------------------------------*
        * STICKY scroll
    ---------------------------------------------*/

    /*$.localScroll();*/

    /**************************/


    jQuery(window).load(function () {


    });



}(jQuery));

// window.onscroll = function() {
//   growShrinkLogo()
// };

// function growShrinkLogo() {
//   var Logo = document.getElementById("Logo")
//   if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
//     Logo.style.width = '120px';

//   } else {
//     Logo.style.width = '130px';
//      document.getElementById("Logo").style.WebkitTransition = "all 1s"; // Code for Safari 3.1 to 6.0
//     document.getElementById("Logo").style.transition = "all 1s";
//   }
// }
