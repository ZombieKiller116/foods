<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Посты';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <ol class="breadcrumb">
            <li><a href="/<?= Url::to('admin/home/index') ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active"><a href="#">Посты</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список постов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="<?=Url::to('/admin/post/create')?>" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Рекомендовано</th>
                        <th>Сезонное</th>
                        <th>Картинка</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $post):?>
                        <tr id="post-<?=$post->id?>">
                            <td><?=$post->id?></td>
                            <td><?=$post->title?></td>
                            <td><?=$post->category->title?></td>
                            <td><?=$post->getFeatured()?></td>
                            <td><?=$post->getSeason()?></td>
                            <td>
                                <img src="/web/uploads/<?= $post->imageFile ?>" alt="" width="200">
                            </td>
                            <td>
                                <?= Html::a('', ['admin/post/edit', 'id'=>$post->id], [ 'class' => 'fa fa-pencil edit']); ?>
                                <a href="#" class="fa fa-remove delete" id="delete-<?= $post->id ?>"></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
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
            url: '/admin/post/delete',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if(response.error) {
                    alert(response.error);
                } else if(response.message) {
                    $('#post-' + id).css('display', 'none');
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