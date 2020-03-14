<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Редактировать пост';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <ol class="breadcrumb">
            <li><a href="/<?= Url::to('admin/home/index') ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="<?= Url::to('admin/post') ?>">Посты</a></li>
            <li class="active"><a href="#">Редактировать пост</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Редактировать пост</h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="box-body">

                <div class="form-group">
                    <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'value' => $post->title])->label('Название') ?>
                </div>

                <div class="form-group">
                    <?=$form->field($model, 'category_id')->dropDownList($categories, ['class' => 'form-control select2', 'value' => $post->category_id])->label('Категория')?>
                </div>

                <div class="form-group">
                    <img width="100%" height="50%" src="/web/uploads/<?= $post->imageFile ?>" alt="">
                    <?= $form->field($model, 'imageFile')->fileInput(['class' => 'exampleInputFile'])->label('Лицевая артинка') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'description')->textarea(['rows' => '6', 'id' => 'description', 'value' => $post->description])->label('Описание') ?>
                </div>

                <div class="form-group">
                    <?=$form->field($model, 'is_feature')->checkbox([ 'value' => '1', 'class' => 'minimal', 'checked' => (boolean)$post->is_feature])->label('Рекомендовать', ['class' => 'text-uppercase font-weight-bold']);?>
                </div>

                <div class="form-group">
                    <?=$form->field($model, 'is_season')->checkbox([ 'value' => '1', 'class' => 'minimal', 'checked' => (boolean)$post->is_season])->label('Сезонное', ['class' => 'text-uppercase font-weight-bold']);?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'content')->textarea(['id' => 'content', 'value' => $post->content])->label('Содержание поста') ?>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?= Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-default']) ?>
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-success pull-right', 'name' => 'login-button']) ?>
            </div>
            <!-- /.box-footer-->
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<?php
$this->registerJsFile('https://cdn.tiny.cloud/1/xfe80ub6lsgkvhgvcfufdo1hif89p3xs42lqhbdchhopqsc5/tinymce/5/tinymce.min.js', [
    'position' => $this::POS_END
]);

$script = <<< JS
    
    tinymce.init({
        selector: 'textarea#content',
        height: 500,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste imagetools wordcount"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ]
    })
JS;
$this->registerJs($script, $this::POS_END);


?>
