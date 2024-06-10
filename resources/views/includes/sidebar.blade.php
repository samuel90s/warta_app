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
    <!-- Nav Item - Tables -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('perumahan.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Perumahan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('perumahan.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>RT/RW</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Petugas Keamanan</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>


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
