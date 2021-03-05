<?php include 'partials/_body_style.php'; ?>
<body class="header-top-bg">
		<div id="loading">
		</div>
	    <div id="wrapper" class="wrapper">
			<?php include 'partials/sidebar.php' ?>

		    <?php include 'partials/header.php'; ?>

		    <div class="content-page" id="content-page">
			    <?php include $page_name.'.php' ?>
			</div>
			
		</div>

		<div class="modal fade" id="formModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="main_form"></div>
					</div>
				</div>
			</div>
		</div>
<?php include 'partials/footer.php'; ?>

<?php include 'partials/_body_scripts.php'; ?>
		
<?php include 'partials/_dynamic_script.php'; ?>
