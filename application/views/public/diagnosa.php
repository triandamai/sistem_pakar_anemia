
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $nama_section;?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $nama_section;?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?= $title_section;?></h2>
            <p class="section-lead">
              <?= $subtitle_section;?>
            </p>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $nama_section; ?></h4>
                  </div>
                  <div class="card-body">
                    <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                      <i class="fas fa-list"></i> All Tickets
                    </a>
                    <div class="tickets">
                      <div class="ticket-items" id="ticket-items">
                        <div class="ticket-item">
                          <div class="ticket-title">
                            <h4>Isi Biodata</h4>
                          </div>
                          <div class="ticket-desc">
                            <div>Farhan A. Mujib</div>
                            <div class="bullet"></div>
                            <div>2 min ago</div>
                          </div>
                        </div>
                        <div class="ticket-item active">
                          <div class="ticket-title">
                            <h4>Cek Gejala</h4>
                          </div>
                          <div class="ticket-desc">
                            <div>Farhan A. Mujib</div>
                            <div class="bullet"></div>
                            <div>2 min ago</div>
                          </div>
                        </div>
                        <div class="ticket-item">
                          <div class="ticket-title">
                            <h4>Hasil Diagnosa</h4>
                          </div>
                          <div class="ticket-desc">
                            <div>Amanda Aprilia Azmi</div>
                            <div class="bullet"></div>
                            <div>Yesterday</div>
                          </div>
                        </div>
                        <div class="ticket-item">
                          <div class="ticket-title">
                            <h4>Apa Yang Harus Saya Lakukan ?</h4>
                          </div>
                          <div class="ticket-desc">
                            <div>Irwansyah Saputra</div>
                            <div class="bullet"></div>
                            <div>July 18, 2018</div>
                          </div>
                        </div>
                      </div>
                        <?php 
                        if($content == "Isi Biodata"){?>
                        
                        <?php 
                        }elseif($content == "Cek Gejala"){?>
                        <div class="ticket-content">
                        <div class="ticket-header">
                          <div class="ticket-sender-picture img-shadow">
                            <img src="<?= base_url()?>/assets/img/avatar/avatar-5.png" alt="image">
                          </div>
                          <div class="ticket-detail">
                            <div class="ticket-title">
                              <h4>Cek Gejala</h4>
                            </div>
                            <div class="ticket-info">
                              <div class="font-weight-600">Farhan A. Mujib</div>
                              <div class="bullet"></div>
                              <div class="text-primary font-weight-600">2 min ago</div>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-description">
                          <p>Ini Pertanyaan yang akan iajukan aplikasi.</p>
                          <p>Ini Pertanyaan yang akan diajukan oleh aplikasi.</p>
                          <div class="ticket-divider"></div>
                          <form>
                              <div class="form-group">
                               
                              </div>
                              <div class="form-group text-right">
                                <input class="btn btn-primary btn-lg" value="Ya">
                                <input class="btn btn-danger btn-lg" value="Tidak">
                              </div>
                            </form>
                          <div class="ticket-form">
                            
                          </div>
                        </div>
                        </div>
                        <?php
                        }elseif($content == "Hasil Diagnosa"){?>

                        <?php
                        }elseif($content == "Saran"){?>

                        <?php
                        }else{?>

                        <?php
                        }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>