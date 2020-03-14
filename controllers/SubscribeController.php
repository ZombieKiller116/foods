<?php


namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\Subscriber;

class SubscribeController extends Controller
{
    public function actionIndex()
    {
        $date = Yii::$app->request->post();

        $subscriber = new Subscriber();
        $subscriber->email = $date['email'];

        if ($subscriber->validate()) {
            if ($subscriber->save()) {
                Yii::$app->session->setFlash('subscribe', 'Thank you for subscribing');
            } else {
                Yii::$app->session->setFlash('subscribe', 'An error occurred , please refresh the page');
            }
        } else {
            Yii::$app->session->setFlash('subscribe', 'This email address is already busy or you entered an incorrect email address');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}