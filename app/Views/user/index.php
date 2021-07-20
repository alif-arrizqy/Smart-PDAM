<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row portlet-row-fill-xl">
            <div class="col-xl-12">
                <div class="portlet">
                    
                    <div class="portlet-header portlet-header-bordered">
                        <div class="portlet-icon"><i class="fa fa-user"></i></div>
                        <h3 class="portlet-title">Welcome Back <?= session()->get('fullname') ?></h3>
                    </div>
                    <div class="portlet-body">
                        <div class="card-body p-4 text-center">
                            <div class="my-auto">
                                <img class="card-img-center rounded-0" src="<?= base_url('public/assets/images/water-tank.png') ?>">
                            </div>
                            <div class="content my-3">
                                <h3 class="mb-0 font-w-800 tx-s-12">Kapasitas Tanki : 11 ml </h3>
                            </div>
                            <div class="card bg-primary my-6 text-left">
                                <div class="card-body">
                                    <div class="content my-3">
                                        <div class="card-liner-content text-center">
                                            <h2 class="card-liner-title text-white">STATUS : KOSONG </h2>
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