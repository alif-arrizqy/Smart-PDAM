<?php
foreach ($get_idtoken->getResult() as $rs) {
    $id_user = $rs->id_user;
    $id_token = $rs->id_token;

    if ($id_token != NULL && $id_user != NULL) {
        echo "direct_login = ID Token :", $id_token, " ", "ID User :", $id_user;
        // redirect ke halaman relay_aktif
        // dan juga mengirimkan hasilnya ke nodemcu
        $url = base_url('/User/monitoring/' . $id_token . '/' . $id_user);
        header("refresh:1; url=$url");
    }
}
// if ($id_token == NULL && $id_user == NULL) {
$url = base_url('/User');
header("refresh:1; url=$url");
// }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="<?= base_url('public/assets/build/styles/ltr-core.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/build/styles/ltr-vendor.css') ?>" rel="stylesheet">
    <link href="https://dashboard2.panely-html.blueupcode.com/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title>Dashboard | Panely</title>
</head>

<body class="theme-light preload-active aside-active sidebar-active">
    <div class="preload">
        <div class="preload-dialog">
            <div class="spinner-border text-primary preload-spinner"></div>
        </div>
    </div>
</body>

</html>