var scrollApp = [];
var scrollPercentRounded;
var aChildren = $(".sideNav li").children(); // find the a children of the list items
var aArray = []; // create the empty aArray
for (var i=0; i < aChildren.length; i++) {    
    var aChild = aChildren[i];
    var ahref = $(aChild).attr('href');
    aArray.push(ahref);
}

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

scrollApp.menuItems = function(){
    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset(); // get the offset of the div from the top of page
            var divPosHeight = (divPos.top - 300);
            var divHeight = $(theID).height(); // get the height of the div in question

            if (windowPos >= divPosHeight && windowPos < (divPosHeight + divHeight)) {
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

scrollApp.transformPercentage = function(percent){
	var newPercent = ((percent*0.8)+10);
	var percentage = newPercent+'%';
	scrollApp.move(percentage);
};

scrollApp.move = function(percent){
	$('.progressBar').css('top', percent);
};

$(function(){

	console.log("It's working");
	scrollApp.calculate();
	scrollApp.menuItems();

});

