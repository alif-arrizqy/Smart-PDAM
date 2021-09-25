<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-header portlet-header-bordered">
                        <h3 class="portlet-title">Add User</h3>
                    </div>
                    <div class="portlet-body" style="margin-left: 30px">
                        <form action="<?= base_url('/Pages/save_user') ?>" method="post" id="validate-1" enctype="multipart/form-data">
                            <div class="form-group"><label for="exampleFormControlInput1">Username</label>
                                <input type="text" class="form-control col-sm-6 col-lg-8" name="username" id="exampleFormControlInput1" placeholder="your username">
                            </div>
                            <div class="form-group"><label for="exampleFormControlInput1">Password</label>
                                <input type="password" class="form-control col-sm-6 col-lg-8" name="password1" id="exampleFormControlInput1" placeholder="your password">
                            </div>
                            <div class="form-group"><label for="exampleFormControlInput1">Nama Lengkap</label>
                                <input type="text" class="form-control col-sm-6 col-lg-8" name="nama_lengkap" id="exampleFormControlInput1" placeholder="your fullname">
                            </div>
                            <div class="form-group"><label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea class="form-control col-sm-6 col-lg-8" name="alamat" id="exampleFormControlTextarea1" placeholder="No. Rumah, Blok Rumah, RT/RW, Kelurahan, Kecamatan, Kabupaten/Kota"></textarea>
                            </div>
                            <div class="form-group"><label for="exampleFormControlInput1">ChatId Telegram</label>
                                <input type="number" class="form-control col-sm-6 col-lg-8" name="chatid_tele" id="exampleFormControlInput1" placeholder="chatdID telegram">
                            </div>
                            <div class="form-group"><label for="exampleFormControlInput1">Email</label>
                                <input type="text" class="form-control col-sm-6 col-lg-8" name="email" id="inputmask-7" placeholder="name@example.com">
                            </div>
                            <div class="form-group"><label for="exampleFormControlInput1">Nomor Telepon</label>
                                <input type="text" class="form-control col-sm-6 col-lg-8" name="no_telp" id="input-phone-number" placeholder="(+62)999-9999-9999">
                            </div>
                            <div class="form-group"><label for="exampleFormControlFile1">Gambar User</label>
                                <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1" placeholder="Upload foto">
                            </div>
                            <div class="form-group"><label for="exampleFormControlInput1">Status</label>
                                <input type="number" class="form-control col-sm-6 col-lg-8" name="status" id="exampleFormControlInput1" placeholder="1: admin, 2: user">
                            </div>
                            <hr>
                            <div class="form-group text-center" style="margin-left: 230px;">
                                <button type="submit" class="btn btn-success btn-md">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>