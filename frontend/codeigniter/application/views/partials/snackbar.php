
<script>
		<?php 
			$msg  = "";
			$type = "";
			$title ="";

			$as = $this->session->flashdata('item');
			$msg  = $as['msg'];
			$title   = $as['title'];
			$type = $as['type'];
			?> 
		var msg = "<?php  echo $msg  ?>";
        var title = "<?php  echo $title ?>";
		var type = "<?php  echo $type  ?>";
		if(msg != ""){
			console.log(type);
			if(type == "success"){
				showMessage(msg)
			}else{
				errorMessage(msg)
			}

			function errorMessage(message) {
				Snackbar.show({
					text: message,
					pos: 'bottom-right',
					backgroundColor : '#d32f2f',
					actionTextColor: '#fff'
				});
			}

			function showMessage(message) {
				Snackbar.show({
					text: message,
					pos: 'bottom-right'
				});
			}
		}
</script>
