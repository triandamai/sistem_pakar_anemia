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
                                     <div class="table-responsive">
                                         <table class="table table-striped table-md">
                                             <tr>
                                                 <th>No</th>
                                                 <th>Nama</th>
                                                 <th>Deskripsi</th>
                                                 <th>Aksi</th>
                                             </tr>
                                             <?php 
                                             $no = 1;
                                             foreach($penyakit as $row){ ?>
                                             <tr>
                                                 <td><?=$no?></td>
                                                 <td><?=$row['nama_penyakit']?></td>
                                                 <td><?=$row['deskripsi_penyakit']?></td>
                                                 <td><a href="#" class="btn btn-secondary">Detail</a></td>
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