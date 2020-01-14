
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
           <h1>Detail Artikel</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url();?>">Dashboard</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

          <div class="section-body">
            
           
            <div class="card">

              <div class="card-header">
                <h4><?= $artikel->judul_artikel;?></h4>
              </div>
              <div class="card-body">
              <div class="chocolat-parent">
                      <a href="<?= base_url()?>upload/<?= $artikel->thumbnail?>" class="chocolat-image" title="Just an example">
                        <div data-crop-image="285">
                          <img alt="image" src="<?= base_url()?>upload/<?= $artikel->thumbnail?>" class="img-fluid">
                        </div>
                      </a>
                    </div>
                <p><?= $artikel->isi_artikel;?></p>
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>