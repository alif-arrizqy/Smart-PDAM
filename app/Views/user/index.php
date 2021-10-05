<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
$dt = time();
$bln = Date('M', $dt);
if ($bln == 'Jul') {
    $bulan = 'Juli';
} else if ($bln == 'Aug') {
    $bulan = 'Agustus';
}
if ($bln == 'Sep') {
    $bulan = 'September';
}
if ($bln == 'Oct') {
    $bulan = 'Oktober';
}
if ($bln == 'Nov') {
    $bulan = 'November';
}
if ($bln == 'Dec') {
    $bulan = 'Desember';
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row portlet-row-fill-xl">
            <div class="col-xl-12">
                <div class="portlet">
                    <div class="portlet-header portlet-header-bordered">
                        <div class="portlet-icon"><i class="fa fa-user"></i></div>
                        <h3 class="portlet-title">Welcome Back <?= session()->get('fullname') ?></h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row portlet-row-fill-sm">
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
                                        <div class="rich-list-append">
                                            <?php
                                            $date = time();
                                            $bulan = date("M", $date);
                                            foreach ($get_idtoken->getResult() as $rs) {
                                                $id_token = $rs->id_token;
                                                $id_user = $rs->id_user;
                                                if ($id_token != NULL && $id_user != NULL) { ?>
                                                    <div class="rich-list-append">
                                                        <a href="<?= base_url('User/monitoring/' . $id_token . '/' . $id_user . '/' . $bulan) ?>">
                                                            <button class="btn btn-label-primary">Monitoring Air</button>
                                                        </a>
                                                    </div>
                                                <?php }
                                                if ($id_token == NULL && $id_user == NULL) { ?>
                                                    <div class="rich-list-append">
                                                        <button class="btn btn-label-dark">Monitoring Air</button>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
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
                                        <div class="avatar avatar-label-success avatar-circle widget8-avatar">
                                            <div class="avatar-display">
                                                <i class="fa fa-money-bill-wave"></i>
                                            </div>
                                        </div>
                                        <div class="rich-list-append">
                                            <div class="rich-list-append">
                                                <a href="<?= base_url('Token') ?>">
                                                    <button class="btn btn-label-success">Isi Ulang Token</button>
                                                </a>
                                            </div>
                                        </div>
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
                                        <div class="avatar avatar-label-danger avatar-circle widget8-avatar">
                                            <div class="avatar-display">
                                                <i class="fa fa-faucet"></i>
                                            </div>
                                        </div>
                                        <?php
                                        foreach ($get_idtoken->getResult() as $rs) {
                                            $id_token = $rs->id_token;
                                            $id_user = $rs->id_user;

                                            $db      = \Config\Database::connect();
                                            $query = $db->query("SELECT * FROM relay WHERE id_token = '$id_token' ");
                                            // $qrs = $query->getResultArray();

                                            foreach ($query->getResultArray() as $hs) {
                                                $relay_status = $hs['relay_status'];
                                                if ($relay_status == 0) {
                                                    $ry = 'Mati';
                                                } else {
                                                    $ry = 'Aktif';
                                                }
                                            }

                                            if ($id_token != NULL && $id_user != NULL && $relay_status == 1) {
                                                $relay = 0;
                                        ?>
                                                <h6 class="widget9-title">Relay Status: Aktif</h6>
                                                <div class="rich-list-append">
                                                    <a href="<?= base_url('User/tutup_keran/' . $id_token . '/' . $relay) ?>">
                                                        <button class="btn btn-label-danger">Tutup Keran</button>
                                                </div>

                                            <?php } else if ($id_token != NULL && $id_user != NULL && $relay_status == 0) {
                                                $relay = 1; ?>
                                                <h6 class="widget9-title">Relay Status: Mati</h6>
                                                <div class="rich-list-append">
                                                    <a href="<?= base_url('User/tutup_keran/' . $id_token . '/' . $relay) ?>">
                                                        <button class="btn btn-label-danger">Buka Keran</button>
                                                </div>
                                            <?php }
                                            // kondisi jika belum beli token
                                            if ($id_token == NULL && $id_user == NULL) { ?>
                                                <div class="rich-list-append">
                                                    <a href="<?= base_url('User/tutup_keran/' . $id_token . '/' . $relay) ?>">
                                                        <button class="btn btn-label-dark" disabled>Tutup Keran</button>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
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
                                                <i class="fa fa-file-alt"></i>
                                            </div>
                                        </div>
                                        <div class="rich-list-append">
                                            <?php
                                            foreach ($get_idtoken->getResult() as $rs) {
                                                $id_token = $rs->id_token;
                                                $id_user = $rs->id_user;
                                                if ($id_token != NULL) {
                                            ?>
                                                    <div class="rich-list-append">
                                                        <a href="<?= base_url('Laporan/' . $id_user . '/' . $bulan) ?>">
                                                            <button class="btn btn-label-primary">Laporan Air Bulan <?= $bulan ?></button>
                                                        </a>
                                                    </div>
                                                <?php }
                                                if ($id_token == NULL) { ?>
                                                    <div class="rich-list-append">
                                                        <button class="btn btn-label-dark">Laporan Air Bulan <?= $bulan ?></button>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>