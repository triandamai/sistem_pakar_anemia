
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         
          
          <div class="section-body">
          <br>
            <div class="container" style="height:450px;">
			        <div class="row align-items-center">
				        <div class="col-lg-7">
					        <h1>Sistem Pakar Diagnosa Penyakit Anemia</h1>
					        <p class="lead">Sistem Pakar Pendiagnosa Penyakit Anemia Pada Ibu Hamil Menggunakan Metode Forward Chaining(RSIA Bunda Arif Purwokerto)</p>
                    <div class="cta">
                      <a class="btn btn-lg btn-warning btn-icon icon-right" href="<?= base_url()?>index.php/User_view/user_diagnosa_baru" target="_blank">Diagnosa Sekarang <i class="fas fa-chevron-right"></i></a>
                    </div>
				        </div>
				        <div class="col-lg-5 pl-lg-5 d-lg-block d-none text-center">
					        <img src="https://getstisla.com/landing/undraw_hello_aeia.svg" alt="image" class="img-fluid img-flip" width="80%">
				        </div>
			        </div>
            </div>
            <h2 class="section-title">Artikel Terbaru</h2>
            <div class="row">
            <?php
                                                $no = 1;
                                                foreach ($artikel as $row) { ?>
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="<?= base_url()?>upload/<?=$row['thumbnail']?>">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-category">
                    <!-- <a href="#">News</a> -->
                     <div class="bullet"></div> 
                     <a href="#"><?= $row['updated_at'] ?></a></div>
                    <div class="article-title">
                      <h2><a href="<?= base_url()?>index.php/Public_view/detail_artikel?kode=<?= $row['id_artikel'] ?>"><?= $row['judul_artikel'] ?></a></h2>
                    </div>
                    <!-- <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. </p> -->
                    <!-- <div class="article-user">
                      <img alt="image" src="../assets/img/avatar/avatar-1.png">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <a href="#">Hasan Basri</a>
                        </div>
                        <div class="text-job">Web Developer</div>
                      </div>
                    </div> -->
                  </div>
                </article>
              </div>
              
                                                <?php }?>
            </div>
          </div>
        </section>
      </div>