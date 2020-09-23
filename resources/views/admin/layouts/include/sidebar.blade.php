 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin-page">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-phone"></i>
      </div>
      <div class="sidebar-brand-text mx-3">E - Lapor</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
      Menu
     </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
      <a class="nav-link pb-0" href="/home">
        <i class="fas fa-fw fa-home"></i>
        <span>Home</span></a>
    </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
      <a class="nav-link" href="dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
     Laporan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->is('admin-page')) ? 'active' : '' }}">
      <a class="nav-link pb-0" href="admin-page">
        <i class="fas fa-fw fa-comments"></i>
        <span>Laporan</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ (request()->is('eksport')) ? 'active' : '' }}">
      <a class="nav-link" href="eksport">
        <i class="fas fa-fw fa-file-import"></i>
        <span>Ekspor Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengguna
       </div>

         <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->is('user')) ? 'active' : '' }}">
        <a class="nav-link" href="/user">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pengguna</span></a>
      </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->