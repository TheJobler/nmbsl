function util_scroll(nav, direction, flip = false){
	if(direction === 'left'){
		if(flip){
			$(nav).animate(
				{'left':('+='+this.width()*6)},
				{duration:2500, easing'swing'}
			);
		}
		else{
			$(nav).animate(
				{'left':('-='+this.width())},
				{duration:1000,easing:'swing'}
			);
		}
	}
	else if(direction === 'right'){
		if(flip){
			$(nav).animate(
				{'left':('-='+this.width()*6)},
				{duration:2500, easing'swing'}
			);
		}
		else{
			$(nav).animate(
				{'left':('+='+this.width())},
				{duration:1000,easing:'swing'}
			);
		}
	}
	
}