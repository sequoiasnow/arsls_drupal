(function($) {
	$(document).ready(function() {
		$('.about-tree.outreach-page .row .icon i').each(function(index, elem) {
			if (index % 2 != 0 ) {
				$(this).addClass('fa-flip-horizontal');
			}
		});
	});
})(jQuery);