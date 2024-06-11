<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo_toa.png') }}" class="img-fluid" alt="Logo">
        </div>
        <div class="sidebar-brand-text mx-3">
            <span style="color: rgb(194, 194, 194);">Lapor</span><span style="color: red;">mas</span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <!-- admin akses -->
    <li class="nav-item active">
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
    {{-- admin akses end --}}

    {{-- ketua RW akses --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas.index') }}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Petugas Keamanan</span>
        </a>
    </li>

    {{-- end ketua rt akses --}}


    {{-- petugas keamanan akses --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas.index') }}">
            <i class="fas fa-fw fa-flag"></i>
            <span>Laporan Warga</span>
        </a>
    </li>

    {{-- end petugas keamanan akses --}}
    {{-- start warga akses --}}

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
    {{-- end warga akses --}}


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add "active" class to the clicked sidebar item
        $('.nav-item').click(function() {
            $('.nav-item').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
