@extends('template')

@section('title') {{'Halaman Utama'}} @endsection

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider d-flex align-items-center overlay" id="coba-bg" data-bg="{{url('assets/img/banner/banner.png')}}">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Indonesia</h3>
                                <p>Pixel perfect design with awesome contents</p>
                                <a href="#" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Australia</h3>
                                <p>Pixel perfect design with awesome contents</p>
                                <a href="#" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Switzerland</h3>
                                <p>Pixel perfect design with awesome contents</p>
                                <a href="#" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider_area_end -->

    <!-- where_togo_area_start  -->
    <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>Reservasi Sekarang</h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="search_wrap">
                        <form class="search_form" action="#">
                            <div class="input_field">
                                <select>
                                    <option data-display="Cari Keberangkatan">Cari Keberangkatan</option>
                                    <option value="1">Jakarta</option>
                                    <option value="2">Tegal</option>
                                </select>
                            </div>
                            <div class="input_field">
                                <select>
                                    <option data-display="Cari Tujuan">Cari Tujuan</option>
                                    <option value="1">Jakarta</option>
                                    <option value="2">Tegal</option>
                                </select>
                            </div>
                            <div class="input_field">
                                <input id="datepicker" placeholder="Tanggal Pergi">
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4" type="submit" >Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->
    
    <!-- popular_destination_area_start  -->
    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Our Services</h3>
                        <p>4 Saudara Trans menyediakan beberapa pelayanan menarik untuk customer yang ingin menikmati travel terjangkau dan nyaman</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card card-services">
                        <div class="card-body px-1">
                            <div class="service-img text-center">
                                <img class="img-fluid mx-auto" src="https://naikbhinneka.com/themes/progress/img/logo/shuttle.png">
                            </div>
                            <div class="service-title pb-2 font-weight-bold text-center">
                                Trans Travel Reguler
                            </div>
                            <div class="service-content mb-4 text-black-50 text-center px-2" style="font-size:.8em;">
                                Travel antar kota <i>Point to point</i> dengan custom seat yang nyaman dan lega. Bisa langsung <span class="text-danger">Booking Online</span> lho..
                            </div>
                            <div class="service-footer px-5 mb-2">
                                <a href="https://naikbhinneka.com/shuttle" class="btn btn-danger btn-sm text-center btn-block">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card card-services">
                        <div class="card-body px-1">
                            <div class="service-img text-center">
                                <img class="img-fluid mx-auto" src="https://naikbhinneka.com/themes/progress/img/logo/shuttle.png">
                            </div>
                            <div class="service-title pb-2 font-weight-bold text-center">
                                Trans Carter
                            </div>
                            <div class="service-content mb-4 text-black-50 text-center px-2" style="font-size:.8em;">
                                Sewa Bis untuk berbagai kebutuhan, mulai dari Umum, Sekolah, Wisata, Antar Jemput Karyawan, dll
                            </div>
                            <div class="service-footer px-5 mb-2">
                                <a href="https://naikbhinneka.com/shuttle" class="btn btn-danger btn-sm text-center btn-block">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card card-services">
                        <div class="card-body px-1">
                            <div class="service-img text-center">
                                <img class="img-fluid mx-auto" src="https://naikbhinneka.com/themes/progress/img/logo/shuttle.png">
                            </div>
                            <div class="service-title pb-2 font-weight-bold text-center">
                                Trans Cargo
                            </div>
                            <div class="service-content mb-4 text-black-50 text-center px-2" style="font-size:.8em;">
                                Menyewakan Warehouse dengan kapasitas besar, Lengkap dengan pengiriman Cargo untuk berbagai keperluan.
                            </div>
                            <div class="service-footer px-5 mb-2">
                                <a href="https://naikbhinneka.com/shuttle" class="btn btn-danger btn-sm text-center btn-block">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card card-services">
                        <div class="card-body px-1">
                            <div class="service-img text-center">
                                <img class="img-fluid mx-auto" src="https://naikbhinneka.com/themes/progress/img/logo/shuttle.png">
                            </div>
                            <div class="service-title pb-2 font-weight-bold text-center">
                                Trans Blog
                            </div>
                            <div class="service-content mb-4 text-black-50 text-center px-2" style="font-size:.8em;">
                                Menyewakan Warehouse dengan kapasitas besar, Lengkap dengan pengiriman Cargo untuk berbagai keperluan.
                            </div>
                            <div class="service-footer px-5 mb-2">
                                <a href="https://naikbhinneka.com/shuttle" class="btn btn-danger btn-sm text-center btn-block">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->

    

    <!-- newletter_area_start  -->
    <div class="newletter_area overlay">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="row align-items-center">
                        <div class="col-12 pb-3">
                            <div class="newsletter_text">
                                <h4>Gabung Bersama Kami</h4>
                                <p>Daftarkan diri anda untuk kemudahan memesan travel</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="newsletter_btn">
                                <button class="boxed-btn4 " type="submit" >Daftar Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newletter_area_end  -->

    <!-- WHY CHOOSE US -->
    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-12">
                    <div class="section_title text-center mb_70">
                        <h3>Why Choose Us</h3>
                    </div>
                </div>
            </div>
            <div class="row mb-5" data-aos="fade-right">
                <div class="col-lg-6 col-md-12 col-12">
                    <img src="{{url('assets/img/service/cs-image.png')}}"  alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-12 col-12 pt-5">
                    <div class="why-title pb-4 text-left">
                        <h2>Call Center 24 Jam</h2>
                    </div>
                    <div class="why-content pb-2 text-left">
                        Call Center kami melayani 24 jam mampu melayani customer untuk melakukan transaksi online serta membantu mengatasi masalah dan keluhan terkait program Bhinneka lainnya.
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-left">
                <div class="col-lg-6 col-md-12 col-12 pt-3 px-4">
                    <div class="why-title pb-4 text-right">
                        <h2>Pembayaran Mudah</h2>
                    </div>
                    <div class="why-content pb-2 text-right">
                        Call Center kami melayani 24 jam mampu melayani customer untuk melakukan transaksi online serta membantu mengatasi masalah dan keluhan terkait program Bhinneka lainnya.
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 ">
                    <img src="{{url('assets/img/service/payment-image.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <div class="recent_trip_area border">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Latest Blog</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="{{url('assets/img/trip/1.png')}}" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="{{url('assets/img/trip/2.png')}}" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="{{url('assets/img/trip/3.png')}}" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <div class="newsletter_btn">
                        <button class="boxed-btn4 " type="submit" >Blog Lainnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        $(document).ready(function() {
            var myBG = $("#coba-bg").data('bg');
            console.log(myBG);      
            $("#coba-bg").css('background', 'url('+myBG+')');

            AOS.init();
        });

        
    </script>
@endpush