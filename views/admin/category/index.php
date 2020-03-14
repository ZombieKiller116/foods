<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Категории'
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <ol class="breadcrumb">
            <li><a href="/<?= Url::to('admin/home/index') ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active"><a href="#">Категории</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список категорий</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="/<?= Url::to('admin/category/create') ?>" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Изображение</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr id="category-<?=$category->id?>">
                            <td><?= $category->id ?></td>
                            <td><?= $category->title ?></td>
                            <td>
                                <img width="200" src="/web/uploads/<?= $category->imageFile ?>" alt="">
                            </td>
                            <td>
                                <?= Html::a('', ['admin/category/edit', 'id'=>$category->id], [ 'class' => 'fa fa-pencil edit']); ?>
                                <a href="#" class="fa fa-remove delete" id="delete-<?= $category->id ?>"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<?php
$script = <<< JS
    $('.delete').on('click', function(e) {
        let id = $(this).attr('id');
        id = id.split('-')[1];
        $.ajax({
            url: '/admin/category/delete',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if(response.error) {
                    alert(response.error);
                } else if(response.message) {
                    $('#category-' + id).css('display', 'none');
                }
            },
            error: function() {
                alert('Произошла ошибка при отправке данных!');
            }
        });
    });
JS;
$this->registerJs($script, $this::POS_END);
?>