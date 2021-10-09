<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>4 Saudara Trans - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS ASSETS -->
    @include('_partials.css_asset')

    @stack('custom-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

    <!-- NAVBAR -->
    @include('_partials.navbar')

    @yield('content')

    <!-- FOOTER -->
    @include('_partials.footer')

    <!-- Modal -->
        <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <input type="text" placeholder="Search" >
                    <button type="submit">search</button>
                </div>
            </div>
            </div>
        </div>
    <!-- link that opens popup -->


    <!-- JS ASSETS -->
    @include('_partials.js_asset')

    @stack('custom-script')
</body>

</html>