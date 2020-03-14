<?php


namespace app\controllers\admin;


use yii\web\Controller;

class CommentController extends Controller
{

    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDelete()
    {
        return ['message' => 'Все ок'];
    }
}