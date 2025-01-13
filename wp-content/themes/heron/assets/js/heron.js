/*
Theme Name: Kimono - Photography Agency
Version: 1.0
Author: WPThemeBooster
Author URL: 
Description: Kimono - Photography Agency
*/
/*	IE 10 Fix*/

(function ($) {
	'use strict';
	
	jQuery(document).ready(function () {

        // Preloader
        setTimeout(function() {
            $('#preloader').addClass('hide');
        }, 1000);
    });

    // Scrolling Text
    document.addEventListener("DOMContentLoaded", () => {
        const scrollingText = document.querySelector(".scrolling-text");
        const containerWidth = document.querySelector(".scrolling-text-container").offsetWidth;
        const textWidth = scrollingText.scrollWidth;
      
        // Duplicate the content dynamically to ensure no gaps
        while (scrollingText.scrollWidth < containerWidth * 2) {
          scrollingText.innerHTML += scrollingText.innerHTML;
        }
    });
      


});// End of main js container
