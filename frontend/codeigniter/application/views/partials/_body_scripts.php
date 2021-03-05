<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=" <?php echo base_url('assets/js/jquery.min.js')?>"></script>
<script src=" <?php echo base_url('assets/js/popper.min.js') ?>"></script>


<script src=" <?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- Appear JavaScript -->
<script src=" <?php echo base_url('assets/js/jquery.appear.js')?>"></script>
<!-- Countdown JavaScript -->
<script src=" <?php echo base_url('assets/js/countdown.min.js') ?>"></script>
<!-- Counterup JavaScript -->
<script src=" <?php echo base_url('assets/js/waypoints.min.js')?>"></script>
<script src=" <?php echo base_url('assets/js/jquery.counterup.min.js')?>"></script>
<!-- Wow JavaScript -->
<script src=" <?php echo base_url('assets/js/wow.min.js')?>"></script>
<!-- Apexcharts JavaScript -->
<script src=" <?php echo base_url('assets/js/apexcharts.js')?>"></script>
<!-- Slick JavaScript -->
<script src=" <?php echo base_url('assets/js/slick.min.js')?>"></script>
<!-- Select2 JavaScript -->
<script src=" <?php echo base_url('assets/js/select2.min.js')?>"></script>
<!-- Owl Carousel JavaScript -->
<script src=" <?php echo base_url('assets/js/owl.carousel.min.js')?> "></script>
<!-- Magnific Popup JavaScript -->
<script src=" <?php echo base_url('assets/js/jquery.magnific-popup.min.js')?>"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src=" <?php echo base_url('assets/js/smooth-scrollbar.js')?> "></script>
<!-- morris chart JavaScript -->
<script src=" <?php echo base_url('assets/js/morris.js') ?>"></script>
<script src=" <?php echo base_url('assets/js/morris.min.js') ?>"></script>
<script src=" <?php echo base_url('assets/js/raphael-min.js') ?>"></script>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/continentsLow.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<!-- lottie JavaScript -->
<script src=" <?php echo base_url('assets/js/lottie.js') ?>"></script>
<script src=" <?php echo base_url('assets/js/core.js')?>"></script>
<script src=" <?php echo base_url('assets/js/charts.js')?>"></script>
<script src=" <?php echo base_url('assets/js/animated.js')?>"></script>

<!-- High Chart -->
<script src=" <?php echo base_url('assets/js/highcharts.js')?>"></script>
<script src=" <?php echo base_url('assets/js/highcharts-3d.js')?>"></script>
<script src=" <?php echo base_url('assets/js/highcharts-more.js')?>"></script>

<!-- Plugins  -->
<script src=" <?php echo base_url('assets/js/snackbar.min.js')?>"></script>
<script src=" <?php echo base_url('assets/js/dragula.min.js')?>"></script>

<script src=" <?php echo base_url('assets/js/slick.min.js')?>"></script>

<?php if(isset($assets) && in_array($assets,['fullcalendar','calendar','appointment'])){ ?>
    <!-- Full Calender js -->
    <script src=" <?php echo base_url('assets/fullcalendar/core/main.js')?>"></script>
    <script src="<?php echo base_url('assets/fullcalendar/daygrid/main.js')?>"></script>
    <script src=" <?php echo base_url('assets/fullcalendar/timegrid/main.js')?>"></script>
    <script src=" <?php echo base_url('assets/fullcalendar/list/main.js')?>"></script>
<?php }?>
<?php if(isset($assets) && in_array($assets,['table','datatable'])){ ?>
    <!-- Datatable js -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.js"></script>
<?php }?>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Chart Custom JavaScript -->
<script src=" <?php echo base_url('assets/js/chart-custom.js')?> "></script>
<!-- Custom JavaScript -->
<script src=" <?php echo base_url('assets/js/custom.js')?>"></script>

<script src="https://cdn.jsdelivr.net/npm/algoliasearch@3.32.0/dist/algoliasearchLite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@^4.0.0"></script>
<script src=" <?php echo base_url('assets/js/algolia.js')?>"></script>


