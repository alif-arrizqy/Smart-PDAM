<!-- --------------------- Admin ---------------------------------- -->
<?php if (session()->get('status') == 1) {
    $status = 'Admin';
} else if (session()->get('status') == 2) {
    $status = 'User';
}
?>

<?php if (session()->get('status') == 1) { ?>
    <div class="header">
        <div class="header-holder header-holder-desktop">
            <div class="header-container container-fluid">
                <div class="header-wrap">
                    <h4 class="header-brand">Smart PDAM</h4>
                </div><i class="header-divider"></i>
                <div class="header-wrap header-wrap-block justify-content-start">
                    <ul class="nav nav-pills" data-toggle="header-nav">
                        <li class="nav-item" data-toggle="header-tab"><a href="<?= base_url('Home') ?>" class="nav-link">Dashboard</a></li>
                        <li class="nav-item" data-toggle="header-tab"><a href="<?= base_url('Manage-user') ?>" class="nav-link">Manage User</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="header-holder header-holder-mobile">
            <div class="header-container container-fluid">
                <div class="header-wrap header-wrap-block justify-content-start">
                    <h4 class="header-brand">Smart PDAM</h4>
                </div>
                <div class="header-wrap">
                    <button class="btn btn-label-primary btn-icon ml-2" data-toggle="sidemenu" data-target="#sidemenu-navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- --------------------- End - Admin ---------------------------------- -->


<!-- --------------------- User ---------------------------------- -->
<?php if (session()->get('status') == 2) { ?>
    <div class="header">
        <div class="header-holder header-holder-desktop">
            <div class="header-container container-fluid">
                <div class="header-wrap">
                    <h4 class="header-brand">Smart PDAM</h4>
                </div><i class="header-divider"></i>
                <div class="header-wrap header-wrap-block justify-content-start">
                    <ul class="nav nav-pills" data-toggle="header-nav">
                        <li class="nav-item" data-toggle="header-tab"><a href="<?= base_url('User') ?>" class="nav-link">Dashboard</a></li>
                        <li class="nav-item" data-toggle="header-tab"><a href="<?= base_url('Token') ?>" class="nav-link">Isi Ulang Token</a></li>
                        <li class="nav-item" data-toggle="header-tab"><a href="<?= base_url('Laporan') ?>" class="nav-link">Laporan PAM</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="header-holder header-holder-mobile">
            <div class="header-container container-fluid">
                <div class="header-wrap header-wrap-block justify-content-start">
                    <h4 class="header-brand">Smart PDAM</h4>
                </div>
                <div class="header-wrap">
                    <button class="btn btn-label-primary btn-icon ml-2" data-toggle="sidemenu" data-target="#sidemenu-navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>