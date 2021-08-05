<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row portlet-row-fill-xl">
            <div class="col-xl-12">
                <div class="portlet">
                    <div class="portlet-header portlet-header-bordered">
                        <div class="portlet-icon"><i class="fa fa-users"></i></div>
                        <h3 class="portlet-title">Table Laporan Pemakaian Air</h3>
                    </div>
                    <div class="portlet-body">
                        <table id="datatable-1" class="table table-bordered table-striped table-hover nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>ID Token</th>
                                    <th>Harga</th>
                                    <th>Jumlah Air PAM</th>
                                    <th>Air Saat Ini</th>
                                    <th>Status Token</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($token_bulanan as $rs) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rs['tanggal'] ?></td>
                                        <td><?= $rs['id_token'] ?></td>
                                        <td><?= $rs['harga'] ?></td>
                                        <td><?= $rs['jumlah_air'] ?></td>
                                        <td><?= $rs['waterflow'] ?></td>
                                        <td>
                                            <center>
                                                <?php
                                                if ($rs['waterflow'] == $rs['jumlah_air']) { ?>
                                                    <button class="btn btn-label-danger" disabled>Habis</button>
                                                <?php } else if ($rs['jumlah_air'] < $rs['waterflow']) { ?>
                                                    <button class="btn btn-label-danger" disabled>Habis</button>
                                                <?php } else if ($rs['jumlah_air'] > $rs['waterflow']) { ?>
                                                    <button class="btn btn-label-primary" disabled>Digunakan</button>
                                                <?php } ?>
                                            </center>
                                        </td>
                                    <?php } ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>