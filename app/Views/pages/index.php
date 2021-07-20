<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row portlet-row-fill-xl">
            <div class="col-xl-12">
                <div class="portlet">
                    <div class="portlet-header portlet-header-bordered">
                        <div class="portlet-icon"><i class="fa fa-user"></i></div>
                        <h3 class="portlet-title">Welcome Back to Administrator Pages</h3>
                    </div>
                    <div class="portlet-body">
                        <div class="rich-list rich-list-flush">
                            <div class="rich-list-item flex-column align-items-stretch">
                                <?php
                                foreach ($data_admin->getResult() as $rs) {
                                    $username = $rs->username;
                                    $fullname = $rs->fullname;
                                    $image = $rs->user_image;
                                    if ($rs->status == 1) {
                                        $status = 'Admin';
                                    } else if ($rs->status == 2) {
                                        $status = 'User';
                                    }
                                }
                                ?>
                                <div class="rich-list-item p-0">
                                    <div class="rich-list-prepend">
                                        <div class="avatar">
                                            <div class="avatar-display"><img src="<?= base_url('public/assets/images/' . $image) ?> " alt="Avatar image"></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h3><?= $fullname ?></h3><span><?= $status ?></span>
                                    </div>
                                    <div class="rich-list-append">
                                        <button class="btn btn-label-primary">Profile</button>
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