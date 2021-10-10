  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html mb-4" class="brand-link">
      <img src="{{url('assets/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-3">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{url('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Admin</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon far fa-tachometer-slowest"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon far fa-user-shield"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.city.index')}}" class="nav-link">
                <i class="nav-icon far fa-building"></i>
              <p>
                Kota Rute
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.vehicle.index')}}" class="nav-link">
              <i class="nav-icon fad fa-car"></i>
              <p>
                Kendaraan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.route.index')}}" class="nav-link">
                <i class="nav-icon fas fa-route"></i>
              <p>
                Rute
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.schedule.index')}}" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.bankPayment.index')}}" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Akun Bank
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>