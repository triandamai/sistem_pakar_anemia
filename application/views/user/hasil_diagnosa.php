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
                                        Username : <br>
                                        Email :<br>
                                        Tanggal Konsultasi : <br>

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
                                            <th data-width="40" style="width: 40px;">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Totals</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mouse Wireless</td>
                                            <td class="text-center">$10.99</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">$10.99</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Keyboard Wireless</td>
                                            <td class="text-center">$20.00</td>
                                            <td class="text-center">3</td>
                                            <td class="text-right">$60.00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Headphone Blitz TDR-3000</td>
                                            <td class="text-center">$600.00</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">$600.00</td>
                                        </tr>
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