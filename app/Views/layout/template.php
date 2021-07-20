<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- css -->
    <?= $this->include('layout/css') ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://dashboard2.panely-html.blueupcode.com/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title>Dashboard | Panely</title>
</head>

<body class="theme-light preload-active aside-active sidebar-active">
    <div class="holder">
        <div class="sidebar">
            <div class="sidebar-header">
                <a href="index.html" class="btn btn-icon btn-warning btn-lg">
                    <i class="fa fa-desktop"></i>
                </a>
            </div>
        </div>
        <div class="wrapper">
            <!-- header -->
            <?= $this->include('layout/header') ?>
            <!-- content -->
            <?= $this->renderSection('content'); ?>
            <!-- footer -->
            <?= $this->include('layout/footer') ?>
        </div>
        <!-- aside -->
        <?= $this->include('layout/aside') ?>
    </div>
    <!-- menu mboile -->
    <?= $this->include('layout/menu_mobile') ?>
    <!-- JS -->
    <?= $this->include('layout/js') ?>
</body>