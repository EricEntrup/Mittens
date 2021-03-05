<script src="{{ asset('js/app.js') }}"></script>
<!-- Appear JavaScript -->
<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
<!-- Countdown JavaScript -->
<script src="{{ asset('assets/js/countdown.min.js') }}"></script>
<!-- Wow JavaScript -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- Apexcharts JavaScript -->
@if(isset($assets) && in_array('apexchart',$assets))
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>
@endif
<!-- Slick JavaScript -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{ asset('assets/js/smooth-scrollbar.js') }} "></script>
<!-- lottie JavaScript -->
<script src="{{ asset('assets/js/lottie.js') }} "></script>
<script src="{{ asset('assets/js/core.js') }}"></script>
<script src="{{ asset('assets/js/charts.js') }}"></script>
<script src="{{ asset('assets/js/animated.js') }}"></script>
<!-- High Chart JavaScript -->
@if(isset($assets) && in_array('highchart',$assets))
    <script src="{{ asset('assets/js/highcharts.js') }}"></script>
    <script src="{{ asset('assets/js/highcharts-3d.js') }}"></script>
    <script src="{{ asset('assets/js/highcharts-more.js') }}"></script>
@endif
<!-- morris chart JavaScript -->
@if(isset($assets) && in_array('morrischart',$assets))
    <script src="{{ asset('assets/js/morris.js') }} "></script>
    <script src="{{ asset('assets/js/raphael-min.js') }} "></script>
    <script src="{{ asset('assets/js/morris.min.js') }} "></script>
@endif
<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/js/chart-custom.js') }} "></script>
@if(isset($assets) && in_array('amchart',$assets))
    <script src="https://www.amcharts.com/lib/4/maps.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/continentsLow.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
@endif

@if(isset($assets) && in_array('rearrange',$assets))
    <link href="{{ asset('css/dragula.css') }}" rel="stylesheet">
    <script src="{{ asset('js/dragula.min.js') }}"></script>
@endif

@if(isset($assets) && (in_array('textarea',$assets) || in_array('editor',$assets)))
    <script src="{{ asset("vendor/tinymce/js/tinymce/tinymce.min.js") }}"></script>
    <script src="{{ asset("vendor/tinymce/js/tinymce/jquery.tinymce.min.js") }}"></script>
@endif
{{--@if(isset($assets) && (in_array('fullcalender',$assets) || in_array('calender',$assets)))
    <script src="{{ asset('vendor/fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/daygrid/main.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/timegrid/main.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/list/main.js') }}"></script>
@endif--}}

@if(isset($assets) && (in_array('datatable',$assets) || in_array('datatable_builder',$assets)))
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.select.min.js') }}"></script>
@endif

<!-- Custom JavaScript -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
