
<?php
use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?><!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | <?= Html::encode($this->title) ?></title>
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://i.mycdn.me/i?r=AzEPZsRbOZEKgBhR0XGMT1RkY-JBwvQ60_fGb7TLEZFOTaaKTM5SRkZCeTgDn6uOyic" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
                    </a>
                </li>
                <li><a href="/<?=Url::to('admin/post')?>"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
                <li><a href="/<?=Url::to('admin/category')?>"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li>
                <li>
                    <a href="#">
                        <i class="fa fa-commenting"></i> <span>Комментарии</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-green">5</small>
            </span>
                    </a>
                </li>
                <li><a href="#"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <?=$content ?>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.7
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com/">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
