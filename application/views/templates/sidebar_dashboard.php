
<style>
    .nav-header {
        font-weight: bold;
        font-size: 18px;
        color: #6c757d;
        margin: 10px 0px 5px 0px;
    }
    .nav_icon {

    }
</style>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets/')?>index3.html" class="brand-link">
      <img src="<?= base_url('assets/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cashflow</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>
          <li class="nav-item">
            <a href="<?= site_url('Dashboard')?>" class="nav-link <?= ($this->uri->uri_string() == 'Dashboard') ? 'active': "" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Reports</li>
          <li class="nav-item <?= ($this->uri->uri_string() == 'report') || ($this->uri->uri_string() == 'report-by-category') || ($this->uri->uri_string() == 'report-by-month') ? 'menu-open' : "";?>">
            <a href="#" class="nav-link <?= ($this->uri->uri_string() == 'report') || ($this->uri->uri_string() == 'report-by-category') || ($this->uri->uri_string() == 'report-by-month') ? 'active': ""; ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('report')?>" class="nav-link <?= ($this->uri->uri_string() == 'report') ? 'active': "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaction Report</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?= base_url('report-by-category')?>" class="nav-link <?= ($this->uri->uri_string() == 'report-by-category') ? 'active': "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report By Category</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?= base_url('report-by-month')?>" class="nav-link <?= ($this->uri->uri_string() == 'report-by-month') ? 'active': "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report By Month</p>
                </a>
              </li>
              <li class="nav-item disable">
                <a href="#" class="nav-link <?= ($this->uri->uri_string() == 'report-by-year') ? 'active': "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report By Year</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Categories</li>
          <li class="nav-item">
            <a href="<?= site_url('Categories')?>" class="nav-link <?= ($this->uri->uri_string() == 'Categories') ? 'active': "" ?>">
              <i class="nav-icon far fa-image"></i>
              <p>
                Manage Categories
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>