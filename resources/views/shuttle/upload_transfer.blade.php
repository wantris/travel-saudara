@extends('template')

@section('title') {{'Upload Bukti Transfer'}} @endsection



@section('content')

<div class="container my-5">
    <div class="row mb-4 mx-auto" style="max-width: 500px">
        <div class="col-12">
            <div class="card mx-auto shadow border-bottom-primary" style=" border-radius:40px;">
                <div class="card-body">
                    <div class="col-12">
                        <p class="h4 text-center font-weight-bold mb-2 mt-2 text-danger">Upload Bukti Transfer</p>
                    </div>
                    <div class="col-12 text-center mb-3">
                        <div class="text-center">
                                <h2 class="font-weight-bold mx-auto" id="hours">09:00</h2>

                            <input type="hidden" name="max_time" id="max-time" value="">
                        </div>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4 mt-3">
                            <div class="col-12 text-center">
                                <img class="mx-auto" src="{{url('assets/img/svg_icon/confirmed.svg')}}" class="img-fluid" style="max-width: 250px" alt="">
                            </div>
                            <div class="col-lg-6 col-12 ">
                                <a href="#" class="btn btn-outline-danger btn-block"><i class="far fa-image mr-2"></i>Upload</a>
                                <input type="file" id="file_inp" name="file" onchange="previewFile()" class="d-none">
                                <input type="hidden" name="kd" value="">
                            </div>
                            <div class="col-lg-6 col-12">
                                <input type="submit" value="Submit" class="btn btn-outline-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push('custom-script')
    <script>
        $(document).ready(function() {

            AOS.init();
            
            // $('#date-travel').daterangepicker({
            //     locale: {
            //     format: 'YYYY-MM-DD'
            //     },    
            //     showDropdowns: true,
            //     autoApply: true,
            //     singleDatePicker: true,
            //     startDate: '2021-10-02',
            //     minDate: '2021-10-02',
            //     maxDate: moment().add(30, 'days')

            // });
        });

        
    </script>
@endpush