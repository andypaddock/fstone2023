$(document).on( 'click', '#loadMore', function( event ) {
	event.preventDefault();
	$.ajax({
		url: ajaxpagination.ajaxurl,
		type: 'post',
		data: {
			action: 'ajax_pagination'
		},
		success: function( result ) {
			alert( result );
		}
	})
})