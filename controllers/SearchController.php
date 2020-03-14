<?php


namespace app\controllers;

use app\models\Category;
use app\models\Post;
use Yii;
use yii\base\Controller;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;


class SearchController extends Controller
{

    public $layout = 'home';

    public function actionIndex()
    {
        $search = Yii::$app->request->post('search') ?? null;

        if (Yii::$app->request->isPost && $search && strlen($search) > 0) {

            $posts = Post::find();
            $categories = Category::find()->all();

            $posts->andFilterWhere([
                'or',
                ['like', 'title', $search],
                ['like', 'content', $search]
            ]);

            $countQuery = clone $posts;

            $pages = new Pagination(
                ['totalCount' => $countQuery->count(),
                    'pageSize' => 6,
                ]);

            $posts = $posts->all();

            return $this->render('index', compact('posts', 'pages', 'search', 'categories'));
        } else {
            throw new NotFoundHttpException();
        }
    }

}