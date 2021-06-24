<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{--  <a href="{{ asset('assets/index3.html') }}" class="brand-link elevation-4">  --}}
    <a href="#" class="brand-link elevation-4">
      <img src="{{ asset('assets/dist/img/Logo-Untan-Universitas-Tanjungpura-PNG.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pendikar Muslim</span>
    </a>

    {{--  <br><br>  --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('foto/adminSekretaris/' . auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="{{ route('admin.home') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('nilaiPeriodikAdminIndex') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Nilai Periodik</p>
                </a>
            </li>
            {{--  <li class="nav-item">
                <a href="{{ route('dpns1Koordinator') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>DPNS</p>
                </a>
            </li>
             <li class="nav-item">
                <a href="{{ route('dpns1HomeKoordinator') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>DPNS 1 home</p>
                </a>
            </li>  --}}
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>DPNS
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dpns1HomesController') }}" class="nav-link">
                    <i class="far fa-file-alt nav-icon"></i>
                    <p>DPNS 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dpns2HomesController') }}" class="nav-link">
                    <i class="far fa-file-alt nav-icon"></i>
                    <p>DPNS 2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dpns3HomesController') }}" class="nav-link">
                    <i class="far fa-file-alt nav-icon"></i>
                    <p>DPNS 3</p>
                    </a>
                </li>
                {{--  <li class="nav-item">
                    <a href="{{ route('dpns1HomeKoordinator') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Options DPNS</p>
                    </a>
                </li>  --}}
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('dpnaHomeKoordinator') }}" class="nav-link">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>DPNA</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pengaduanListKoordinator') }}" class="nav-link">
                    <i class="nav-icon fas fa-bullhorn"></i>
                    <p>Pengaduan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('listKeluarga') }}" class="nav-link">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>Keluarga</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bantuanKoordinator') }}" class="nav-link">
                    <i class="nav-icon fas fa-bold"></i>
                    <p>Bantuan</p>
                </a>
            </li>

         {{-- @include('layouts.test') --}}
          <li class="nav-item">
            <a href="#" class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt text-info"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
