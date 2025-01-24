<style>
    .navbar.bg-success .navbar-brand,
    .navbar.bg-success .nav-link {
        color: white !important;
    }
    .separator {
      border-left: 1px solid #343a40; /* Garis pemisah */
      height: auto; /* Tinggi garis pemisah */
      margin: 0 10px; /* Margin di kiri dan kanan */
    }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-success" style="color: white !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/')?>dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">Hallo, <?= $this->session->userdata('name') ;?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="<?= base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    <p>
                        <?= $this->session->userdata('name') ;?>
                        <small>Member since <?= formatTanggal($this->session->userdata('created_at')) ;?></small>
                        <small>Status Member <?= formatTanggal($this->session->userdata('created_at')) ;?></small>

                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                    <a href="<?= base_url('Logout')?>" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->