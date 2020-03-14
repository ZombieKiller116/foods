<?php
$this->title = 'Комментарии';

use yii\helpers\Html;
use yii\helpers\Url; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <ol class="breadcrumb">
            <li><a href="/<?= Url::to('admin/home/index') ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active"><a href="#">Комментарии</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список комментариев</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Пост</th>
                        <th>Имя</th>
                        <th>Текст</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($comments as $comment): ?>
                        <tr id="comment-<?=$comment->id?>">
                            <td><?=$comment->id?></td>
                            <td><a href="/posts/<?=$comment->post->slug?>"><?=$comment->post->title?></a></td>
                            <td><?=$comment->name?></td>
                            <td><?=$comment->text?></td>
                            <td><a href="#" class="fa fa-remove delete" id="del-<?=$comment->id?>"></a></td>
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
            url: '/admin/comment/delete',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if(response.error) {
                    alert(response.error);
                } else if(response.message) {
                    $('#comment-' + id).css('display', 'none');
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
