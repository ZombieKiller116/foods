<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Изменить категорию';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?=Html::encode($this->title)?></h1>
        <ol class="breadcrumb">
            <li><a href="/<?=Url::to('admin/home/index')?>"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="/<?=Url::to('admin/category/index')?>">Категории</a></li>
            <li class="active"><a href="#">Изменить категорию</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <?php $form = ActiveForm::begin(); ?>
            <div class="box-header with-border">
                <h3 class="box-title">Изменить категорию</h3>
            </div>
            <div class="box-body">
                <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'value' => $category->title])->label('Название') ?>
                <img width="100%" height="50%" src="/web/uploads/<?= $category->imageFile ?>" alt="">
                <?= $form->field($model, 'imageFile')->fileInput()->label('Текущее изображение') ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?= $form->field($model, 'id')->hiddenInput(['value' => $category->id])->label(false, ['style'=>'display:none']); ?>
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