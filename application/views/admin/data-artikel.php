 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12">
                 <div class="section-header">
                     <h1><?= $nama_section; ?></h1>
                     <div class="section-header-breadcrumb">
                         <div class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin_view/">Home</a></div>
                         <div class="breadcrumb-item"><?= $nama_section; ?></div>
                     </div>
                 </div>
                 <div class="section-body">
                     <h2 class="section-title"><?= $title_section; ?></h2>
                     <p class="section-lead"><?= $subtitle_section; ?></p>
                     <div class="row">
                         <div class="col-12 col-md-12 col-lg-12">
                         <?= $this->session->flashdata('pesan') ?>
                             <div class="card">
                                 <div class="card-header">
                                     <!-- <h4>Full Width</h4> -->
                                 </div>
                                 <div class="card-body p-0">
                                     <div class="table-responsive">
                                         <table class="table table-striped table-md">
                                             <tr>
                                                 <th>No</th>
                                                 <th>Judul Artikel</th>
                                                 <!-- <th>Penulis</th> -->
                                                 <th>Tanggal dipublish</th>
                                                 <th>Action</th>
                                             </tr>
                                             <?php
                                                $no = 1;
                                                foreach ($artikel as $row) { ?>
                                                 <tr>
                                                     <td><?= $no ?></td>
                                                     <td><?= $row['judul_artikel'] ?></td>
                                                     <td><?= $row['created_at'] ?></td>
                                                     <td>
                                                        <a href="#" 
                                                        id="btnDetail"
                                                        data-id="<?= $row['id_artikel'] ?>" 
                                                        data-judul="<?= $row['judul_artikel'] ?>" 
                                                        data-isi="<?= htmlentities($row['isi_artikel']) ?>" 
                                                        data-thumbnail="<?= $row['thumbnail'] ?>"
                                                        data-created_at="<?= $row['created_at'] ?>"
                                                        data-updated-at="<?= $row['updated_at'] ?>" 
                                                        data-toggle="modal"  
                                                        data-target="#modalUbah"
                                                        class="btn btn-secondary">Detail</a>
                                                        <a href="#" 
                                                        id="btnHapus"
                                                        data-id="<?= $row['id_artikel'] ?>" 
                                                        data-judul="<?= $row['judul_artikel'] ?>" 
                                                        data-isi="<?= htmlentities($row['isi_artikel']) ?>" 
                                                        data-thumbnail="<?= $row['thumbnail'] ?>"
                                                        data-created_at="<?= $row['created_at'] ?>"
                                                        data-updated-at="<?= $row['updated_at'] ?>" 
                                                        data-toggle="modal"  
                                                        data-target="#modalHapus"
                                                        class="btn btn-danger">Hapus</a>
                                                     </td>
                                                     
                                                 </tr>
                                             <?php
                                                    $no++;
                                                } ?>
                                         </table>
                                     </div>
                                 </div>
                                 <div class="card-footer text-right">
                                     <nav class="d-inline-block">
                                         <ul class="pagination mb-0">
                                             <li class="page-item disabled">
                                                 <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                             </li>
                                             <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#">2</a>
                                             </li>
                                             <li class="page-item"><a class="page-link" href="#">3</a></li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                             </li>
                                         </ul>
                                     </nav>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
     </section>
 </div>


 <div class="modal fade" tabindex="-1" role="dialog" id="modalUbah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>index.php/admin_event/admin_ubah_gejala" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Id</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="text" name="id"  class="form-control" required disabled>
                                             </div>
                                             
                                         </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="text" name="judul"  class="form-control" required>
                                             </div>
                                             
                                         </div>
                                         <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <textarea id="konten" class="ckeditor" name="isi" required></textarea>
                                                 
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <div class="custom-file">
                                                     <input type="file" class="form-control" name="thumbnail">
                                                 </div>
                                             </div>
                                         </div>
                                     
                                         
                                     
        </div>                  
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="kirim" value="Simpan" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalHapus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modalTitle" class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
                                                    
        </div>
      <div class="modal-footer bg-whitesmoke br">
      <form id="formHapus" action="<?= base_url() ?>index.php/admin_event/admin_hapus_gejala" method="post">
        <input type="hidden" name="kodegejala"/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </form>
      </div>
    </div>
  </div>
</div>
