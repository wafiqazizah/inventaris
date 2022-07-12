<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">INVENTARIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="http://localhost/inventaris/homepage">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Supplier  -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/inventaris/Supplier/">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Supplier</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Barang</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Barang:</h6>
                <a class="collapse-item" href="http://localhost/inventaris/Barang/">Data Barang</a>
                <a class="collapse-item" href="http://localhost/inventaris/Satuan/">Satuan Barang</a>
                <a class="collapse-item" href="http://localhost/inventaris/Jenis/">Jenis Barang</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

     <!-- Nav Item - Barang Masuk -->
     <li class="nav-item">
        <a class="nav-link" href="http://localhost/inventaris/barangmasuk">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Barang Masuk</span></a>
    </li>

     <!-- Nav Item - Barang Keluar -->
     <li class="nav-item">
        <a class="nav-link" href="http://localhost/inventaris/barangkeluar">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Barang Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Report
    </div>

     <!-- Nav Item - Cetak Laporan -->
     <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Cetak Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

     <!-- Nav Item - User -->
     <li class="nav-item">
        <a class="nav-link" href="http://localhost/inventaris/User">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User Management</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->