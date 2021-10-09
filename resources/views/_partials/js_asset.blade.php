<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
<!-- JS here -->
<script src="{{url('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{url('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{url('assets/js/popper.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{url('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{url('assets/js/ajax-form.js')}}"></script>
<script src="{{url('assets/js/waypoints.min.js')}}"></script>
<script src="{{url('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{url('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{url('assets/js/scrollIt.js')}}"></script>
<script src="{{url('assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{url('assets/js/wow.min.js')}}"></script>
<script src="{{url('assets/js/nice-select.min.js')}}"></script>
<script src="{{url('assets/js/jquery.slicknav.min.js')}}"></script>
<script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('assets/js/plugins.js')}}"></script>

<script src="{{url('assets/js/slick.min.js')}}"></script>




<!--contact js-->
<script src="{{url('assets/js/contact.js')}}"></script>
<script src="{{url('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{url('assets/js/jquery.form.js')}}"></script>
<script src="{{url('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{url('assets/js/mail-script.js')}}"></script>


<script src="{{url('assets/js/main.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#datepicker').daterangepicker({
        locale: {
        format: 'YYYY-MM-DD'
        },    
        showDropdowns: true,
        autoApply: true,
        singleDatePicker: true,
        startDate: '2021-10-02',
        minDate: '2021-10-02',
        maxDate: moment().add(30, 'days')

    });
</script>