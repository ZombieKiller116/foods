<?php


namespace app\controllers;


use app\models\Category;
use app\models\Post;
use yii\web\Controller;

class HomeController extends Controller
{
    public $layout = 'home';

    public function actionIndex()
    {

        $featuredPosts = Post::find()->where(['is_feature' => '1'])->with(['category'])->limit(3)->all();
        $seasonPosts = Post::find()->where(['is_season' => '1'])->with(['category'])->limit(2)->all();
        $categories = Category::find()->all();
        $recentPosts = Post::find()->orderBy(['created_at' => SORT_DESC])->with(['category'])->limit(5)->all();

        return $this->render('index', compact('recentPosts', 'seasonPosts','featuredPosts', 'categories'));
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}