@extends('template')

@section('title') {{'Reservasi Jadwal'}} @endsection



@section('content')

<div class="container my-4">
    <div class="row mt-5 mb-4" style="overflow: hidden">
        <div class="col-12 px-4 ">
            <article class="card-ticket fl-left border">
                <section class="date-ticket ">
                  <time datetime="23th feb">
                    <span>23</span><span>oct</span>
                  </time>
                </section>
                <section class="card-cont">
                    <small>Jadwal Keberangkatan</small>
                    <h3>4 Saudara Trans</h3>
                    <div class="container-fluid w-100 d-block">
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fa fa-map-marker mr-2 mt-2" title="Rute Keberangkatan"></i>
                            </div>
                            <div class="col-lg-4 col-6 pt-2">
                                <p >JAKARTA</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-2">
                                <p class="text-danger "><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-2">
                                <p class="">TEGAL</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-clock mr-2" title="Waktu Keberangkatan"></i>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>09.00</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-1">
                                <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>20.00</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fa fa-calendar mr-2" title="Tanggal Keberangkatan"></i>
                            </div>
                            <div class="col-lg-10 col-8 pt-1">
                                <p>23 Oktober 2021</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-chair mr-2" title="Sisa Kursi"></i>
                            </div>
                            <div class="col-lg-4 col-8 pt-1">
                                <p>4 Kursi</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="font-weight-bold" style="text-transform: none">Rp.200.000</a>
                </section>
              </article>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-6 mb-3">
            <div class="card shadow-1 border-radius-20 border-bottom-primary">
                <div class="card-body px-5">
                    <div class="row mb-4">
                       <div class="col-12">
                            <h3 class="text-secondary text-center">
                                Select Your Seat
                            </h3>
                       </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3 ">
                            <button class="btn btn-outline-danger p-0" style="width: 50px; height:50px">
                                <i class="far fa-loveseat text-center ml-1" style="font-size: 30px"></i>
                            </button>
                        </div>
                        <div class="col-3 ">
                            <button class="btn btn-outline-danger p-0" style="width: 50px; height:50px">
                                <i class="far fa-loveseat text-center ml-1" style="font-size: 30px"></i>
                            </button>
                        </div>
                        <div class="col-3 ">
                            <button class="btn btn-outline-danger p-0" style="width: 50px; height:50px">
                                <i class="far fa-loveseat text-center ml-1" style="font-size: 30px"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3 ">
                            <button class="btn btn-outline-danger p-0" style="width: 50px; height:50px">
                                <i class="far fa-loveseat text-center ml-1" style="font-size: 30px"></i>
                            </button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-outline-danger p-0" style="width: 50px; height:50px">
                                <i class="far fa-loveseat text-center ml-1" style="font-size: 30px"></i>
                            </button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-outline-danger p-0" style="width: 50px; height:50px">
                                <i class="far fa-loveseat text-center ml-1" style="font-size: 30px"></i>
                            </button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-outline-danger p-0" style="width: 50px; height:50px">
                                <i class="far fa-loveseat text-center ml-1" style="font-size: 30px"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-4 col-12">
                            <div class="mb-3 d-flex">
                                <div class="border border-danger" style="width: 30px; height:30px; position: relative">
                                    <i class="far fa-loveseat text-danger center " style="font-size: 16px"></i>
                                </div>
                                <div class="ml-2 pt-1">
                                    <p style="font-size: 14px">Kursi Kosong</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="mb-3 d-flex">
                                <div class="border border-danger bg-danger" style="width: 30px; height:30px; position: relative">
                                    <i class="far fa-loveseat text-white center " style="font-size: 16px"></i>
                                </div>
                                <div class="ml-2 pt-1">
                                    <p style="font-size: 14px">Kursi Terisi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="mb-3 d-flex">
                                <div class="border border-info bg-info" style="width: 30px; height:30px; position: relative">
                                    <i class="far fa-loveseat text-white center " style="font-size: 16px"></i>
                                </div>
                                <div class="ml-2 pt-1">
                                    <p style="font-size: 14px">Kursi Anda</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card shadow border-radius-20 border-bottom-primary">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="text-secondary">Data Pemesan</h3>
                    </div>
                    <div class="mt-4">
                        <div class="input-group">
                            <span class="input-group-text border-1 border-danger bg-danger rounded-start">
                                &nbsp;<i class="fas fa-signature text-white"></i>&nbsp;
                            </span>
                            <input type="text" name="name" class="form-control border-danger" placeholder="Nama Lengkap" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="input-group">
                            <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                &nbsp;<i class="fas fa-at text-white"></i>&nbsp;
                            </span>
                            <input type="text" name="name" class="form-control border-danger" placeholder="Email" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="input-group">
                            <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                &nbsp;<i class="fab fa-whatsapp text-white"></i>&nbsp;
                            </span>
                            <input type="text" name="name" class="form-control border-danger" placeholder="Nomor Whatsapp" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="input-group">
                            <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                &nbsp;<i class="fas fa-swatchbook text-white"></i>&nbsp;
                            </span>
                            <input type="text" name="name" class="form-control border-danger" placeholder="Total Kursi" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="input-group">
                            <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                &nbsp;<i class="fas fa-money-bill-wave text-white"></i>&nbsp;
                            </span>
                            <input type="text" name="name" class="form-control border-danger" placeholder="Total Harga" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{route('landing.shuttle.reservation.payment', $code)}}" class="btn btn-danger btn-block rounded">Lanjut Pembayaran</a>
                    </div>
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