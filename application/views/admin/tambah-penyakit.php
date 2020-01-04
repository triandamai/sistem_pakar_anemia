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
                                     <h4>Full Width</h4>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="card">
                                 <div class="card-header">
                                     <h4>Tambahkan Penyakit</h4>
                                 </div>
                                 <div class="card-body">
                                     <form action="<?= base_url() ?>index.php/admin_event/admin_tambah_penyakit" method="POST" enctype="multipart/form-data">
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Penyakit</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="text" name="kodepenyakit" class="form-control" required>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Penyakit</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="text" name="namapenyakit" class="form-control" required>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <textarea class=" form-control" rows="3" name="deskripsipenyakit"></textarea>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Solusi</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <textarea class=" form-control" rows="3" name="solusipenyakit" required></textarea>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                             <div class="col-sm-12 col-md-7">
                                                 <div class="custom-file">
                                                     <input type="file" name="fotopenyakit" class="form-control">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                             <div class="col-sm-12 col-md-7">
                                                 <input type="submit" name="kirim" value="Simpan" class="btn btn-primary">
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
