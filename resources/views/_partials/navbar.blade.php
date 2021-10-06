<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-1 col-lg-1">
                            <div class="logo">
                                <a href="index.html">
                                    <img height="39"  src="{{url('assets/img/logo/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 pl-5">
                            <div class="main-menu d-none d-lg-block ml-2">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">home</a></li>
                                        <li><a href="{{route('landing.shuttle.index')}}">Travel Reguler</a></li>
                                        {{-- <li><a class="" href="travel_destination.html">Carter</a></li>
                                        <li><a class="" href="travel_destination.html">Paket</a></li> --}}
                                        <li><a class="" href="travel_destination.html">Blog</a></li>
                                        <li class="d-block d-md-block d-sm-none d-lg-none d-xl-none"><a href="#"><i class="fas fa-user-circle mr-2 "></i>Login </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p> <i class="fa fa-phone"></i> 10(256)-928 256</p>
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="#"> <i class="fab fa-instagram"></i> </a></li>
                                        <li><a href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        <li><a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                                        <li>
                                            <a href="{{route('landing.auth.login')}}"><i class="fas fa-user-circle mr-2 "></i>Login </a>
                                            {{-- <div class="dropdown show">
                                                <a class="dropdown-toggle" href="#" role="button" id="navbar-menu-login"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="" class="d-inline mr-1" style="width: 30px; height:30px; border-radius:20px" alt="">
                                                    asdasd
                                                    <i class="icofont-rounded-down d-inline mt-2 text-secondary" id="arrow-icon"></i>
                                                </a>
                                                <div class="dropdown-menu mr-4" aria-labelledby="navbar-menu-login">
                                                
                                                    <a class="dropdown-item text-center px-2 py-2" href=""></a>
                                                    <a class="dropdown-item text-center px-2 py-2" href="">Ganti
                                                        Password</a>
                                                    <a class="dropdown-item text-center px-2 py-2" href="">Sign out</a>
                                                </div>
                                            </div> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>