<!-- <meta http-equiv="refresh" content="300; url=" <?php echo $_SERVER['PHP_SELF']; ?>"> -->
<?php
foreach ($relay_aktif->getResult() as $rs) {
    $id_user = $rs->id_user;
    $id_token = $rs->id_token;
    $relay_status = $rs->relay_status;
}
echo "ID Token :", $id_token," ", "ID User :", $id_user," ", "Relay :", $relay_status;
?>
