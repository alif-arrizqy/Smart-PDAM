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
                        <?php
                        foreach ($get_idtoken->getResult() as $rs) {
                            $id_token = $rs->id_token;
                            $id_user = $rs->id_user;
                            if ($id_token != NULL && $id_user != NULL) { ?>
                                <div class="rich-list-append">
                                    <a href="<?= base_url('User/monitoring/' . $id_token . '/' . $id_user) ?>">
                                        <button class="btn btn-label-primary">Monitoring Air</button>
                                    </a>
                                </div>
                            <?php }
                            if ($id_token == NULL && $id_user == NULL) { ?>
                                <div class="rich-list-append">
                                    <button class="btn btn-label-primary">Monitoring Air</button>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>