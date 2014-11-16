( function( $ ){
	'use strict';
	$(document).ready(function(){

		$('.select2-field-user').each(function(){
			var $select = $(this);

			$select.select2({
				width: 400,
				multiple: true,
				allowClear: true,
				minimumInputLength: 3,
				escapeMarkup: function (m) { return m; },
				ajax: {
					dataType: 'json',
					type: 'POST',
					url: window.ajaxurl,
					data: function ( user, page ) {
						return {
							action: 'notifier.search_users',
							search: user, // search author
							page_limit: 10,
							page: page,
						};
					},
					results: function ( data ) { // parse the results into the format expected by Select2.
						$.each( data.results, function( k, result ){
							result.id = result.data.ID;
							result.text = result.data.display_name;
						} );
						return data;
					}
				}
			});
		})

	});
}( jQuery ) );