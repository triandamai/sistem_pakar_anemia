<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $nama_section ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><?= $nama_section ?></div>
            </div>
        </div>
        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2><?= $title_section ?></h2>
                                <!-- <div class="invoice-number">Order #12345</div> -->
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Data Konsultan: </strong><br><br>
                                        Username : <?=$this->session->userdata['user_data']['username']?><br>
                                        Email : <?=$this->session->userdata['user_data']['email']?><br>
                                        Waktu Konsultasi : <?=$this->session->userdata['diagnosa_data']['tgl']?><br>

                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Detail Konsultasi</div>
                            <p class="section-lead">Gejala yang anda derita.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody>
                                        <tr>
                                            <th data-width="40" style="width: 40px;">No</th>
                                            <th class="text-center">Kode Gejala</th>
                                            <th>Nama gejala</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        foreach ($gejala as $row) { ?>
                                            <tr>
                                                <td data-width="40" style="width: 40px;"><?= $no ?></td>
                                                <td class="text-center"><?= $row['id_gejala'] ?></td>
                                                <td><?= $row['nama_gejala'] ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <div class="section-title">Detail Penyakit</div>
                            <p class="section-lead">Anda didiagnosa menderita penyakit <b>(nama penyakit)</b> </p>
                            <div class="section-title">Solusi</div>
                            <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <!-- <div class="float-lg-left mb-lg-0 mb-3">
                        <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                        <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                    </div> -->
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </section>
</div>