<?php
use yii\helpers\Html;

$this->title = 'Главная';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Главная страница</h3>
            </div>
            <div class="box-body">
                Текст инструкции по пользованию админкой
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                и здесь есть место для какого-нибудь текста
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>