<?php


namespace app\controllers;

use app\models\Category;
use app\models\Comment;
use app\models\forms\CommentForm;
use app\models\Post;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{
    public $layout = 'home';

    public function actionShow($slug)
    {
        $post = Post::find()->where(['slug' => $slug])->one();
        $categories = Category::find()->all();
        $recentPosts = Post::find()->orderBy(['created_at' => SORT_DESC])->with(['category'])->limit(3)->all();
        $comments = Comment::find()->where(['post_id' => $post->id])->all();

        $model = new CommentForm();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $comment = new Comment();
            $comment->name = $model->name;
            $comment->post_id = $model->post_id;
            $comment->text = $model->text;

            if($comment->save()) {
                return $this->refresh();
            }
        }

        if(!$post) throw new NotFoundHttpException();

        return $this->render('show', compact('post', 'categories', 'recentPosts', 'model', 'comments'));
    }

    public function actionIndex()
    {
        $categories = Category::find()->all();

        $query = Post::find();

        $countQuery = clone $query;

        $pages = new Pagination(
            ['totalCount' => $countQuery->count(),
                'pageSize' => 6,
            ]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->with('category')
            ->all();

        return $this->render('index', compact('posts', 'pages', 'categories'));

    }
}