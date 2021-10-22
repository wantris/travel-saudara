@extends('template')

@section('title') {{'Reservasi Jadwal'}} @endsection



@section('content')

<div class="container my-4">
    <div class="row mt-5 mb-4" style="overflow: hidden">
        <div class="col-lg-6 col-12 px-4 ">
            @php
                $date = \Carbon\Carbon::parse($roundSchedule->date);
            @endphp
            <article class="card-ticket fl-left border">
                <section class="date-ticket ">
                  <time datetime="23th feb">
                    <span>{{$date->isoFormat('DD')}}</span><span>{{$date->isoFormat('MMM')}}</span>
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
                                <p >{{$roundSchedule->routeRef->cityDepartureRef->name}}</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-2">
                                <p class="text-danger "><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-2">
                                <p class="">{{$roundSchedule->routeRef->cityDepartureRef->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-clock mr-2" title="Waktu Keberangkatan"></i>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>{{substr($roundSchedule->departure_time,0,-3)}}</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-1">
                                <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>{{substr($roundSchedule->arrival_time,0,-3)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fa fa-calendar mr-2" title="Tanggal Keberangkatan"></i>
                            </div>
                            <div class="col-lg-10 col-8 pt-1">
                                <p>{{$date->isoFormat('DD MMMM YYYY')}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-chair mr-2" title="Sisa Kursi"></i>
                            </div>
                            <div class="col-lg-8 col-8 pt-1">
                                <p>{{$roundSchedule->remaining_seats}} Kursi Tersedia</p>
                            </div>
                        </div>
                        <div class="row mb-3 text-danger">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-money-bill mr-2"></i>
                            </div>
                            <div class="col-lg-8 col-8 pt-1">
                                <p class="text-danger">Rp. {{number_format($roundSchedule->price,0,',','.')}}</p>
                            </div>
                        </div>
                    </div>
                </section>
              </article>
        </div>
        <div class="col-lg-6 col-12 px-4 ">
            @php
                $date = \Carbon\Carbon::parse($tripSchedule->date);
            @endphp
            <article class="card-ticket fl-left border">
                <section class="date-ticket ">
                  <time datetime="23th feb">
                    <span>{{$date->isoFormat('DD')}}</span><span>{{$date->isoFormat('MMM')}}</span>
                  </time>
                </section>
                <section class="card-cont">
                    <small>Jadwal Pulang</small>
                    <h3>4 Saudara Trans</h3>
                    <div class="container-fluid w-100 d-block">
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fa fa-map-marker mr-2 mt-2" title="Rute Pulang"></i>
                            </div>
                            <div class="col-lg-4 col-6 pt-2">
                                <p >{{$tripSchedule->routeRef->cityDepartureRef->name}}</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-2">
                                <p class="text-danger "><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-2">
                                <p class="">{{$tripSchedule->routeRef->cityDepartureRef->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-clock mr-2" title="Waktu Keberangkatan"></i>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>{{substr($tripSchedule->departure_time,0,-3)}}</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-1">
                                <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>{{substr($tripSchedule->arrival_time,0,-3)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fa fa-calendar mr-2" title="Tanggal Keberangkatan"></i>
                            </div>
                            <div class="col-lg-10 col-8 pt-1">
                                <p>{{$date->isoFormat('DD MMMM YYYY')}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-chair mr-2" title="Sisa Kursi"></i>
                            </div>
                            <div class="col-lg-8 col-8 pt-1">
                                <p>{{$tripSchedule->remaining_seats}} Kursi Tersedia</p>
                            </div>
                        </div>
                        <div class="row mb-3 text-danger">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-money-bill mr-2"></i>
                            </div>
                            <div class="col-lg-8 col-8 pt-1">
                                <p class="text-danger">Rp. {{number_format($tripSchedule->price,0,',','.')}}</p>
                            </div>
                        </div>
                    </div>
                </section>
              </article>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-6 mb-3">
            <div class="col-12 mb-3">
                <div class="card shadow-1 border-radius-20 border-bottom-primary">
                    <div class="card-body px-5">
                        <div class="row mb-4">
                           <div class="col-12">
                                <h3 class="text-secondary text-center">
                                    Pilih Kursi Keberangkatan
                                </h3>
                           </div>
                        </div>
                        <div class="row mb-4" id="seat-round-container">
                            
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
            <div class="col-12">
                <div class="card shadow-1 border-radius-20 border-bottom-primary">
                    <div class="card-body px-5">
                        <div class="row mb-4">
                           <div class="col-12">
                                <h3 class="text-secondary text-center">
                                    Pilih Kursi Pulang
                                </h3>
                           </div>
                        </div>
                        <div class="row mb-4" id="seat-trip-container">
                            
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
        </div>
        <div class="col-lg-6 col-12">
            <div class="card shadow border-radius-20 border-bottom-primary">
                <form action="{{route('landing.shuttle.reservation.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="schedule_id" value="{{$roundSchedule->id}}">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="text-secondary">Data Pemesan</h3>
                        </div>
                        <div class="mt-4">
                            <label for="">Nama Pemesan</label>
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger bg-danger rounded-start">
                                    &nbsp;<i class="fas fa-signature text-white"></i>&nbsp;
                                </span>
                                <input type="text" name="full_name" class="form-control border-danger" placeholder="Nama Lengkap" style="height: 40px !important;">
                            </div>
                            @if ($errors->has('full_name'))
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>
                        <div class="mt-4">
                            <label for="">Email Pemesan</label>
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                    &nbsp;<i class="fas fa-at text-white"></i>&nbsp;
                                </span>
                                <input type="text" name="email" class="form-control border-danger" placeholder="Email" style="height: 40px !important;">
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mt-4">
                            <label for="">Nomor Whatsapp</label>
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                    &nbsp;<i class="fab fa-whatsapp text-white"></i>&nbsp;
                                </span>
                                <input type="text" name="wa_number" class="form-control border-danger" placeholder="Nomor Whatsapp" style="height: 40px !important;">
                            </div>
                            @if ($errors->has('wa_number'))
                                <span class="text-danger">{{ $errors->first('wa_number') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mt-4">
                                    <label for="">Total Kursi Pergi</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                            &nbsp;<i class="fas fa-swatchbook text-white"></i>&nbsp;
                                        </span>
                                        <input type="text" disabled class="form-control border-danger"  id="total-seats-text"  placeholder="Total Kursi" style="height: 40px !important;">
                                    </div>
                                    <input type="hidden" name="total_seat" id="total-seats-inp">
                                    @if ($errors->has('total_seat'))
                                        <span class="text-danger">{{ $errors->first('total_seat') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mt-4">
                                    <label for="">Total Kursi Pulang</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                            &nbsp;<i class="fas fa-swatchbook text-white"></i>&nbsp;
                                        </span>
                                        <input type="text" disabled class="form-control border-danger"  id="total-seats-text"  placeholder="Total Kursi" style="height: 40px !important;">
                                    </div>
                                    <input type="hidden" name="total_seat" id="total-seats-inp">
                                    @if ($errors->has('total_seat'))
                                        <span class="text-danger">{{ $errors->first('total_seat') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mt-4">
                                    <label for="">Total Harga Pergi</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                            &nbsp;<i class="fas fa-money-bill-wave text-white"></i>&nbsp;
                                        </span>
                                        <input type="text" disabled class="form-control border-danger" id="price-text" placeholder="Total Harga" style="height: 40px !important;">
                                        <input type="hidden" name="price" class="form-control border-danger" id="price-inp" placeholder="Total Harga" style="height: 40px !important;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mt-4">
                                    <label for="">Total Harga Pulang</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                            &nbsp;<i class="fas fa-money-bill-wave text-white"></i>&nbsp;
                                        </span>
                                        <input type="text" disabled class="form-control border-danger" id="price-text" placeholder="Total Harga" style="height: 40px !important;">
                                        <input type="hidden" name="price" class="form-control border-danger" id="price-inp" placeholder="Total Harga" style="height: 40px !important;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="">Total Harga</label>
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                    &nbsp;<i class="fas fa-money-bill-wave text-white"></i>&nbsp;
                                </span>
                                <input type="text" disabled class="form-control border-danger" id="price-text" placeholder="Total Harga" style="height: 40px !important;">
                                <input type="hidden" name="price" class="form-control border-danger" id="price-inp" placeholder="Total Harga" style="height: 40px !important;">
                            </div>
                        </div>
                        <div class="input-seat">
                            
                        </div>
                        <div class="mt-4">
                            <input type="submit" class="btn btn-danger btn-block rounded" value="Lanjut Pembayaran">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push('custom-script')
    <script src="{{url('assets/js/seatRoundList.js')}}"></script>
    <script src="{{url('assets/js/seatTripList.js')}}"></script>

    <script>
        const roundScheduleId = "{{$roundSchedule->id}}";
        const tripScheduleId = "{{$tripSchedule->id}}";

        const seat_filled = [];
        const seat_filledTrip = [];
        const price = "{{$roundSchedule->price}}";
        let total_seats = 0;
        let total_price = 0;

        $(document).ready(function() {

            AOS.init();
            callSeatRoundList();
            callSeatTripList();
        });

        

        
        
    </script>
@endpush