<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <!-- <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div> -->

            <div class="card card-primary">
              <div class="card-header"><h4>Ubah Password</h4></div>

              <div class="card-body">
              <?=$this->session->flashdata('reset-error')?>
                <!-- <p class="text-muted">We will send a link to reset your password</p> -->
                <form action="<?= base_url()?>index.php/admin_event/admin_ubah_password" method="POST">
                  <!-- <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="password">Password Lama</label>
                    <input id="password" name="password_lama" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div> -->
                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" name="password_baru" type="password" class="form-control pwstrength" data-indicator="pwindicator" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Konfirmasi Password</label>
                    <input id="password-confirm" name="konfirmasi_pass" type="password" class="form-control"  tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Simpan Perubahan
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Batal? <a href="<?= base_url()?>index.php/user_view/">Kembali Ke Beranda</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>