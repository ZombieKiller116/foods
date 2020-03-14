<?php


namespace app\controllers;


use app\models\Category;
use app\models\Post;
use yii\data\Pagination;
use yii\web\Controller;

class CategoryController extends Controller
{

    public $layout = 'home';

    public function actionShow($slug)
    {
        $category = Category::find()->where(['slug' => $slug])->one();

        $categories = Category::find()->all();

        $query = Post::find()->where(['category_id' => $category->id]);

        $countQuery = clone $query;

        $pages = new Pagination(
            ['totalCount' => $countQuery->count(),
                'pageSize' => 6,
            ]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();



        return $this->render('index', compact('posts', 'category', 'pages', 'categories'));
    }
}