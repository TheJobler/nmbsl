var navtop = $('#navbar').outerHeight();

//fix the navbars to the top of the screen
$(window).scroll(
	function(){
		if($(window).scrollTop() >= (navtop + 89)){
			$('.view').addClass('shift');
			$('#navbar'   ).addClass('fixed').css('top','0px').next().css('padding-top', '0px');
			$('#extra-nav').addClass('fixed').css('top','42px').next();
		}
		else{
			$('.view').removeClass('shift').next();
			$('#navbar'   ).removeClass('fixed').next().css('padding-top', '0px');
			$('#extra-nav').removeClass('fixed').css('top','42px').next();
		}
	}
);

//Manage the extra-nav sub-menus 

//{

var slide_options = {};
slide_options['duration'] = 200;
slide_options['queue'] = false;

$('.sub').hover(
	function(){
		$('#extra-nav').slideDown(slide_options);
		if(this.id === "survey-menu"){
			$("#extra-nav .navigation").load('pages/ajax/surveys.ajx.html')
		}
		if(this.id === "shop-menu"){
			$("#extra-nav .navigation").load('pages/ajax/shop.ajx.html')
		}
	},
	function(){
		//$('#extra-nav').slideUp('medium');
		//do mothing
	}
);

$('.no-sub').mouseenter(
	function(){
		$('#extra-nav').slideUp('fast');
	}
);

//}

maintain();


