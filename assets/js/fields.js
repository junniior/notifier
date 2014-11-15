( function( $ ){
	'use strict';
	$(document).ready(function(){

		$('.select2-field').each(function(){
			$(this).select2({
				multiple: true,
				width: 400,
				data: function(){
					return { 'results': $(this).data( 'possibilities' ) };
				}
			});
		})

	});
}( jQuery ) );