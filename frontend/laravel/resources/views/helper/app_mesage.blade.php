<script type="text/javascript">
	(function($) { 

	"use strict";  
		{{-- Success Message --}}
		@if (\Session::has('success'))
		Snackbar.show({
			text: '{{ Session::get("success") }}',
			pos: 'bottom-right',
			backgroundColor:'#3a3939',
			actionTextColor:'#28a745'
		});
		
		@endif

		{{-- Error Message --}}
		@if (Session::has('errors'))
		Snackbar.show({
			text: '{{ Session::get("errors") }}',
			pos: 'bottom-right',
			backgroundColor:'#dc3545',
			actionTextColor:'white'
		});
		<?php Session::forget('errors'); ?>
		@endif
	})(jQuery); 
</script>