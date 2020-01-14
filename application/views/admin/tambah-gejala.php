 <!-- Main Content -->
 <div class="main-content">
                        <div class="breadcrumb-item active"><a href="<?= base_url()?>index.php/admin_view/">Home</a></div>
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
                                     <h4>Full Width</h4>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="card">
                                 <div class="card-header">
                                     <h4>Tambahkan Gejala</h4>
                                 </div>
                                 <div class="card-body">
                                     <form action="<?= base_url() ?>index.php/admin_event/admin_tambah_gejala" method="POST" enctype="multipart/form-data">
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Gejala</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="text" name="kodegejala" class="form-control" required>
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
                                                 <textarea class=" form-control" rows="3" name="deskripsigejala" required></textarea>
                                             </div>
                                         </div>
                                         <!-- <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <div class="custom-file">
                                                     <input type="file" class="form-control" name="fotogejala">
                                                 </div>
                                             </div>
                                         </div> -->
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="submit" name="kirim" class="btn btn-primary" value="Simpan">
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </section>
 </div>