<body>
<div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>    
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url()?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?=$this->session->userdata['user_data']['username']?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="<?= base_url()?>index.php/User_view/user_profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url()?>index.php/user_event/user_logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url()?>">Anemia</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url()?>">A</a>
          </div>
          <ul class="sidebar-menu">     
              <li>
                <a class="nav-link" href="<?= base_url()?>index.php/user_view/">
                  <i class="fas fa-fire"></i> 
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="menu-header">Penyakit</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Penyakit</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url()?>index.php/user_view/user_data_penyakit">Data Penyakit</a></li>
                  <li><a class="nav-link" href="<?= base_url()?>index.php/user_view/user_diagnosa_baru">Diagnosa Baru</a></li>
                  <li><a class="beep beep-sidebar" href="<?= base_url()?>index.php/user_view/user_history">History Diagnosa Saya</a></li>
                </ul>
              </li>
              <li class="menu-header">User</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url()?>index.php/user_view/user_profil">Profil</a></li>
                  <li><a href="<?= base_url()?>index.php/user_view/user_ubah_password">Ubah Password</a></li>
                </ul>
              </li>
             
             
         </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Tentang Aplikasi
              </a>
            </div>
        </aside>
      </div>

      <!-- Main Content -->