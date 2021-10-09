@extends('template')

@section('title') {{'Reservasi Jadwal'}} @endsection



@section('content')

<div class="container my-4">
    <div class="row mt-5 mb-4" style="overflow: hidden">
        <div class="col-12 px-4 ">
            @php
                $date = \Carbon\Carbon::parse($schedule->date);
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
                                <p >{{$schedule->routeRef->cityDepartureRef->name}}</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-2">
                                <p class="text-danger "><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-2">
                                <p class="">{{$schedule->routeRef->cityDepartureRef->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-clock mr-2" title="Waktu Keberangkatan"></i>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>{{$schedule->departure_time}}</p>
                            </div>
                            <div class="col-lg-2 col-4 pt-1">
                                <p class="text-danger"><i class="fas fa-arrow-right"></i></p>
                            </div>
                            <div class="col-lg-4 col-6 pt-1">
                                <p>{{$schedule->arrival_time}}</p>
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
                        <div class="row mb-3">
                            <div class="col-lg-1 col-1 pt-2">
                                <i class="fas fa-chair mr-2" title="Sisa Kursi"></i>
                            </div>
                            <div class="col-lg-8 col-8 pt-1">
                                <p>{{$schedule->remaining_seats}} Kursi Tersedia</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="font-weight-bold" style="text-transform: none">Rp.{{number_format($schedule->price,0,',','.')}}</a>
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
                                Pilih Kursi
                            </h3>
                       </div>
                    </div>
                    <div class="row mb-4" id="seat-container">
                        
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
                <form action="{{route('landing.shuttle.reservation.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="code" value="{{$code}}">
                    <input type="hidden" name="schedule_id" value="{{$id}}">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="text-secondary">Data Pemesan</h3>
                        </div>
                        <div class="mt-4">
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
                        <div class="mt-4">
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                    &nbsp;<i class="fas fa-swatchbook text-white"></i>&nbsp;
                                </span>
                                <input type="text" name="total_seat" class="form-control border-danger" id="total-seats-text" placeholder="Total Kursi" style="height: 40px !important;">
                            </div>
                            @if ($errors->has('toal_seat'))
                                <span class="text-danger">{{ $errors->first('toal_seat') }}</span>
                            @endif
                        </div>
                        <div class="mt-4">
                            <div class="input-group">
                                <span class="input-group-text border-1 border-danger bg-danger rounded-start ">
                                    &nbsp;<i class="fas fa-money-bill-wave text-white"></i>&nbsp;
                                </span>
                                <input type="text" class="form-control border-danger" id="price-text" placeholder="Total Harga" style="height: 40px !important;">
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
    <script>

        const seat_filled = [];
        const price = "{{$schedule->price}}";
        let total_seats = 0;
        let total_price = 0;

        $(document).ready(function() {

            AOS.init();
            callSeatList();

        });

        const callSeatList = () => {
            let url = "/shuttle/reservation/seatlist/";
            const scheduleId = "{{$id}}";

            $.ajax(
                {
                    url: url,
                    type: 'get', 
                    dataType: "JSON",
                    data: {
                        "scheduleId": scheduleId ,
                    },
                    success: function (response){
                        if(response.code == 200 && response.status == 1){
                            addSeatFilled(response.tickets);
                            renderSeats(response.vehicle.detail_ref);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                }
            });
        }

        const addSeatFilled = (tickets) =>{
            $.each(tickets, function (i, ticket) {
                seat_filled.push(parseInt(ticket.seat_number));
            });
        }

        const renderSeats = (seats) =>{
            let html = "";

            $.each(seats, function (i, seat) {
                if(seat.status == 0){
                    html += `<div class="col-3 mb-3">
                                <button class="button-seat btn btn-secondary p-0" data-number="${seat.number_of_seat}" id="btn_seat_${seat.number_of_seatt}" disabled style="width: 50px; height:50px">
                                    <i class="far fa-loveseat text-white text-center ml-1" id="icon_seat_${seat.number_of_seatt}" style="font-size: 30px"></i>
                                </button>
                            </div>`;
                }else if(seat_filled.indexOf(seat.number_of_seat) >= 0){
                    html += `<div class="col-3 mb-3">
                                <button class="button-seat btn btn-danger disabled p-0" data-number="${seat.number_of_seat}" id="btn_seat_${seat.number_of_seat}" style="width: 50px; height:50px">
                                    <i class="far fa-loveseat text-white text-center ml-1" id="icon_seat_${seat.number_of_seat}" style="font-size: 30px"></i>
                                </button>
                            </div>`;
                }else{
                    html += `<div class="col-3 mb-3">
                                <button class="button-seat btn btn-outline-danger p-0" onclick="chooseSeat(${seat.number_of_seat})" data-number="${seat.number_of_seat}" id="btn_seat_${seat.number_of_seat}" style="width: 50px; height:50px">
                                    <i class="far fa-loveseat text-center ml-1" id="icon_seat_${seat.number_of_seat}" style="font-size: 30px"></i>
                                </button>
                            </div>`;
                }
                
            });

            $('#seat-container').html(html);
        }

        const chooseSeat = (number_id) => {
            chooseButtonColor(number_id);
            chooseIconColor(number_id);
            addInputSeat(number_id);
            addTotalSeats();
           

            $('#btn_seat_'+number_id).attr("onclick",`removeSeat(${number_id})`);
        }

        const removeSeat = (number_id) => {
            removeButtonColor(number_id);
            removeIconColor(number_id);
            removeInputSeat(number_id);
            reduceTotalSeats();

            $('#btn_seat_'+number_id).attr("onclick",`chooseSeat(${number_id})`);
        }


        const chooseButtonColor = (number_id) => {
            $('#btn_seat_'+number_id).removeClass('btn-outline-danger');
            $('#btn_seat_'+number_id).addClass('btn-primary');
        }

        const chooseIconColor = (number_id) => {
            $('#icon_seat_'+number_id).addClass('text-white');
        }

        const removeButtonColor = (number_id) => {
            $('#btn_seat_'+number_id).removeClass('btn-primary');
            $('#btn_seat_'+number_id).addClass('btn-outline-danger');
            
        }

        const removeIconColor = (number_id) => {
            $('#icon_seat_'+number_id).removeClass('text-white');
        }

        const addTotalSeats = () => {
            total_seats = total_seats + 1;
            total_price = total_seats * parseInt(price);

            $('#total-seats-text').val(total_seats);
            $('#price-text').val("Rp. "+total_price);
            $('#price-inp').val(total_price);
        }

        const reduceTotalSeats = () => {
            total_seats = total_seats - 1;
            console.log(total_seats);
            total_price =  total_price - parseInt(price);

            $('#total-seats-text').val(total_seats);
            $('#price-text').val("Rp. "+total_price);
            $('#price-inp').val(total_price);
        }

        const addInputSeat = (number_id) => {
            let html = `<input type="hidden" name="seat_number[]" value="${number_id}" id="seat_inp_${number_id}">`;
            $('.input-seat').append(html);
        }

        const removeInputSeat = (number_id) => {
            $('#seat_inp_'+number_id).remove();
        }

        
        
    </script>
@endpush