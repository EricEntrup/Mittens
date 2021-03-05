
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="iq-card">
				<div class="iq-card-header d-flex justify-content-between">
					<div class="iq-header-title">
						<h4 class="card-title"><?php echo isset($pageTitle) ? $pageTitle : 'List' ?></h4>
					</div>
					<div class="iq-card-header-toolbar d-flex align-items-center">

						<a href="<?php echo base_url('index.php/appointment-add') ?>" class="float-right mr-1 btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i>Add Appointment</a>
					</div>
				</div>
				<div class="iq-card-body">
					<div id="full-calender"></div>
				</div>
			</div>
		</div>
	</div>
</div>


