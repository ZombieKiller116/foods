<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Подписчики';
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?= Html::encode($this->title) ?></h1>
            <ol class="breadcrumb">
                <li><a href="/<?= Url::to('admin/home/index') ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li class="active"><a href="#">Подписчики</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список подписчиков</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($subscribers as $subscriber): ?>
                            <tr id="subscriber-<?= $subscriber->id ?>">
                                <td><?= $subscriber->id ?></td>
                                <td><?= $subscriber->email ?></td>
                                <td>
                                    <a href="#" class="fa fa-remove delete" id="delete-<?= $subscriber->id ?>"></a>
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
            url: '/admin/subscriber/delete',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if(response.error) {
                    alert(response.error);
                } else if(response.message) {
                    $('#subscriber-' + id).css('display', 'none');
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