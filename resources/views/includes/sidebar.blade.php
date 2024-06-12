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
    <!-- Nav Item - Dashboard -->
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- admin akses -->
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
    {{-- admin akses end --}}



    {{-- ketua RW akses --}}
    <div class="sidebar-heading">
        Ketua RW
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas.index') }}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Petugas Keamanan</span>
        </a>
    </li>
    {{-- end ketua rt akses --}}


    {{-- petugas keamanan akses --}}
    <div class="sidebar-heading">
        Petugas
    </div>
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
