(function( $ ) {

	'use strict';

	$(function() {

		var data = {};
		data.foodieblog_plugins_list = 'yes';
		$.ajax({
			url: document.URL,
			cache: false,
			type: "get",
			data: data,
			success: function(response) {

				if( $( response ).find('.foodieblog-addons-list').length > 0 ) {

					$('.foodieblog-addons-list').replaceWith( $( response ).find('.foodieblog-addons-list') );
				}
			}
		});
	});

})( jQuery );
