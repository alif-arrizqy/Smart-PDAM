<!-- --------------------- Admin ---------------------------------- -->
<?php if (session()->get('status') == 1) {
    $status = 'Admin';
} else if (session()->get('status') == 2) {
    $status = 'User';
}
?>

<?php if (session()->get('status') == 1) { ?>
    <div class="sidemenu sidemenu-wide sidemenu-left" id="sidemenu-navigation">
        <div class="sidemenu-header">
            <h3 class="sidemenu-title">Smart PDAM</h3>
            <div class="sidemenu-addon"><button class="btn btn-label-danger btn-icon" data-dismiss="sidemenu"><i class="fa fa-times"></i></button></div>
        </div>
        <div class="sidemenu-body px-0" data-simplebar="data-simplebar">
            <div class="menu">
                <div class="menu-section">
                    <h2 class="menu-section-text">Dashboard</h2>
                </div>
                <div class="menu-item"><a href="<?= base_url('Home') ?>" class="menu-item-link">
                        <div class="menu-item-icon">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <span class="menu-item-text">Dashboard</span>
                    </a>
                </div>
                <div class="menu-section">
                    <h2 class="menu-section-text">Manage User</h2>
                </div>
                <div class="menu-item"><a href="<?= base_url('Manage-user') ?>" class="menu-item-link">
                        <div class="menu-item-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <span class="menu-item-text">Management User</span>
                    </a>
                </div>
                <div class="menu-item"><a href="<?= base_url('login/logout_administrator') ?>" class="menu-item-link">
                        <div class="menu-item-icon">
                            <i class="fa fa-sign-out-alt"></i>
                        </div>
                        <span class="menu-item-text">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- --------------------- User ---------------------------------- -->
<?php if (session()->get('status') == 2) { ?>
    <div class="sidemenu sidemenu-wide sidemenu-left" id="sidemenu-navigation">
        <div class="sidemenu-header">
            <h3 class="sidemenu-title">Smart PDAM</h3>
            <div class="sidemenu-addon"><button class="btn btn-label-danger btn-icon" data-dismiss="sidemenu"><i class="fa fa-times"></i></button></div>
        </div>
        <div class="sidemenu-body px-0" data-simplebar="data-simplebar">
            <div class="menu">
                <div class="menu-section">
                    <h2 class="menu-section-text">Dashboard</h2>
                </div>
                <div class="menu-item"><a href="<?= base_url('User') ?>" class="menu-item-link">
                        <div class="menu-item-icon">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <span class="menu-item-text">Dashboard</span>
                    </a>
                </div>
                <div class="menu-section">
                    <h2 class="menu-section-text">Token</h2>
                </div>
                <div class="menu-item"><a href="<?= base_url('Token') ?>" class="menu-item-link">
                        <div class="menu-item-icon">
                            <i class="fa fa-redo-alt"></i>
                        </div>
                        <span class="menu-item-text">Isi Ulang Token</span>
                    </a>
                </div>
                <div class="menu-item"><a href="<?= base_url('login/logout') ?>" class="menu-item-link">
                        <div class="menu-item-icon">
                            <i class="fa fa-sign-out-alt"></i>
                        </div>
                        <span class="menu-item-text">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>