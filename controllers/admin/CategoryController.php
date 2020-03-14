<?php


namespace app\controllers\admin;

use app\models\Category;
use app\models\forms\CategoryForm;
use app\models\forms\CategoryFormUpdate;
use app\models\Post;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $categories = Category::find()->all();

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

    public function actionCreate()
    {
        $model = new CategoryForm();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $slug = Yii::$app->getSecurity()->generateRandomString(20);
            if ($model->upload($slug)) {
                $category = new Category([
                    'title' => $model->title,
                    'imageFile' => $slug . '.' . $model->imageFile->extension
                ]);
                if ($category->save()) {
                    return $this->redirect('/admin/category/index');
                }
            }
        }

        return $this->render('create',[
            'model' => $model
        ]);
    }

    public function actionDelete()
    {
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $category = Category::find()->where('id', $id)->limit(1)->one();
            if(!$category) {
                return json_encode(['error' => 'Ошибка! Перезагрузите страницу']);
            }
            $category->deleteFile();
            $category->delete();
            return json_encode(['message' => 'Категория успешно удалена!']);
        }
    }

    public function actionEdit($id)
    {
        $category = Category::findOne($id);
        if(!$category) throw new NotFoundHttpException;

        $model = new CategoryFormUpdate();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if($category->updateCategory($model)) {
                return $this->redirect('/admin/category');
            } else {
                die(json_encode($model));
            }
        }

        return $this->render('edit', compact('category', 'model'));
    }

}