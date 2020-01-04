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
          <div class="row">
            <?php foreach ($penyakit as $row) { ?>
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="../assets/img/news/img13.jpg">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-title">
                      <h2><a href="#"><?=$row['nama_penyakit']?></a></h2>
                    </div>
                    <p><?=$row['deskripsi_penyakit']?> </p>
                    <div class="article-user">
                      <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png"> -->
                      <div class="article-user-details">
                        <!-- <div class="user-detail-name">
                          <a href="#">Hasan Basri</a>
                        </div> -->
                        <div class="text-job"><?=$row['solusi_penyakit']?></div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
