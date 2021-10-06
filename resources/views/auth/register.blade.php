@extends('template')

@section('title') {{'Login'}} @endsection



@section('content')

<div class="container my-5">
    <div class="row h-100 align-items-center mx-0 justify-content-center">
        <div class="col-xxl-3 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-11">
            <div class="row shadow bg-login border-bottom-primary bg-white my-sm-0 my-3 pt-sm-0 pt-4" style="border-radius: 10px;"> 
                <div class="col-12 d-flex align-items-sm-center rounded-login p-sm-4 p-3">
                    <div class="row text-center">
                        <div class="col-12 fw-bolder h2 text-danger">
                            Daftar Akun
                        </div>
                        <div class="col-lg-6 col-12 pt-sm-4 input-group ">
                            <span class="input-group-text rounded-pill border-0 shadow" style="height: 50px;">
                                <i class="fal fa-signature"></i>
                            </span>
                            <input type="text" name="name" id="name-inp" autocomplete="on" class="shadow form-control rounded-pill rounded-start border-0" placeholder="masukkan nama :" style="height: 50px;" required="">
                        </div> 
                        <div class="col-lg-6 col-12 pt-sm-4 input-group ">
                            <span class="input-group-text rounded-pill border-0 shadow" style="height: 50px;">
                                <i class="fas fa-envelope-open"></i>
                            </span>
                            <input type="email" name="email" id="email" autocomplete="on" class="shadow form-control rounded-pill rounded-start border-0" placeholder="masukkan alamat email :" style="height: 50px;" required="">
                        </div> 
                        <div class="col-lg-6 col-12 pt-sm-4 input-group ">
                            <span class="input-group-text rounded-pill border-0 shadow" style="height: 50px;">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                            <input type="text" name="whatsapp" id="whatsapp-inp" autocomplete="on" class="shadow form-control rounded-pill rounded-start border-0" placeholder="masukkan nomor whatsapp :" style="height: 50px;" required="">
                        </div> 
                        <div class="col-lg-6 col-12 pt-sm-4 input-group ">
                            <span class="input-group-text rounded-pill border-0 shadow" style="height: 50px;">
                                <i class="fal fa-key"></i>
                            </span>
                            <input type="email" name="email" id="email" autocomplete="on" class="shadow form-control rounded-pill rounded-start border-0" placeholder="masukkan password :" style="height: 50px;" required="">
                        </div>  
                        <div class="col-lg-12 col-12 pt-sm-4 input-group ">
                            <span class="input-group-text rounded-pill border-0 shadow" style="height: 50px;">
                                <i class="fal fa-key"></i>
                            </span>
                            <input type="email" name="email" id="email" autocomplete="on" class="shadow form-control rounded-pill rounded-start border-0" placeholder="masukkan konfirmasi password :" style="height: 50px;" required="">
                        </div>    
                        <div class="col-12 pt-5 pb-3">
                            <button name="submit" value="submit" type="submit" class="btn btn-danger rounded-pill btn-block btn-lg shadow">Masuk</button>
                        </div>
                        <div class="col-12 small text-black-50">
                            <small> Sudah memiliki akun?</small>
                        </div>
                        <div class="col-12 text-black-50">
                            <a href=""><span class="text-danger font-weight bold">Sign In</span></a>
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