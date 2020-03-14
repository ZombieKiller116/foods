<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Добавить категорию';
?><div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?=Html::encode($this->title)?></h1>
        <ol class="breadcrumb">
            <li><a href="/<?=Url::to('admin/home/index')?>"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="/<?=Url::to('admin/category/index')?>">Категории</a></li>
            <li class="active"><a href="#">Добавить категорию</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <?php $form = ActiveForm::begin(); ?>
            <div class="box-header with-border">
                <h3 class="box-title">Добавить категорию</h3>
            </div>
            <div class="box-body">


                <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('Название') ?>

                <?= $form->field($model, 'imageFile')->fileInput()->label('Картинка')?>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?=Html::a( 'Назад', Yii::$app->request->referrer, ['class' => 'btn btn-default'])?>
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-success pull-right', 'name' => 'login-button']) ?>
            </div>
            <!-- /.box-footer-->
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
