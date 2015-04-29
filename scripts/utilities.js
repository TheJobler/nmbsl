//need to maintain the page position if it is located on the survey/shop page when a new page is loaded
//via http request
//need to scroll to the proper location if the page is selected while not on the correct page

var content_position = [];

function maintain(){
	var elements;
	elements = $('#content').children();
	
	var i = elements.length;
	var positions = [];
	for(var j = 0; j < i; ++j){
		positions.push($(elements[j]).position().left);
	}
	content_position = positions;
}


//page scrolling 
//{
function util_scroll(nav, direction, flip){
	if(direction === 'left'){
		if(flip){
			$(nav).animate(
				{'left':('-='+$(nav).width()*5)},
				{duration:1400, easing:'swing',complete:maintain}
			);
			$(nav).siblings().animate(
				{'left':('-='+$(nav).width()*5)},
				{duration:1400, easing:'swing',complete:maintain}
			);
		}
		else{
			$(nav).animate(
				{'left':('+='+$(nav).width())},
				{duration:750,easing:'swing',complete:maintain}
			);
			$(nav).siblings().animate(
				{'left':('+='+$(nav).width())},
				{duration:750,easing:'swing',complete:maintain}
			);
		}
	}
	else if(direction === 'right'){
		if(flip){
			$(nav).animate(
				{'left':('+='+$(nav).width()*5)},
				{duration:1400, easing:'swing',complete:maintain}
			);
			$(nav).siblings().animate(
				{'left':('+='+$(nav).width()*5)},
				{duration:1400, easing:'swing',complete:maintain}
			);
		}
		else{
			$(nav).animate(
				{'left':('-='+$(nav).width())},
				{duration:750,easing:'swing',complete:maintain}
			);
			$(nav).siblings().animate(
				{'left':('-='+$(nav).width())},
				{duration:750,easing:'swing',complete:maintain}
			);
		}
	}
}


function link_scroll(to){
	var l = $(to).position().left;
	$(to).animate(
		{'left':('-='+l)},
		{duration:750,easing:'swing',queue:false,complete:maintain}
	);
	$(to).siblings().animate(
		{'left':('-='+l)},
		{duration:750,easing:'swing',queue:false,complete:maintain}
	);
}


//}

//open the item
function listing(link, page){
	var  position;
	if($(link).attr('class') === 'q-link'){
		position = content_position[$('#content').children().index('#surveys')];

		if( position != 0){
			link_scroll('#surveys');
		}
	}
	if($(link).attr('class') === 's-link'){
		postion = content_position[$('#content').index('#shop')];
		
		if(position != 0){
			link_scroll('#shop');
		}
	}
	
	$.post(page + '&h=' + (-content_position[$('#content').index('#home')]))
}

// $('.q-link, .s-link').click(
	// if($(this).attr('class') === 'q-link'){
		
	// }
	// if($(this).attr('class') === 's-link'){
		
	// }
	
// );



