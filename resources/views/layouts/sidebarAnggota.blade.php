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
           <a href="{{ route('mahasiswa.home') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('nilaiPeriodikIndexAnggota') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Nilai Periodik</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dpns11Anggota') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>DPNS</p>
                </a>
            </li>
             {{--  <li class="nav-item">
                <a href="{{ route('apiNilaiPeriodik') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Nilai Periodik Ajax</p>
                </a>
            </li>  --}}
            {{--  <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>DPNS
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dpns11') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DPNS 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dpns22') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DPNS 2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dpns33') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DPNS 3</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dpns2.home') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Options DPNS</p>
                    </a>
                </li>
                </ul>
            </li>  --}}
            <li class="nav-item">
                <a href="{{ route('dpnaAnggota') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>DPNA</p>
                </a>
            </li>
            <li class="nav-item">
                {{--  <a href="{{ route('daftarPengaduanMhs') }}" class="nav-link">  --}}
                <a href="{{ route('daftarPengaduanMhsAnggota') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Pengaduan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('keluargaAnggota') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Keluarga</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bantuanAnggota') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Bantuan</p>
                </a>
            </li>

         {{-- @include('layouts.test') --}}
          <li class="nav-item">
            <a href="#" class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              <i class="nav-icon far fa-circle text-info"></i>
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
