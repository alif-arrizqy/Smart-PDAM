<!-- --------------------- Admin ---------------------------------- -->
<?php if (session()->get('status') == 1) {
    $status = 'Admin';
} else if (session()->get('status') == 2) {
    $status = 'User';
}
?>

<?php if (session()->get('status') == 1) { ?>
    <div class="aside">
        <div class="aside-body" data-simplebar="data-simplebar">
            <div class="widget14">
                <div class="avatar">
                    <div class="avatar-display"><img src="<?= base_url('public/assets/images/' . session()->get('user_image')) ?> " alt="Avatar image"></div>
                </div>
                <h3 class="widget14-title"><?= session()->get('fullname') ?></h3>
                <span class="widget14-subtitle"><?= $status ?></span>
            </div>
            <div class="portlet portlet-bordered">
                <div class="portlet-header portlet-header-bordered">
                    <div class="portlet-icon"><i class="fa fa-tasks"></i></div>
                    <h3 class="portlet-title">Profile</h3>
                </div>
                <div class="portlet-body">
                    <div class="rich-list-bordered ">
                        <!-- <div class="timeline-item"> -->
                        <!-- <div class="timeline-pin"><i class="marker marker-circle text-primary"></i> -->
                        <!-- </div> -->
                        <!-- <div class="timeline-content"> -->
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-user-lock"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Username</h4>
                                <span class="rich-list-subtitle"><?= session()->get('username') ?></span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Nama Lengkap</h4>
                                <span class="rich-list-subtitle"><?= session()->get('fullname') ?></span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-envelope"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Email</h4>
                                <span class="rich-list-subtitle"><?= session()->get('email') ?></span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-phone"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Telepon</h4>
                                <span class="rich-list-subtitle"><?= session()->get('mobile') ?></span>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->

                    </div>
                </div>
            </div>
            <a href="<?= base_url('login/logout') ?>">
                <button class="btn btn-label-danger btn-lg btn-block">Log out</button>
            </a>
        </div>
    </div>
<?php } ?>
<!-- --------------------- End - Admin ---------------------------------- -->


<!-- --------------------- User ---------------------------------- -->
<?php if (session()->get('status') == 2) { ?>
    <div class="aside">
        <div class="aside-body" data-simplebar="data-simplebar">
            <div class="widget14">
                <div class="avatar">
                    <div class="avatar-display"><img src="<?= base_url('public/assets/images/' . session()->get('user_image')) ?> " alt="Avatar image"></div>
                </div>
                <h3 class="widget14-title"><?= session()->get('fullname') ?></h3>
                <span class="widget14-subtitle"><?= $status ?></span>
            </div>
            <div class="portlet portlet-bordered">
                <div class="portlet-header portlet-header-bordered">
                    <div class="portlet-icon"><i class="fa fa-tasks"></i></div>
                    <h3 class="portlet-title">Profile</h3>
                </div>
                <div class="portlet-body">
                    <div class="rich-list-bordered ">
                        <!-- <div class="timeline-item"> -->
                        <!-- <div class="timeline-pin"><i class="marker marker-circle text-primary"></i> -->
                        <!-- </div> -->
                        <!-- <div class="timeline-content"> -->
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-user-lock"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Username</h4>
                                <span class="rich-list-subtitle"><?= session()->get('username') ?></span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Nama Lengkap</h4>
                                <span class="rich-list-subtitle"><?= session()->get('fullname') ?></span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-envelope"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Email</h4>
                                <span class="rich-list-subtitle"><?= session()->get('email') ?></span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar-aside">
                                    <div class="avatar-aside-display"><i class="fa fa-phone"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Telepon</h4>
                                <span class="rich-list-subtitle"><?= session()->get('mobile') ?></span>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->

                    </div>
                </div>
            </div>
            <a href="<?= base_url('login/logout') ?>">
                <button class="btn btn-label-danger btn-lg btn-block">Log out</button>
            </a>
        </div>
    </div>
<?php } ?>