<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row portlet-row-fill-xl">
            <div class="col-xl-12">
                <div class="portlet">
                    <div class="portlet-header portlet-header-bordered">
                        <div class="portlet-icon"><i class="fa fa-users"></i></div>
                        <h3 class="portlet-title">Table User</h3>
                    </div>
                    <div class="portlet-body">
                        <table id="datatable-1" class="table table-bordered table-striped table-hover nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Data PAM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($listUser as $rs) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rs['fullname'] ?></td>
                                        <td><?= $rs['email'] ?></td>
                                        <td><?= $rs['mobile'] ?></td>
                                        <td>
                                            <center>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pamModal<?= $rs['id_user'] ?>">
                                                    <i class="fa fa-faucet"></i>
                                                </button>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewModal<?= $rs['id_user'] ?>">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal<?= $rs['id_user'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $rs['id_user'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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

<!-- View Modals -->

<div class="modal fade" id="viewModal<?= $rs['id_user'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Data</h5><button type="button" class="btn btn-label-danger btn-icon" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="Telepon">Telepon</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <textarea type="text" value="#" class="form-control" readonly></textarea>
                </div>
                <div class="form-group">
                    <label for="Desa">Desa</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="Kecamatan">Kecamatan</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="Kab/Kota">Kab/Kota</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="Provinsi">Provinsi</label>
                    <input type="text" value="#" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-primary mr-2">Submit</button> <button class="btn btn-outline-danger">Reset</button></div>
        </div>
    </div>
</div>



<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5><button type="button" class="btn btn-label-danger btn-icon" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-group"><label for="email1">Email form</label> <input type="email" class="form-control" id="email1"> <small class="form-text text-muted">Please submit your
                        email</small></div>
            </div>
            <div class="modal-footer"><button class="btn btn-primary mr-2">Submit</button> <button class="btn btn-outline-danger">Reset</button></div>
        </div>
    </div>
</div>
<div class="modal fade" id="hapusModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vertical centered</h5><button type="button" class="btn btn-label-danger btn-icon" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate fugit eveniet
                    sed, ipsum rem quasi quisquam recusandae nesciunt deleniti iste sit repellat rerum amet. Neque
                    debitis iste, quos repudiandae ut!</p>
            </div>
            <div class="modal-footer"><button class="btn btn-primary mr-2">Submit</button> <button class="btn btn-outline-danger">Cancel</button></div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>