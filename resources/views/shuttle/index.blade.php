@extends('template')

@section('title') {{'Travel Reguler'}} @endsection

@push('custom-style')

@endpush

@section('content')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Travel Reguler</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="section_title text-center mb_70">
                <h3>Reservasi </h3>
            </div>
        </div>
    </div>
    <div class="row justify-content-lg-end ">
        <div class="col-lg-6 col-md-12 col-12">
            <div class="row py-4 px-0 ">
                <div class="card col-10 shadow border-0 mb-3 rounded">
                    <div class="card-body p-0 d-flex">
                        <a href="https://api.whatsapp.com/send/?phone=6281322397700" class="col-lg-9 link-danger col-10 h5 font-weight-bolder p-3" style="background-color: #ffffffb2;">
                            Whatsapp Center
                        </a>
                        <a class="col-2 h5 d-flex justify-content-center align-items-center" style="background-color: #ffffffe6;">
                            <i class="fab fa-whatsapp font-weight-bolder fa-2x text-danger"></i>
                        </a>
                    </div>
                </div>

                <div class="card col-10 shadow border-0 rounded">
                    <div class="card-body p-0 d-flex">
                        <a href="tel:08041401201" class="col-lg-9 link-dark col-10 h5 font-weight-bolder p-3" style="background-color: #ffffffb2;">
                            Call Center
                        </a>
                        
                        <div class="col-2 h5 d-flex justify-content-center align-items-center" style="background-color: rgba(255, 255, 255, 0.9);">
                            <i class="fas fa-headset font-weight-bolder fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md 12 col-12 py-4">
            <div class="card shadow border-0 rounded">
                <div class="card-body">
                    <div class="col-12 font-weight-bold pb-2 mt-3">
                        Cek Reservasi
                    </div>
                    <form action="https://naikbhinneka.com/shuttle/check" class="form-horizontal form-validation" method="post" accept-charset="utf-8">
                        <div class="col-12 pb-3 pt-2">
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger rounded-start bg-white">
                                    &nbsp;<i class="fas fa-clipboard-list text-danger"></i>&nbsp;
                                </span>
                                <input type="text" name="booking_id" class="form-control border-danger" placeholder="(TORDER-XXXX-XXX)" style="height: 40px !important;">
                                <button type="submit" class="btn btn-danger rounded-end">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12 font-weight-bold pb-2 mt-3">
                        Reservasi Online
                    </div>
                    <div class="px-3 mb-3" style="margin-bottom: 60px !important">
                        <select class="rounded-end wide" style="width: 100%">
                            <option data-display="Cari Keberangkatan">Cari Keberangkatan</option>
                            <option value="1">Jakarta</option>
                            <option value="2">Tegal</option>
                        </select>
                    </div>
                    <div class="px-3 mt-3">
                        <select class="rounded-end wide" style="width: 100%">
                            <option data-display="Cari Tujuan">Cari Tujuan</option>
                            <option value="1">Jakarta</option>
                            <option value="2">Tegal</option>
                        </select>
                    </div>
                    
                </div>
                <div class="card-body p-0 pl-4" style="margin-top: -5%">
                    <div class="px-3 mt-3 mb-2 font-weight-bold">
                        Tanggal Pergi
                    </div>
                    <div class="col-12 pb-2" style="padding-right:8%">
                        <div class="input-group">
                            <span class="input-group-text border-1 rounded-start bg-white">
                                &nbsp;<i class="fas fa-calendar-alt text-danger"></i>&nbsp;
                            </span>
                            <input type="text" id="date-travel" class="form-control rounded-end" name="tanggal" id="ticketing-picker" readonly="">
                        </div>
                    </div>
                    <div class="col-12 mt-3 d-flex">
                        <div class="switch-wrap">
                            <div class="primary-switch border">
                                <input type="checkbox" id="primary-switch" checked>
                                <label for="primary-switch"></label>
                            </div>
                        </div>
                        <p class="ml-3">Pulang Pergi?</p>
                    </div>
                    <div class="col-12 mt-3 mb-4">
                        <a href="{{route('landing.shuttle.search')}}" class="btn btn-danger btn-block">
                            Cari Jadwal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5 rounded " style=" background: -webkit-linear-gradient(to bottom, rgba(219, 219, 219, 0.5), rgba(184, 184, 184, 0.5));background: linear-gradient(to bottom, rgba(219, 219, 219, 0.5), rgba(184, 184, 184, 0.5));">
    <div class="row justify-content-center mt-5">
        <div class="col-12 mt-5">
            <div class="section_title text-center mb_70">
                <h4 style="font-size: 30px" class="text-center font-weight-bold font-kota-shuttle text-secondary">Kota Tersedia</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-4 col-6 mx-n2 mb-5 text-center">
            <a href="https://naikbhinneka.com/shuttle/kota/cirebon">
            <img class="img-fluid rounded-circle city-travel-img" src="{{url('assets/img/place/tegal-icon.png')}}">
            <p class="text-center font-weight-bold font-kota-shuttle mt-3">TEGAL</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mx-n2 mb-5 text-center">
            <a href="https://naikbhinneka.com/shuttle/kota/cirebon">
            <img class="img-fluid rounded-circle city-travel-img" src="{{url('assets/img/place/bandung-icon.png')}}">
            <p class="text-center font-weight-bold font-kota-shuttle mt-3">BANDUNG</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mx-n2 mb-5 text-center">
            <a href="https://naikbhinneka.com/shuttle/kota/cirebon">
            <img class="img-fluid rounded-circle city-travel-img" src="{{url('assets/img/place/jakarta-icon.png')}}">
            <p class="text-center font-weight-bold font-kota-shuttle mt-3">JAKARTA</p>
            </a>
        </div>
    </div>
</div>

    
@endsection

@push('custom-script')
    <script>
        $(document).ready(function() {

            AOS.init();
            
            $('#date-travel').daterangepicker({
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
        });

        
    </script>
@endpush