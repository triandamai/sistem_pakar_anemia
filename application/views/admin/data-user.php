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
                                 <div class="card-body p-0">
                                     <div class="table-responsive">
                                         <table class="table table-striped table-md">
                                             <tr>
                                                 <th>No</th>
                                                 <th>Username</th>
                                                 <th>Email</th>
                                                 <th>Status</th>
                                                 <th>Aksi</th>
                                             </tr>
                                             <?php 
                                             $no = 1;
                                            //  echo json_encode($user);
                                             foreach($user as $row){ ?>
                                             
                                             <tr>
                                                 <td><?=$no?></td>
                                                 <td><?=$row['username']?></td>
                                                 <td><?=$row['email']?></td>
                                                 <td>
                                                     <div class="badge badge-success">Active</div>
                                                 </td>
                                                 <td><a href="#" 
                                                id="detailUser"
                                                data-id="<?=$row['id_user']?>"
                                                data-username="<?=$row['username']?>"
                                                data-email="<?=$row['email']?>"
                                                data-created="<?=$row['created_at']?>"
                                                data-updated="<?=$row['updated_at']?>"
                                                 class="btn btn-secondary" 
                                                 data-toggle="modal"  
                                                 data-target="#modalDetail">Detail</a></td>
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

 <div class="modal fade" tabindex="-1" role="dialog" id="modalDetail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <b>Username</b>
        <p id="username" class="mb-2"></p>  
        <b>Email</b>
        <p id="email" class="mb-2"></p>  
        <b>Mendaftar Pada</b>
        <p id="created_at" class="mb-2"></p>               
        <b>Terakhir Diubah</b>
        <p id="updated_at" class="mb-2"></p>  
        </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
