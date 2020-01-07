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
                             <div class="card">
                                 <div class="card-header">
                                     <!-- <h4>Full Width</h4> -->
                                 </div>
                                 <div class="card-body p-0">
                                     <div class="col-lg-12">
                                         <?=$this->session->flashdata('pesan')?>
                                         <div class="table-responsive">
                                             <table class="table table-striped table-md">
                                                 <tr>
                                                     <th>No</th>
                                                     <th>Kode</th>
                                                     <th>Nama</th>
                                                     <th>Deskripsi</th>
                                                     <th>Action</th>
                                                 </tr>
                                                 <?php
                                                    $no = 1;
                                                    foreach ($gejala as $row) { ?>
                                                     <tr>
                                                         <td><?= $no ?></td>
                                                         <td><?= $row['id_gejala'] ?></td>
                                                         <td><?= $row['nama_gejala'] ?></td>
                                                         <td><?= $row['deskripsi_gejala'] ?></td>
                                                         <td>
                                                             <a 
                                                             id="ubahGejala" 
                                                             href="#" 
                                                             data-nama="<?= $row['nama_gejala']; ?>" 
                                                             data-deskripsi="<?= $row['deskripsi_gejala']; ?>" 
                                                             data-id="<?= $row['id_gejala']; ?>"
                                                             class="btn btn-success" 
                                                             data-toggle="modal"  
                                                             data-target="#modalUbah">Ubah</a> 
                                                             <a 
                                                             href="#" 
                                                             id="hapusGejala"
                                                             data-id="<?= $row['id_gejala']; ?>"
                                                             data-nama="<?= $row['nama_gejala']; ?>" 
                                                             class="btn btn-danger"
                                                             data-toggle="modal"  
                                                             data-target="#modalHapus">Hapus</a>
                                                         </td>
                                                     </tr>
                                                 <?php
                                                        $no++;
                                                    } ?>
                                             </table>
                                         </div>
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
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Gejala</label>
                                             <div class="col-sm-12 col-md-7">
                                                    <input name="id" type="hidden">
                                                 <input type="text" name="kodegejala" class="form-control" required disabled>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Gejala</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="text" name="namagejala" class="form-control" required>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <textarea id="textareagejala" class="form-control"  name="deskripsigejala" required></textarea>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <div class="custom-file">
                                                     <input type="file" class="form-control" name="fotogejala">
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
      <form id="formHapus" action="#" method="post">
     
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </form>
      </div>
    </div>
  </div>
</div>
