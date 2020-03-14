<?php


namespace app\controllers\admin;


use app\models\Category;
use app\models\forms\PostForm;
use app\models\forms\PostFormUpdate;
use app\models\Post;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class PostController extends Controller
{

    public $layout = 'admin';

    public function actionIndex()
    {
        $query = Post::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', compact('posts', 'pages'));
    }

    public function actionCreate()
    {
        $model = new PostForm();
        $categories = Category::find()->select(['id','title'])->all();
        $items = [];
        foreach($categories as $category) {
            $items[$category->id] = $category->title;
        }

        $categories = $items;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $slug = Yii::$app->getSecurity()->generateRandomString(20);
            $model->is_feature = ($model->is_feature) ? $model->is_feature : false;
            $model->is_season = ($model->is_season) ? $model->is_season : false;
            if ($model->upload($slug)) {
                $post = new Post([
                    'title' => $model->title,
                    'description' => $model->description,
                    'category_id' => $model->category_id,
                    'content' => $model->content,
                    'is_feature' => $model->is_feature,
                    'is_season' => $model->is_season,
                    'imageFile' => $slug . '.' . $model->imageFile->extension,
                ]);
                if ($post->save()) {
                    return $this->redirect('/admin/post/index');
                }
            }
        }

        return $this->render('create', compact('categories', 'model'));
    }

    public function actionDelete()
    {
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $post = Post::find()->where('id', $id)->limit(1)->one();
            if(!$post) {
                return json_encode(['error' => 'Ошибка! Перезагрузите страницу']);
            }
            $post->deleteFile();
            $post->delete();
            return json_encode(['message' => 'Пост успешно удален!']);
        }
    }

    public function actionEdit($id)
    {
        $model = new PostFormUpdate();

        $post = Post::findOne($id);


        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {

            if($post->updatePost($model)) {
                return $this->redirect('/admin/post');
            } else {
                throw new NotFoundHttpException();
            }
        }

        $categories = Category::find()->select(['id','title'])->all();
        $items = [];

        foreach($categories as $category) {
            $items[$category->id] = $category->title;
        }

        $categories = $items;

        return $this->render('edit', compact('post', 'model', 'categories'));
    }
}