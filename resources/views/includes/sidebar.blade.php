<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #b21e1e;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo_toa.png') }}" class="img-fluid" alt="Logo">
        </div>
        <div class="sidebar-brand-text mx-3">
            <span style="color: rgb(194, 194, 194);">Lapor</span><span style="color: red;">mas</span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Admin Sidebar -->
    @if ($userRole == 1)
        <div class="sidebar-heading">
            Admin
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('perumahan.index') }}">
                <i class="fas fa-fw fa-house-user"></i>
                <span>Perumahan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('perumahan.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Ketua RW</span></a>
        </li>
    @endif

    <!-- Ketua RW Sidebar -->
    @if ($userRole == 2)
        <div class="sidebar-heading">
            Ketua RW
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.index') }}">
                <i class="fas fa-fw fa-address-card"></i>
                <span>Petugas Keamanan</span>
            </a>
        </li>
    @endif

    <!-- Petugas Keamanan Sidebar -->
    @if ($userRole == 3)
        <div class="sidebar-heading">
            Petugas Keamanan
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.index') }}">
                <i class="fas fa-fw fa-flag"></i>
                <span>Laporan Warga</span>
            </a>
        </li>
    @endif

    <!-- Warga Sidebar -->
    @if ($userRole == 4)
        <div class="sidebar-heading">
            Warga
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.index') }}">
                <i class="fas fa-fw fa-flag"></i>
                <span>Laporankan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>History</span>
            </a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
