@extends('template')

@section('title') {{'Upload Bukti Transfer'}} @endsection



@section('content')

<div class="container my-5">
    <div class="row mb-4 mx-auto" style="max-width: 500px">
        <div class="col-12">
            <div class="card mx-auto shadow border-bottom-primary" style=" border-radius:40px;">
                <div class="card-body">
                    <div class="col-12">
                        <p class="h4 text-center font-weight-bold mb-2 mt-2 text-danger">Upload Bukti Transfer</p>
                    </div>
                    <div class="col-12 text-center mb-3">
                        <div class="text-center">
                            <h2 class="font-weight-bold mx-auto" id="hours"></h2>
                        </div>
                    </div>
                    <form action="{{route('landing.shuttle.reservation.uploadTransferPost', $code)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @php
                            $maxTime = date('Y-m-d H:i:s', strtotime($transaction->created_at . " +2 hours"))
                        @endphp
                        <input type="hidden" id="max-time" value="{{$maxTime}}">
                        <div class="row mb-4 mt-3">
                            <div class="col-12 text-center">
                                <img class="mx-auto mb-4" id="bukti-image" src="{{url('assets/img/svg_icon/confirmed.svg')}}" class="img-fluid" style="max-width: 250px" alt="">
                            </div>
                            <div class="col-lg-6 col-12 ">
                                <a href="#" class="btn btn-outline-danger btn-block" onclick="openFile()"><i class="far fa-image mr-2"></i>Upload</a>
                            </div>
                            <div class="col-lg-6 col-12">
                                <form action="" method="post">
                                    @csrf
                                    <input type="file" id="bukti-inp" name="bukti_image" onchange="previewFile()" class="d-none">
                                    <input type="submit" value="Selesai" class="btn btn-outline-primary btn-block">
                                </form>
                            </div>
                        </div>
                    </form>
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
            
            var maxTime = $('#max-time').val();

            var countDownDate = new Date(maxTime).getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $('#hours').text(hours.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + minutes.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + seconds.toLocaleString(undefined,{minimumIntegerDigits: 2}));

                if (distance < 0) {
                    clearInterval(x);
                    $('#hours').text("00:00");
                    const code = "{{$code}}";
                    const url = "/shuttle/reservation/updatestatus/"+code;

                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function (data) {
                            if (data.status == 1 && data.code == 200) {
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            }, 1000);
        });

        const openFile = () => {
            $('#bukti-inp').trigger('click'); 
        }

        const previewFile = () =>  {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("bukti-inp").files[0]);
            
                oFReader.onload = function(oFREvent) {
                    document.getElementById("bukti-image").src = oFREvent.target.result;
                };
            };

        
    </script>
@endpush