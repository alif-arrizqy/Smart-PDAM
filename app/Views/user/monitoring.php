<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
// cek relay aktif atau tidak
foreach ($cek_relay->getResult() as $rs) {
    $relay_status = $rs->relay_status;
}

// pembelian token
foreach ($get_harga->getResult() as $rs) {
    $harga = $rs->harga;
}

// jumlah air yang dibeli
foreach ($get_harga->getResult() as $rs) {
    $jml_air_beli = $rs->jumlah_air;
    $id_token = $rs->id_token;
    $id_user = $rs->id_user;
}

// pemakaian air saat ini
foreach ($get_jumlah_wf->getResult() as $rs) {
    $jml_air_skrg = $rs->total_wf;
}

// sisa air saat ini
$sisa_air = $jml_air_beli - $jml_air_skrg;
// rekap data wf
foreach ($get_jumlah_bulan->getResult() as $rs) {
    $jml_air = $rs->total_wf_bulan;
    // echo $jml_air;
}
$dt['waterflow'] = $jml_air;
$date = time();
$mo = date("M", $date);
$dbs = \Config\Database::connect();
$st = $dbs->table('rekap_data')->where('id_token', $id_token, 'id_user', $id_user, 'bulan', $mo)->update($dt);
// batas 10%
$batas = (10 / 100) * $jml_air_beli;
if ($sisa_air <= $batas) {
    // tampilkan 0 di website
    $relay_status = 0;
    $ry['relay_status'] = 0;
    // lalu meng-update relay_status pada tabel relay menjadi 0 
    $dbs = \Config\Database::connect();
    $st = $dbs->table('relay')->where('id_token', $id_token)->update($ry);
    // redirect ke halaman relay_aktif
    // dan juga mengirimkan hasilnya ke nodemcu
    $url = base_url('/User/relay_aktif/' . $id_token . '/' . $id_user . '/' . $relay_status);
    header("refresh:1; url=$url");
}
?>
<div class="content">
    <div class="container-fluid">
        <?php if ($relay_status == 0) { ?>
            <!-- modal -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="row portlet-row-fill-sm">
                        <div class="col-sm-6">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-success avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md ">Rp. <?= number_format($harga) ?></h2>
                                            <h6 class="widget9-title">Pembelian Token</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-primary avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-hand-holding-water"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md text-primary">
                                                <?= number_format($jml_air_beli); ?> ml</h2>
                                            <h6 class="widget9-title">Jumlah Air yang Di Beli</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="portlet-danger">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-primary avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-water"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md text-primary">
                                                <?php echo 0 ?> ml</h4>
                                                <h6 class="widget9-title">Pemakaian Air Saat Ini</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="portlet-danger">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-primary avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-faucet"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md text-primary">
                                                <?php echo 0 ?>
                                                ml</h4>
                                                <h6 class="widget9-title">Sisa Air Saat Ini</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($relay_status == 1) { ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row portlet-row-fill-sm">
                        <div class="col-sm-6">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-success avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md ">Rp. <?= number_format($harga) ?></h2>
                                            <h6 class="widget9-title">Pembelian Token</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-primary avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-hand-holding-water"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md text-primary">
                                                <?= number_format($jml_air_beli); ?> ml</h2>
                                            <h6 class="widget9-title">Jumlah Air yang Di Beli</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-primary avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-water"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md text-primary">
                                                <?php if ($sisa_air <= $batas) {
                                                    echo 0;
                                                } else {
                                                    echo number_format($jml_air_skrg);
                                                }
                                                ?> ml</h4>
                                                <h6 class="widget9-title">Pemakaian Air Saat Ini</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="widget8">
                                        <div class="widget8-content">
                                            <div class="avatar avatar-label-primary avatar-circle widget8-avatar">
                                                <div class="avatar-display">
                                                    <i class="fa fa-faucet"></i>
                                                </div>
                                            </div>
                                            <h2 class="widget9-highlight widget8-highlight-md text-primary">
                                                <?php if ($sisa_air <= $batas) {
                                                    echo 0;
                                                } else {
                                                    echo number_format($sisa_air);
                                                }
                                                ?>
                                                ml</h4>
                                                <h6 class="widget9-title">Sisa Air Saat Ini</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection(); ?>