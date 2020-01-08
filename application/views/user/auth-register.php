<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
   

          <div class="card card-primary">
          <div class="login-brand">
            <img src="<?= base_url() ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>
            <div class="card-header">
              <h4>Register</h4>
            </div>

            <div class="card-body">
              <?= $this->session->flashdata('pesan') ?>
              <form method="POST" action="<?=base_url()?>index.php/user_event/user_register">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control" name="username" required>
                  <div class="invalid-feedback">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" required>
                  <div class="invalid-feedback">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password2" type="password" class="form-control" name="password-confirm" required>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                  </div>
                </div> -->

                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" name="simpan" value="Simpan">
                </div>
              </form>
            </div>
          </div>
          <div class="mt-5 text-muted text-center">
              Sudah punya akun? <a href="<?= base_url()?>index.php/user_view/user_login">Masuk Ke Akun Anda</a>
            </div>
          <div class="simple-footer">
            Copyright &copy; Stisla 2018
          </div>
        </div>
      </div>
    </div>
  </section>
</div>