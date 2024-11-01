var offsetX = 20;
var offsetY = 10;
jQuery(document).ready(function(){
	function isLeftShow(posX){
		var docWidth = jQuery(document).width();
		if(posX < docWidth/2) return true;
		return false;
	}

	jQuery(document).on("mouseenter", ".products .product", function(e) {
	    var docWidth = jQuery(document).width();
		if(docWidth < 800) return;
	    var img = jQuery(this).find('.hover-popup-data img').first();
	    if(!img) return ;
	    var isShowLeft = isLeftShow(e.pageX);
	    
	    var pos = isShowLeft ? (e.pageX + offsetX) : ((docWidth - e.pageX) - offsetX);
	    jQuery('<img id="largeImage" src="' + jQuery(img).attr('src') + '" alt="big image" />')
	    .css('top', e.pageY + offsetY)
	    .css(isShowLeft ? 'left' : 'right', pos)
	    .appendTo('body');
	});

	jQuery(document).on("mouseleave", ".products .product", function(e) {
	    jQuery('#largeImage').remove();
	});

	jQuery(document).on("mousemove", ".products .product", function(e) {
	    var isShowLeft = isLeftShow(e.pageX);
	    var docWidth = jQuery(document).width();
	    var pos = isShowLeft ? (e.pageX + offsetX) : ((docWidth - e.pageX) - offsetX);  
	    jQuery("#largeImage").css('top', e.pageY + offsetY).css(isShowLeft ? 'left' : 'right', pos);
	});

	
});



