@extends('template')

@section('title') {{'Pencarian Jadwal'}} @endsection



@section('content')

<div class="container my-4">
    <div class="row mt-5 mb-4" style="overflow: hidden">
        <div class="col-12 px-4 ">
            <article class="card-ticket fl-left border">
                <section class="date-ticket ">
                  <time datetime="23th feb">
                    <span>23</span><span>feb</span>
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