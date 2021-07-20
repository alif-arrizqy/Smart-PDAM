<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row portlet-row-fill-xl">
            <div class="col-xl-12">
                <div class="portlet">
                    <div class="portlet-header portlet-header-bordered">
                        <div class="portlet-icon"><i class="fa fa-plus-circle"></i></div>
                        <h3 class="portlet-title">Pengisian Token PDAM</h3>
                    </div>
                    <?php
                    foreach ($data_user->getResult() as $rs) {
                        $id_user = $rs->id_user;
                    }

                    $characters = '0123456789';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    $randomStringTok = '';
                    for ($i = 0; $i < 8; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    for ($i = 0; $i < 3; $i++) {
                        $randomStringTok .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $tok = "TOK";
                    $id_token = $tok . $randomStringTok
                    // return $randomString;
                    ?>
                    <div class="portlet-body">
                        <form action="<?= base_url('/User/save_token/') ?>" method="post">
                            <div class="form-group">
                                <div class="float-label">
                                    <input type="number" id="harga" name="inputHarga" class="form-control" placeholder="Masukan harga beli">
                                    <input name="id_user" value="<?= $id_user ?>" class="form-control" hidden>
                                    <input name="id_token" value="<?= $id_token ?>" class="form-control" hidden>
                                    <label for="harga">Harga</label>
                                </div>

                            </div>
                            <div class="form-grup">
                                <div class="float-label">
                                    <input type="text" id="kode" name="kode" class="form-control" value="<?= $randomString ?>" readonly>
                                    <label for="harga">Kode Token</label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-sm" value="Submit"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>