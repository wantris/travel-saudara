
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>

    @include('admin._partials.admin_css')
    @stack('custom-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

      @include('admin._partials.admin_navbar')

      @include('admin._partials.admin_sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            @yield('breadcumb')
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </section>
      </div>

      @include('admin._partials.admin_footer')
  </div>
  <!-- ./wrapper -->

  @include('admin._partials.admin_js')
  @stack('custom-js')

</body>
</html>
