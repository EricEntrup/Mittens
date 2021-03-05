<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Metorik - Responsive Bootstrap 4 Admin Dashboard Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico') ?>"/>
   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>"/>

    <!-- Typography CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/typography.css')?>"/>

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css')?>" />

    <!-- Plugin Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/variable.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/developer.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dragula.css')?>" />
    <link rel='stylesheet' href="<?php echo base_url('assets/css/snackbar.css')?>" />

    <?php if(isset($assets) && in_array($assets,['fullcalendar','calendar','appointment'])){ ?>
        <!-- Full calendar Css-->
        <link rel='stylesheet' href="<?php echo base_url('assets/fullcalendar/core/main.css')?>" />
        <link rel='stylesheet' href="<?php echo base_url('assets/fullcalendar/daygrid/main.css')?>" />
        <link rel='stylesheet' href="<?php echo base_url('assets/fullcalendar/timegrid/main.css')?>" />
        <link rel='stylesheet' href="<?php echo base_url('assets/fullcalendar/list/main.css')?>" />
    <?php }?>
    <?php if(isset($assets) && in_array($assets,['table','datatable'])){ ?>
        <!-- DataTable Css-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.bootstrap4.min.css')?>"/>
    <?php }?>

    <!-- Slick css -->
    <link rel='stylesheet' href="<?php echo base_url('assets/css/slick.css')?>" />
    <link rel='stylesheet' href="<?php echo base_url('assets/css/slick-theme.css')?>" />
	<!--Algolia Css-->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/algolia-min.css')?>"/>
	<link rel='stylesheet' href="<?php echo base_url('assets/css/Ecommerce/Ecommerce.css')?>" />
	<link rel='stylesheet' href="<?php echo base_url('assets/css/Ecommerce/EcommerceResponsive.css')?>" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
