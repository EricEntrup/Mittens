<script>
(function($) {
    "use strict";
    
    $(document).ready(function(){
        $('.select2js').select2();
        $('form').validator();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".datepicker").flatpickr({
            dateFormat: "d-m-Y"
        });

        $(".timepicker").flatpickr({
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            dateFormat: "H:i",
        });

        $(document).on('click', '.loadRemoteModel', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            if (url.indexOf('#') == 0) {
                $(url).modal('open');
            } else {
                $.get(url, function(data) {
                    $('#remoteModelData').html(data);
                    $('#remoteModelData').modal();
                    $('form').validator();
                    $(".datepicker").flatpickr({
                        dateFormat: "d-m-Y"
                    });
                });
            }
        });

        $(document).on('click', '[data-form="ajax"]', function(f) {
            $('form').validator('update');
            f.preventDefault();
            var current = $(this);
            current.addClass('disabled');
            var form = $(this).closest('form');
            var url = form.attr('action');
            var fd = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: fd, // serializes the form's elements.
                success: function(e) {
                    if (e.status == true) {
                        if (e.event == "submited") {
                            showMessage(e.message);
                            $(".modal").modal('hide');
                        }
                        if(e.event == 'refresh'){
                            // showMessage(e.message);
                            window.location.reload();
                        }
                        if(e.event == "callback"){
                            showMessage(e.message);
                            $(".modal").modal('hide');
                            location.reload();
                        }
                    }
                    if (e.status == false) {
                        if (e.event == 'validation') {
                            errorMessage(e.message);
                        }
                    }
                },
                error: function(error) {

                },
                cache: false,
                contentType: false,
                processData: false,
            });
            f.preventDefault(); // avoid to execute the actual submit of the form.

        });

        $(document).ready(function () {
            
            $(document).on('change','.change_status', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).attr('data-id');
                var type = $(this).attr('data-type');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('changeStatus') }}",
                    data: { 'status': status, 'id': id ,'type': type  },
                    success: function(data){
                        showMessage(data.message);
                    }
                });
            })
            function showMessage(message) {
                Snackbar.show({
                    text: message,
                    pos: 'bottom-right'
                });
            }
        })

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

        $(document).on('click', '[data-toggle="tabajax"]', function(e) {
            e.preventDefault();
            var selectDiv = this;
            ajaxMethodCall(selectDiv);
        });
        
        function ajaxMethodCall(selectDiv) {

            var $this = $(selectDiv),
                loadurl = $this.attr('data-href'),
                targ = $this.attr('data-target'),
                id = selectDiv.id || '';

            $.post(loadurl, function(data) {
                $(targ).html(data);
                $('form').append('<input type="hidden" name="active_tab" value="'+id+'" />');
            });

            $this.tab('show');
            return false;
        }

        $('form[data-toggle="validator"]').on('submit', function (e) {
            window.setTimeout(function () {
                var errors = $('.has-error')
                if (errors.length) {
                    $('html, body').animate({ scrollTop: "0" }, 500);
                    e.preventDefault()
                }
            }, 0);
        });   
    });
})(jQuery);
$('#product-additional-slider').slick({
            centerMode: false,
            centerPadding: '60px',
            slidesToShow: 4,
            slidesToScroll: 1,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '30',
                    slidesToShow: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '15',
                    slidesToShow: 1
                }
            }],
            nextArrow: '<a href="#" class="ri-arrow-left-s-line left"></a>',
            prevArrow: '<a href="#" class="ri-arrow-right-s-line right"></a>',
        });

        $('#related-slider').slick({
            centerMode: false,
            centerPadding: '60px',
            slidesToShow: 3,
            slidesToScroll: 1,
            focusOnSelect: true,
            responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '30',
                    slidesToShow: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '15',
                    slidesToShow: 1
                }
            }],
            nextArrow: '<a href="#" class="ri-arrow-left-s-line left"></a>',
            prevArrow: '<a href="#" class="ri-arrow-right-s-line right"></a>',
        });
        $(document).ready(function(){
            $('#place-order').click(function(){
                $('#cart').removeClass('show');
                $('#address').addClass('show');
                $('#step1').removeClass('active');
                $('#step1').addClass('done');
                $('#step2').addClass('active');
            });
            $('#deliver-address').click(function(){
                $('#address').removeClass('show');
                $('#payment').addClass('show');
                $('#step2').removeClass('active');
                $('#step2').addClass('done');
                $('#step3').addClass('active');
            });
        });
</script>
