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
                    <div class="card">
                        <div class="card-header">
                            <h4>Silahkan jawab pertanyaan berikut</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($gejala != null) {
                            ?>
                                <div class="col-lg-12">
                                    <p>
                                        <h1 style="text-align: center;margin-bottom:100px">Apakah anda mengalami gejala <?= $gejala->nama_gejala ?> ?</h1>
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <form action="<?= base_url() ?>index.php/user_event/user_diagnosa" method="POST">
                                        <div class="row">
                                            <!-- <div class="col-lg-2" style="margin-left:-220px !important;"></div> -->
                                            <div class="col-lg-6">
                                                <!-- <div class="login-horizontal cancel-wp pull-left"> -->
                                                <center>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="jawab" class="custom-control-input" value="1" required>
                                                        <label class="custom-control-label" for="customRadioInline1">Ya</label>
                                                    </div>
                                                </center>
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- <input type="hidden" name="jawab" value="tidak"> -->
                                                <center>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="jawab" class="custom-control-input" value="0" required>
                                                        <label class="custom-control-label" for="customRadioInline2">Tidak</label>
                                                    </div>
                                                </center>
                                            </div>
                                            <input type="hidden" name="gejala" value="<?= $gejala->id_gejala ?>">
                                            <div class="col-lg-12" style="margin-top:50px">
                                                <center>
                                                    <input type="submit" name="kirim" value="Lanjutkan >>>" class="btn btn-lg btn-primary">
                                                </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-12">
                                    <p>
                                        <h1 style="text-align: center;margin-bottom:100px">Gejala tidak ditemukan!</h1>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <!-- This is card footer -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>