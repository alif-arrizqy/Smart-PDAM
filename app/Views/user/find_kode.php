<?php
foreach ($get_kode->getResult() as $rs) {
    $id_user = $rs->id_user;
    $id_token = $rs->id_token;
    $relay_db = $rs->relay_status;
    $relay_status = 1;
    $ry['relay_status'] = $relay_status;

    // jika kode ditemukan maka akan menampilkan ini
    echo "findkode = ID Token :", $id_token, " ", "ID User :", $id_user, " ", "Relay :", $relay_status;
    // lalu meng-update relay_status pada tabel relay menjadi 1 
    $dbs = \Config\Database::connect();
    $st = $dbs->table('relay')->where('id_token', $id_token)->update($ry);
    // redirect ke halaman relay_aktif
    // dan juga mengirimkan hasilnya ke nodemcu
    $url = base_url('/User/relay_aktif/' . $id_token . '/' . $id_user . '/' . $relay_status);
    header("refresh:5; url=$url");
}
?>