<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
// cek relay aktif atau tidak
foreach ($user_data->getResult() as $rs) {
    $fullname = $rs->fullname;
    $chatId = $rs->chatId;
}

// cek relay aktif atau tidak
foreach ($cek_relay->getResult() as $rs) {
    $relay_status = $rs->relay_status;
}

// pembelian token
foreach ($get_harga->getResult() as $rs) {
    $harga = $rs->hrg;
    $jml_air_beli = $rs->jml_air;
    $id_token = $rs->id_token;
    $id_user = $rs->id_user;
}

// jumlah air yang dibeli
// foreach ($get_harga->getResult() as $rs) {
    
// }

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
// if ($sisa_air <= $batas) {
//     // tampilkan 0 di website
//     $relay_status = 0;
//     $ry['relay_status'] = 0;
//     // lalu meng-update relay_status pada tabel relay menjadi 0 
//     $dbs = \Config\Database::connect();
//     $st = $dbs->table('relay')->where('id_token', $id_token)->update($ry);
//     // redirect ke halaman relay_aktif
//     // dan juga mengirimkan hasilnya ke nodemcu
//     $url = base_url('/User/relay_aktif/' . $id_token . '/' . $id_user . '/' . $relay_status);
//     header("refresh:1; url=$url");
// }
?>
<div class="content">
    <div class="container-fluid">
        <?php if ($relay_status == 0) { ?>
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
                                                <?= number_format($jml_air_beli); ?> L</h2>
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
                                                <?php echo 0 ?> L</h4>
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
                                                L</h4>
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
                                                <?= number_format($jml_air_beli); ?> L</h2>
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
                                                ?> L</h4>
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
                                                    // tampilkan nilai 0
                                                    echo 0;
                                                    if ($sisa_air > 0) {
                                                        echo number_format($sisa_air);
                                                        // notifikasi ke telegram
                                                        // atur waktu
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        $jam = date('H:i');
                                                        if ($jam > '06:00' && $jam < '10:00') {
                                                            $salam = "Selamat pagi,";
                                                        } else if ($jam > '10:01' && $jam < '15:00') {
                                                            $salam = "Selamat Siang,";
                                                        } else if ($jam > '15:01' && $jam < '18:00') {
                                                            $salam = 'Selamat sore,';
                                                        } else {
                                                            $salam = 'Selamat Malam,';
                                                        }

                                                        $date = date('d F Y') . '%0A';
                                                        $token = '1944487689:AAFf38O9HMymcmTNbxEfCAPpIU2O2wX7XyE';
                                                        $message = $date . $salam . ' Kepada Bapak/Ibu ' . $fullname . ' sisa air saat ini adalah ' . $sisa_air . ' L.' .
                                                            '%0AJangan lupa untuk segera membeli Token PDAM.';
                                                        $api = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chatId . '&text=' . $message . '';
                                                        $ch = curl_init($api);
                                                        curl_setopt($ch, CURLOPT_HEADER, false);
                                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                        curl_setopt($ch, CURLOPT_POST, 1);
                                                        // curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
                                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                        $result = curl_exec($ch);
                                                        curl_close($ch);
                                                        // var_dump($api);

                                                        // auto refresh web setiap 1 menit
                                                        $url = $_SERVER['REQUEST_URI'];
                                                        header("Refresh: 300; URL=$url");
                                                        redirect()->to('/');
                                                    } else if ($sisa_air < 0) {
                                                        echo number_format($sisa_air);
                                                        // notifikasi ke telegram
                                                        // atur waktu
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        $jam = date('H:i');
                                                        if ($jam > '06:00' && $jam < '10:00') {
                                                            $salam = "Selamat pagi,";
                                                        } else if ($jam > '10:01' && $jam < '15:00') {
                                                            $salam = "Selamat Siang,";
                                                        } else if ($jam > '15:01' && $jam < '18:00') {
                                                            $salam = 'Selamat sore,';
                                                        } else {
                                                            $salam = 'Selamat Malam,';
                                                        }

                                                        $date = date('d F Y') . '%0A';
                                                        $token = '1944487689:AAFf38O9HMymcmTNbxEfCAPpIU2O2wX7XyE';
                                                        $message = $date . $salam . ' Mohon Kepada Bapak/Ibu ' . $fullname . ', sekarang air dari PDAM sudah habis. ' .
                                                            '%0ADi mohon untuk segera mengisi Token PDAM.';
                                                        $api = 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chatId . '&text=' . $message . '';
                                                        $ch = curl_init($api);
                                                        curl_setopt($ch, CURLOPT_HEADER, false);
                                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                        curl_setopt($ch, CURLOPT_POST, 1);
                                                        // curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
                                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                        $result = curl_exec($ch);
                                                        curl_close($ch);
                                                        // var_dump($api);

                                                        // auto refresh web setiap 1 menit
                                                        $url = $_SERVER['REQUEST_URI'];
                                                        header("Refresh: 300; URL=$url");
                                                        redirect()->to('/');
                                                    }
                                                } else {
                                                    echo number_format($sisa_air);
                                                }
                                                ?>
                                                L</h4>
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