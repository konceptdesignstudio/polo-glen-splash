// Smooth scrolling - css-tricks.com
function filterPath(string) {
	return string.replace(/^\//, '').replace(/(index|default).[a-zA-Z]{3,4}$/, '').replace(/\/$/, '');
}
function scrollableElement(els) {
	for (var i = 0, argLength = arguments.length; i < argLength; i++) {
		var el = arguments[i],
		$scrollElement = $(el);
		if ($scrollElement.scrollTop() > 0) {
			return el;
		} else {
			$scrollElement.scrollTop(1);
			var isScrollable = $scrollElement.scrollTop() > 0;
			$scrollElement.scrollTop(0);
			if (isScrollable) {
				return el;
			}
		}
	}
	return [];
}

$(document).ready(function() {

	// SCROLL TO TOP
	var locationPath = filterPath(location.pathname);
	var scrollElem = scrollableElement('html', 'body');
	$('a[href*=#nav]').each(function() {
		console.log('yes');
		var thisPath = filterPath(this.pathname) || locationPath;
		if (locationPath == thisPath && (location.hostname == this.hostname || ! this.hostname) && this.hash.replace(/#/, '')) {
			var $target = $(this.hash),
			target = this.hash;
			if (target) {
				var targetOffset = $target.offset().top;
				$(this).click(function(event) {
					event.preventDefault();
					$(scrollElem).animate({
						scrollTop: targetOffset
					},
					'slow', function() {
						location.hash = target;
					});
				});
			}
		}
	});
  //$("a[rel^='prettyPhoto']").prettyPhoto();
});


$(window).load(function(){

});
