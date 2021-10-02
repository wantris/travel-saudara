@extends('template')

@section('title') {{'Pencarian Jadwal'}} @endsection

@push('custom-style')

@endpush

@section('content')

<div class="container my-4">
    <div class="row p-2">
        <div class="col-12">
            <div class="fs-3 fw-lighter">
                <i class="fas fs-4 fa-map-marker-alt text-danger"></i>&nbsp; <b>JAKARTA</b>
                &nbsp;&nbsp;<i class="fas fs-5 fa-chevron-right text-black-50" style="font-size: .7em;"></i> &nbsp; TEGAL </div>
        </div>
        <div class="col-12">
            <div class="mt-3">
            <i class="far fa-calendar-alt text-danger"></i>&nbsp; 04 Oktober 2021 </div>
        </div>
    </div>

    <div class="row mt-3 p-3">
        <div class="col-12 py-3 px-4 shadow bg-white" style="border-radius: .5em;">
            <div class="row">
                <div class="col-md-6">
                    <div class="small"> <b>Dari:</b></div>
                    <select class="rounded-end wide" style="width: 100%">
                        <option data-display="Cari Keberangkatan">Cari Keberangkatan</option>
                        <option value="1">Jakarta</option>
                        <option value="2">Tegal</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="small"> 
                        <b>Ke:</b>
                    </div>
                    <select class="rounded-end wide" style="width: 100%">
                        <option data-display="Cari Tujuan">Cari Tujuan</option>
                        <option value="1">Jakarta</option>
                        <option value="2">Tegal</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="small"> 
                        <b>Tanggal Pergi:</b>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text border-1 rounded-start bg-white">
                            &nbsp;<i class="fas fa-calendar-alt text-danger"></i>&nbsp;
                        </span>
                        <input type="text" id="date-travel" class="form-control rounded-end" name="tanggal" id="ticketing-picker" readonly="">
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <div class="switch-wrap mt-3">
                        <div class="primary-switch border">
                            <input type="checkbox" id="primary-switch" checked>
                            <label for="primary-switch"></label>
                        </div>
                    </div>
                    <b class="text-danger mt-2">&nbsp; Pergi Pulang?</b>
                </div>
                <div class="col-md-4">
                    <div id="labeltglpulang" class="small" style="display:none;"> 
                        <b>Tanggal Pulang:</b>
                    </div>
                    <div class="input-group" style="display:none;" id="tglpulang">
                        <span class="input-group-text border-1 rounded-start bg-white">
                            &nbsp;<i class="far fa-calendar-alt small text-black-50"></i>&nbsp;
                        </span>
                        <input name="tanggalpulang" id="tanggalpulang" type="text" class="form-control rounded-end" aria-label="tanggalpulang" aria-describedby="tanggalpulang" readonly="">
                    </div>
                </div>
                <div class="col">
                    <div class="small"> 
                        <b>&nbsp;</b>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-danger btn-block">Cari Jadwal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-6 col-md-6 col-12 mb-3">
            <div class="card border-0 shadow-1 border-radius-20" >
                <div class="card-body px-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5 class="font-weight-bold text-secondary">4 Saudara Trans</h5>
                        </div>
                        <div class="mb-2">
                            <p class="text-danger small pl-3">Rp.200.000/pax</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-4">
                            <h4 class="text-secondary">06:00</h4>
                            <p class="text-danger">JAKARTA</p>
                        </div>
                        <div class="col-lg-3 col-4">
                            <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                        </div>
                        <div class="col-lg-3 col-4">
                            <h4 class="text-secondary">14:00</h4>
                            <p class="text-danger">TEGAL</p>
                        </div>
                        <div class="col-lg-3 border-left d-none d-none d-sm-block">
                            <h4 class="text-secondary">Sisa Kursi</h4>
                            <p class="text-danger">4</p>
                        </div>
                        {{-- <div class="col-lg-4 mt-2 d-block d-sm-none">
                            <h4 class="text-secondary">Sisa Kursi</h4>
                            <p class="text-danger">4</p>
                        </div> --}}
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{route('landing.shuttle.reservation.create')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">Pesan Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 mb-3">
            <div class="card border-0 shadow-1 border-radius-20" >
                <div class="card-body px-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5 class="font-weight-bold text-secondary">4 Saudara Trans</h5>
                        </div>
                        <div class="mb-2">
                            <p class="text-danger small pl-3">Rp.200.000/pax</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-4">
                            <h4 class="text-secondary">13:00</h4>
                            <p class="text-danger">JAKARTA</p>
                        </div>
                        <div class="col-lg-3 col-4">
                            <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                        </div>
                        <div class="col-lg-3 col-4">
                            <h4 class="text-secondary">20:00</h4>
                            <p class="text-danger">TEGAL</p>
                        </div>
                        <div class="col-lg-3 border-left d-none d-none d-sm-block">
                            <h4 class="text-secondary">Sisa Kursi</h4>
                            <p class="text-danger">2</p>
                        </div>
                        {{-- <div class="col-lg-4 mt-2 d-block d-sm-none">
                            <h4 class="text-secondary">Sisa Kursi</h4>
                            <p class="text-danger">2</p>
                        </div> --}}
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary btn-block">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-lg-6 col-md-6 col-12 mb-3">
            <div class="card border-0 shadow-1 border-radius-20" >
                <div class="card-body px-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5 class="font-weight-bold text-secondary">4 Saudara Trans</h5>
                        </div>
                        <div class="mb-2">
                            <p class="text-danger small pl-3">Rp.100.000/pax</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-4">
                            <h4 class="text-secondary">09:00</h4>
                            <p class="text-danger">JAKARTA</p>
                        </div>
                        <div class="col-lg-3 col-4">
                            <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                        </div>
                        <div class="col-lg-3 col-4">
                            <h4 class="text-secondary">16:00</h4>
                            <p class="text-danger">TEGAL</p>
                        </div>
                        <div class="col-lg-3 border-left d-none d-none d-sm-block">
                            <h4 class="text-secondary">Sisa Kursi</h4>
                            <p class="text-danger">4</p>
                        </div>
                        {{-- <div class="col-lg-4 mt-2 d-block d-sm-none">
                            <h4 class="text-secondary">Sisa Kursi</h4>
                            <p class="text-danger">4</p>
                        </div> --}}
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn-block">Pesan Sekarang</button>
                        </div>
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