<?php


namespace app\controllers\admin;


use yii\web\Controller;
use app\models\Subscriber;

class SubscriberController extends Controller
{

    public $layout = 'admin';

    public function actionIndex()
    {

        $subscribers = Subscriber::find()->orderBy('id')->all();


        return $this->render('index', compact('subscribers'));
    }

    public function actionDelete()
    {
        return ['message' => 'Все ок'];
    }
}