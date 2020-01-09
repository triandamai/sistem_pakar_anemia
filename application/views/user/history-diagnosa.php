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
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Hasil Diagnosa</h4>
                </div>
                <div class="card-body">
                  <div class="float-right">
                    <!-- <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form> -->
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>ID Konsultasi</th>
                        <th>Tanggal Konsultasi</th>
                        <th>Hasil Konsultasi</th>
                      </tr>
                      <?php
                      $no=1; 
                      foreach($riwayat as $row){ ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['id_konsultasi']?></td>
                        <td><?=$row['tanggal_konsultasi']?></td>
                        <td><a href="<?=base_url()?>index.php/user_view/hasil_diagnosa?id=<?=$row['id_konsultasi']?>" class="btn btn-md btn-info">Detail</a></td>
                      </tr>
                      <?php } ?>
                    </table>
                  </div>
                  <div class="float-right">
                    <nav>
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>