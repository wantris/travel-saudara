@extends('template')

@section('title') {{'Cek Reservasi'}} @endsection



@section('content')

{{-- Get TIME LIMIT --}}
@if ($order->transactionRef)
    @php
        $maxTime = date('Y-m-d H:i:s', strtotime($order->transactionRef->created_at . " +3 hours"))
    @endphp
@else
    @php
        $maxTime = date('Y-m-d H:i:s', strtotime($order->created_at . " +15 minutes"))
    @endphp
@endif

<input type="hidden" id="max-time" value="{{$maxTime}}">

@php
    $walink = "https://api.whatsapp.com/send?phone=628318964384&text=Bukti pembayaran untuk nama pemesan ". $order->fullname." dengan kode reservasi ".$order->code." dan kode tagihan ".$order->transactionRef->bill_code." sudah berhasil di upload. Harap segera memvalidasi bukti pembayaran tersebut. Terima Kasih";
@endphp

<div class="container my-5">
    <div class="row mb-4 mx-auto" style="max-width: 900px">
        <div class="col-12 mb-md-4">
            @if (\Carbon\Carbon::now()->format('Y-m-d') > \Carbon\Carbon::parse($order->scheduleRef->date)->format('Y-m-d'))
                <div class="text-white px-3 py-2" style="filter: grayscale(70%);background: url('/assets/img/elements/payment-bg.png');background-size: cover;background-position:right; border-radius: .6em;">
            @else
                @if ($order->status)
                    <div class="text-white px-3 py-2" style="background: url('/assets/img/elements/payment-bg.png');background-size: cover;background-position:right; border-radius: .6em;">
                @else
                    <div class="text-white px-3 py-2" style="filter: grayscale(70%);background: url('/assets/img/elements/payment-bg.png');background-size: cover;background-position:right; border-radius: .6em;">
                @endif
            @endif
            
                <div>
                    Reservasi Akan Dibatalkan Otomatis Dalam Waktu
                </div>
                <div class="display-6 font-weight-bold">
                    <span id="payment_time"></span>
                </div>
            </div>
        </div>
        <div class="col-12 mb-md-4">
            <div class="px-3 py-2" style="border:1px solid #e8002f; background-color:#ff5050;border-radius: .5em;">
                <p class="text-white">Bukti transfer telah berhasil dikirim, silahkan tunggu validasi admin. Apabila belum tervalidasi admin, silahkan hubungi via <a href="{{$walink}}" class="font-weight-bold text-white"><i class="fab fa-whatsapp mr-1 ml-1"></i>081295491852</a>. <a class="text-white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lihat contoh pesan konfirmasi <i class="fad fa-arrow-down ml-1"></i></a></p>
                <div class="collapse text-white px-3 mt-3" id="collapseExample">
                    <hr class="text-white">
                    "Bukti pembayaran untuk nama pemesan {{$order->fullname}} dengan kode reservasi {{$order->code}} dan kode tagihan {{$order->transactionRef->bill_code}} sudah berhasil di upload. Harap segera memvalidasi bukti pembayaran tersebut. <br>Terima Kasih"
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="shadow bg-white mt-md-0 mt-4 p-3 h-100" style="border-radius: .5em;">
                <div class="row">
                    <div class="col-12 h6 fw-bolder text-danger mt-2 mb-4" style="font-size: 1.2em;">
                        Data Pemesan:
                    </div>
                    @if ($order->transactionRef)
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Kode Tagihan <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control border-secondary" disabled placeholder="Kode Tagihan" value="{{$order->transactionRef->bill_code}}" style="height: 40px !important;">
                            </div>
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nama Pemesan <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control border-secondary" disabled placeholder="Nama Pemesan" value="{{$order->fullname}}" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control border-secondary" value="{{$order->email}}" disabled placeholder="Email" value="gustiwacik@gmail.com" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nomor Whatsapp <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control border-secondary" value="{{$order->wa_number}}" disabled placeholder="Nomor Whatsapp" value="081295491852" style="height: 40px !important;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="shadow bg-white mt-md-0 mt-4 p-3 h-100" style="border-radius: .5em;">
                <div class="row px-3">
                    <div class="col-12 h6 fw-bolder text-danger mt-2 mb-4" style="font-size: 1.2em;">
                        Data Keberangkatan:
                    </div>
                    <div class="col-12 d-flex mb-3 border-bottom">
                        <i class="fas fa-stream text-danger fa-1x mr-3 mt-1"></i>
                        <p class="fw-bold text-secondary">{{$order->code}}</p>
                    </div>
                    <div class="col-12 d-flex mb-3 border-bottom">
                        <i class="fas fa-map-marker-alt text-danger fa-1x mr-3 mt-1"></i>
                        <p class="fw-bold text-secondary mr-3">{{$order->scheduleRef->routeRef->cityDepartureRef->name}}</p>
                        <i class="fas fa-arrow-right text-danger fa-sm mr-3 mt-2"></i>
                        <p class="fw-bold text-secondary mr-3">{{$order->scheduleRef->routeRef->cityArrivalRef->name}}</p>
                    </div>
                    <div class="col-12 d-flex mb-3 border-bottom">
                        <i class="fas fa-calendar-week text-danger fa-1x mr-3 mt-1"></i>
                        @php
                            $date = \Carbon\Carbon::parse($order->scheduleRef->date);
                        @endphp
                        <p class="fw-bold text-secondary">{{$date->isoFormat('DD MMMM YYYY')}}</p>
                    </div>
                    @foreach ($order->ticketRef as $ticket)
                        <div class="col-12 d-flex mb-3 border-bottom">
                            <i class="fas fa-loveseat text-danger fa-1x mr-3 mt-1"></i>
                            <p class="fw-bold text-secondary">Kursi No.{{$ticket->seat_number}} ({{$ticket->ticket_code}})</p>
                        </div>
                    @endforeach
                    <div class="col-12 h6 fw-bolder text-danger mt-2 mb-2" style="font-size: 1.2em;">
                        Total Tagihan
                    </div>
                    <div class="col-12 d-flex mb-3">
                        <i class="fas fa-money-bill-wave text-danger fa-1x mr-3 mt-1"></i>
                        <p class="fw-bold text-secondary">Rp. {{number_format($order->subtotal,2,',','.')}}</p>
                    </div>
                    @if (!$order->transactionRef)
                        <div class="col-12 h6 fw-bolder text-danger mt-2 mb-2" style="font-size: 1.2em;">
                            Pilih Bank Transfer
                        </div>
                    @endif
                </div>
                <div class="row px-3 mb-3 d-none" id="nominal-transfer">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mb-2">
                                Nominal Transfer:
                            </div>
                        </div>
                        <div class="row gx-2">
                            <div class="col d-grid align-items-stretch">
                                <div class="d-flex align-items-center justify-content-center fs-5 font-weight-bold py-2 rounded" style="background:#ffe9e9">
                                    Rp{{number_format($order->subtotal,0,',','.')}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="btn btn-sm btn-outline-danger py-2 link-danger font-weight-bold rounded" style="border:1px solid" onclick="copyPaste('110543')">
                                Salin
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @if (\Carbon\Carbon::now()->format('Y-m-d') > \Carbon\Carbon::parse($order->scheduleRef->date)->format('Y-m-d'))
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('landing.shuttle.index')}}" class="btn btn-secondary btn-block ripple-surface">Reservasi selesai</a>
                        </div>
                    </div>
                @else
                    @if ($order->status)
                        <div class="row">
                            <div class="col-md-6 text-md-start text-center py-md-5 py-1">
                                <a href="{{route('landing.shuttle.index')}}" class="btn btn-danger btn-block ripple-surface">Kembali</a>
                            </div>
                            <div class="col-md-6 text-md-end text-center py-md-5 py-1">
                                @if ($order->transactionRef && $order->transactionRef->status == 0)
                                    <a href="{{route('landing.shuttle.reservation.uploadTransfer', $code)}}" class="btn btn-primary btn-block ripple-surface">Upload Bukti Transfer</a>
                                @elseif ($order->transactionRef && $order->transactionRef->status == 3)
                                    <a href="#" class="btn btn-secondary btn-block ripple-surface">Batas Waktu Tagihan Habis</a>
                                @elseif(!$order->transactionRef)
                                    <form action="{{route('landing.shuttle.reservation.payment.save', $code)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="bank_payment" id="bank-payment-inp">
                                        <input type="submit" value="Lanjutkan Pembayaran" class="btn btn-primary btn-block" id="pay-button">
                                    </form>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-secondary btn-block ripple-surface">Batas waktu reservasi habis</a>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="col-12 px-3 mt-4">
            <div class="row px-2">
                <div class="col-12 mt-4 py-2 fw-bold text-muted" style="background-color: #ffffffd5;">
                    Syarat &amp; Ketentuan:
                </div>
                <div class="col-12 small text-black-50" style="background-color: #ffffffd5;">
                    <ol type="1" style="line-height: 1.4;list-style-type:decimal !important">
                        <li style="">Harga tiket sudah termasuk asuransi jasaraharja (pastikan nama anda tercantum dalam manifest).</li>
                        <li>Checkin maksimal 15 menit sebelum jam keberangkatan, jika terlambat maka tiket dianggap hangus (tanpa konfirmasi).</li>
                        <li>Tiket yang sudah dipesan tidak dapat di uangkan atau refund.</li>
                        <li>Anak usia 2th ke atas dikenakan satu tiket.</li>
                        <li>Pindah jadwal maksimal 1 kali dalam jangka waktu 1 minggu kedepan terhitung dari tanggal keberangkatan.</li>
                        <li>Konfirmasi untuk pindah jadwal maksimal 2 jam sebelum jadwal keberangkatan, lewat dari itu tiket di anggap hangus (tanpa konfirmasi).</li>
                        <li>Dilarang membawa miras, narkoba, senjata tajam, senjata api, binatang, makanan / minuman yang berbau tajam.</li>
                        <li>Barang bagasi maksimal 1 tas besar dan 1 tas kecil, selebihnya akan dikenakan biaya paket.</li>
                        <li>Barang elektronik (TAPE / TV dan COMPUTER) dikenakan biaya paket + asuransi</li>
                        <li>Barang bawaan milik penumpang sepenuhnya tanggung jawab penumpang yang bersangkutan dan Bhinneka Shuttle tidak bertanggung jawab atas kehilangan biaya tersebut.</li>
                        <li>Mohon laporkan jika supir kami menaikan penumpang / paket di jalan (sertakan kode / nopol mobil)</li>
                        <li>Penumpang wajib memakai sabuk pengaman terutama kursi no 1</li>
                    </ol>
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
            let statusTransac = "{{$order->transactionRef}}";
            var maxTime = $('#max-time').val();
            var countDownDate = new Date(maxTime).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
                
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
                
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if(!statusTransac){
                $('#payment_time').text( minutes.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + seconds.toLocaleString(undefined,{minimumIntegerDigits: 2}));
            }else{
                $('#payment_time').text( hours.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + minutes.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + seconds.toLocaleString(undefined,{minimumIntegerDigits: 2}));
            }
            

            if (distance < 0) {
                clearInterval(x);
                $('#payment_time').text("00:00");

                if(!statusTransac){
                    const code = "{{$code}}";
                    const url = "/shuttle/reservation/updatestatus/"+code;

                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function (data) {
                            if (data.status == 1 && data.code == 200) {
                                location.reload();
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }   
            }
        }, 1000);
        });

        const chooseBank = (bank_id) => {
            event.preventDefault();
            $('.bank-row').each(function(){
                if(!$(this).hasClass('d-none')){
                    $(this).addClass('d-none');
                };
            });

            $('#bank_row_'+bank_id).removeClass('d-none');
            $('#bank-payment-inp').val(bank_id);

        }

        
    </script>
@endpush