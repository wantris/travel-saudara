@extends('template')

@section('title') {{'Pembayaran'}} @endsection



@section('content')

<div class="container my-5">
    <div class="row mb-4 mx-auto" style="max-width: 900px">
        <div class="col-12 mb-md-4">
            <div class="text-white px-3 py-2" style="background: url('/assets/img/elements/payment-bg.png');background-size: cover;background-position:right; border-radius: .6em;">
                <div>
                    Reservasi Akan Dibatalkan Otomatis Dalam Waktu
                </div>
                <div class="display-6 font-weight-bold">
                    <span id="payment_time">14:36</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="shadow bg-white mt-md-0 mt-4 p-3 h-100" style="border-radius: .5em;">
                <div class="row">
                    <div class="col-12 h6 fw-bolder text-danger mt-2 mb-4" style="font-size: 1.2em;">
                        Data Pemesan:
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nama Pemesan <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control border-secondary" disabled placeholder="Nama Pemesan" value="{{$code->fullname}}" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control border-secondary" disabled placeholder="Email" value="gustiwacik@gmail.com" style="height: 40px !important;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nomor Whatsapp <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control border-secondary" disabled placeholder="Nomor Whatsapp" value="081295491852" style="height: 40px !important;">
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
                        <p class="fw-bold text-secondary">TORDER-2319893-264</p>
                    </div>
                    <div class="col-12 d-flex mb-3 border-bottom">
                        <i class="fas fa-map-marker-alt text-danger fa-1x mr-3 mt-1"></i>
                        <p class="fw-bold text-secondary mr-3">JAKARTA</p>
                        <i class="fas fa-arrow-right text-danger fa-sm mr-3 mt-2"></i>
                        <p class="fw-bold text-secondary mr-3">TEGAL</p>
                    </div>
                    <div class="col-12 d-flex mb-3 border-bottom">
                        <i class="fas fa-calendar-week text-danger fa-1x mr-3 mt-1"></i>
                        <p class="fw-bold text-secondary">24 Oktober 2021</p>
                    </div>
                    <div class="col-12 d-flex mb-3 border-bottom">
                        <i class="fas fa-loveseat text-danger fa-1x mr-3 mt-1"></i>
                        <p class="fw-bold text-secondary">Kursi No.8</p>
                    </div>
                    <div class="col-12 h6 fw-bolder text-danger mt-2 mb-2" style="font-size: 1.2em;">
                        Total Tagihan
                    </div>
                    <div class="col-12 d-flex mb-3">
                        <i class="fas fa-money-bill-wave text-danger fa-1x mr-3 mt-1"></i>
                        <p class="fw-bold text-secondary">Rp. 200.000,00</p>
                    </div>
                    <div class="col-12 h6 fw-bolder text-danger mt-2 mb-2" style="font-size: 1.2em;">
                        Pilih Bank Transfer
                    </div>
                    <div class="col-12">
                        <div class="col-md-3 col-lg-3 col-6 btn-group shadow-0">
                            <input type="radio" class="btn-check" name="options" id="option4" value="echannel" autocomplete="off">
                            <label class="btn btn-light p-1" for="option4">
                                <img class="img-thumbnail" src="https://naikbhinneka.com/uploads/wisata/payment-logo/Untitled-1-04.png" alt="">
                            </label>
                        </div>
                        <div class="col-md-3 col-lg-3 col-6 btn-group shadow-0">
                            <input type="radio" class="btn-check" name="options" id="option4" value="echannel" autocomplete="off">
                            <label class="btn btn-light p-1" for="option4">
                                <img class="img-thumbnail" src="https://naikbhinneka.com/uploads/wisata/payment-logo/Untitled-1-06.png" alt="">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-md-start text-center py-md-5 py-1">
                        <button type="submit" name="submit_batal" value="submit_batal" class="btn btn-danger btn-block ripple-surface" onclick="return confirm('Anda yakin membatalkan reservasi TAG-4444-264 ini?');">Batalkan Reservasi</button>
                    </div>
                    <div class="col-md-6 text-md-end text-center py-md-5 py-1">
                        <a href="{{route('landing.shuttle.reservation.paymentsingle', $code)}}" id="pay-button" class="btn btn-primary btn-block">Lanjutkan Pembayaran</a>
                    </div>
                </div>
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