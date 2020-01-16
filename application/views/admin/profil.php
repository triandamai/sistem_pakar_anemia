
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="section-header">
          <h1><?= $nama_section; ?></h1>
        </div>
        <div class="section-body">
          <h2 class="section-title"><?= $title_section; ?></h2>
          <p class="section-lead"><?= $subtitle_section; ?></p>
          <div class="row mt-sm-4">
          <div class="col-12 col-md-1 col-lg-2">
               
               </div>
              <div class="col-12 col-md-10 col-lg-8">
                <div class="card profile-widget">
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?= $profil->username;?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Admin</div></div>
                    Email : <b><?= $profil->email;?></b>.
                  </div>
                  <div class="card-footer text-center">
                    <a href="<?= base_url()?>index.php/admin_view/admin_ubah_password" type="button" class="font-weight-bold mb-2">Ubah Profil</a>
                    
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-1 col-lg-2">
               
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</div>