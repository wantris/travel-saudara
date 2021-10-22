@extends('template')

@section('title') {{'Travel Reguler'}} @endsection

@push('custom-style')

@endpush

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <img src="{{url('assets/img/banner/banner-trans.png')}}" style="max-height: 650px" class="img-fluid" alt="">
        </div>
    </div>
</div>


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
                    <form action="{{route('landing.shuttle.reservation.check')}}" class="form-horizontal form-validation" method="get" accept-charset="utf-8">
                        <div class="col-12 pb-3 pt-2">
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger rounded-start bg-white">
                                    &nbsp;<i class="fas fa-clipboard-list text-danger"></i>&nbsp;
                                </span>
                                <input type="text" name="code" class="form-control border-danger" placeholder="(ODR-XXXXXXX)" style="height: 40px !important;">
                                <button type="submit" class="btn btn-danger rounded-end">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="{{route('landing.shuttle.search')}}" method="GET">
                       
                        <div class="col-12 font-weight-bold pb-2 mt-3">
                            Reservasi Online
                        </div>
                        <div class="px-3 mb-3" style="margin-bottom: 60px !important">
                            <select class="rounded-end wide" id="departure-select" style="width: 100%">
                                <option data-display="Cari Keberangkatan" value="none">Cari Keberangkatan</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="px-3 mt-3">
                            <select class="rounded-end wide" name="route" id="arrival-select" style="width: 100%">
                                <option data-display="Cari Tujuan">Cari Tujuan</option>
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
                                <input type="text" id="date-travel" name="date" class="form-control rounded-end"  id="ticketing-picker" readonly="">
                            </div>
                        </div>
                        <div class="d-none" id="return-date-container">
                            <div class="px-3 mt-3 mb-2 font-weight-bold">
                                Tanggal Pulang
                            </div>
                            <div class="col-12 pb-2" style="padding-right:8%">
                                <div class="input-group">
                                    <span class="input-group-text border-1 rounded-start bg-white">
                                        &nbsp;<i class="fas fa-calendar-alt text-danger"></i>&nbsp;
                                    </span>
                                    <input type="text" id="date-home-travel" name="date_home" class="form-control rounded-end" id="ticketing-picker" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 d-flex">
                            <div class="switch-wrap">
                                <div class="primary-switch border">
                                    <input type="checkbox" onchange="optionTravel()" name="option" id="primary-switch">
                                    <label for="primary-switch"></label>
                                </div>
                            </div>
                            <p class="ml-3">Pulang Pergi?</p>
                        </div>
                        <div class="col-12 mt-3 mb-4">
                            <input type="submit" value="Cari Jadwal" class="btn btn-danger btn-block">
                        </div>
                    </form>
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

            $('#arrival-select').prop('disabled', true).niceSelect('update');

            var myBG = $(".bradcam_area").data('bg');
            $(".bradcam_area").css('background', 'url('+myBG+')');
            
            $('#date-travel, #date-home-travel').daterangepicker({
                locale: {
                format: 'YYYY-MM-DD'
                },    
                showDropdowns: true,
                autoApply: true,
                singleDatePicker: true,
                startDate: new Date(),
                minDate: new Date(),
                maxDate: moment().add(30, 'days')

            });
        });

        const optionTravel = () => {

            if($('#primary-switch').is(':checked')){
                $('#return-date-container').removeClass('d-none');
            }else{
                $('#return-date-container').addClass('d-none');
            }
        }

        $('#departure-select').on('change', function(){
            let value = $(this).val();
            if(value != "none"){
                getRouteCity(value);
            }{
                $('#arrival-select').prop('disabled', true).niceSelect('update');
            }
           
        });

        const getRouteCity = (id) =>{
            const url_route = "/shuttle/getroute/";
            $.ajax(
                {
                    url: url_route,
                    type: 'post', 
                    data:{
                        'id':id
                    },
                    success: function (response){
                        if(response.code == 200){
                            renderArrival(response.datas);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                }
            );
        }

        const renderArrival = (items) => {
            console.log(items);
            $('#arrival-select').prop('disabled', false).niceSelect('update');

            $('#arrival-select').empty();

            $('#arrival-select').append($('<option>', { 
                    text : "Cari Tujuan"
            }));

            $.each(items, function (i, item) {
                $('#arrival-select').append($('<option>', { 
                    value: item.id,
                    text : item.city_arrival_ref.name
                }));
            });

            $('#arrival-select').niceSelect('update');
        }

        
    </script>
@endpush