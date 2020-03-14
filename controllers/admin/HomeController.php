<?php


namespace app\controllers\admin;


use app\models\Post;
use yii\web\Controller;

class HomeController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}