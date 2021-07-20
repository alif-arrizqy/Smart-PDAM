<?php
foreach ($get_kode->getResult() as $rs) {
    $id_user = $rs->id_user;
    $id_token = $rs->id_token;
    $relay_db = $rs->relay_status;
    $relay_status = 1;
    $ry['relay_status'] = $relay_status;

    echo "findkode = ID Token :", $id_token, " ", "ID User :", $id_user, " ", "Relay :", $relay_status;
    $dbs = \Config\Database::connect();
    $st = $dbs->table('relay')->where('id_token', $id_token)->update($ry);
    $url = base_url('/User/relay_aktif/' . $id_token . '/' . $id_user . '/' . $relay_status);
    header("refresh:5; url=$url");
}
?>

<!-- <input name="id_user" value="<?= $id_user ?>" class="form-control" hidden>
<input name="id_token" value="<?= $id_token ?>" class="form-control" hidden>
<input name="relay_status" value="<?= $relay_status ?>" class="form-control" hidden> -->