// Variables for scroll bar
var scrollApp = [];
var scrollPercentRounded;

// Variable for menu change based on location of window
var aChildren = $(".sideNav li").children(); // find the a children of the list items
var aArray = []; // create the empty aArray
for (var i=0; i < aChildren.length; i++) {    
    var aChild = aChildren[i];
    var ahref = $(aChild).attr('href');
    aArray.push(ahref);
}

// Function to add 'nav-active' to the menu items, based on the scroll location of the window
scrollApp.menuItems = function(){
    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset(); // get the offset of the div from the top of page
            var divPosHeight = (divPos.top - 400);
            var divHeight = $(theID).outerHeight(); // get the height of the div in question

            if (windowPos > divPosHeight && windowPos < (divPosHeight + divHeight)) {
                $("a[href='" + theID + "']").parent().addClass("nav-active");
            } else {
                $("a[href='" + theID + "']").parent().removeClass("nav-active");
            }
        }

        if(windowPos + windowHeight == docHeight) {
            if (!$("nav li:last-child a").parent().hasClass("nav-active")) {
                var navActiveCurrent = $(".nav-active").find('a').attr("href");
                $("a[href='" + navActiveCurrent + "']").parent().removeClass("nav-active");
                $("nav li:last-child a").parent().addClass("nav-active");
            }
        }
    });
};

// Function to calculate a percentage based on the scroll location of the user
scrollApp.calculate = function(){
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        var docHeight = $(document).height();
        var winHeight = $(window).height();
        var scrollPercent = (scrollTop) / (docHeight - winHeight);
        var scrollPercentRounded = scrollPercent*100;
        scrollApp.transformPercentage(scrollPercentRounded);
    });
};

    // Function to transform percentage. Progress bar is only 80% of the div (multiply the percent x 80%), and begins 10% from the top of the div (+10). Add '%' for css value.
    scrollApp.transformPercentage = function(percent){
    	var newPercent = ((percent*0.8)+10);
    	var percentage = newPercent+'%';
    	scrollApp.move(percentage);
    };

    // Replace 'top' value on css of progress bar
    scrollApp.move = function(percent){
    	$('.progressBar').css('top', percent);
    };

    var logoFunction = function(){
        $(window).on('scroll', function(){
            var logo = $('.navLogo');
            var arrowUp = $('.arrowUp');
            var windowPos = $(window).scrollTop();
            var divPos = $('#home').offset();
            var divPosHeight = (divPos.top + 400);
            
            if ( windowPos > divPosHeight ) {
                console.log('hi');
                logo.removeClass('hidden');
                arrowUp.removeClass('hidden');
            } else {
                logo.addClass('hidden');
                arrowUp.addClass('hidden');
            };
        });  
    };
    

// DOCUMENT READY
$(function(){

	console.log("It's working");
    $("a[href='#home']").parent().addClass("nav-active");
    logoFunction();
    scrollApp.calculate();
    scrollApp.menuItems();

    // Smoothscroll

    $(function() {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });

});

