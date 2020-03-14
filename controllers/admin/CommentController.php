<?php


namespace app\controllers\admin;


use app\models\Comment;
use Yii;
use yii\web\Controller;

class CommentController extends Controller
{

    public $layout = 'admin';

    public function actionIndex()
    {

        $comments = Comment::find()->with('post')->all();

        return $this->render('index', compact('comments'));
    }

    public function actionDelete()
    {
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $comment = Comment::find()->where('id', $id)->limit(1)->one();
            if(!$comment) {
                return json_encode(['error' => 'Ошибка! Перезагрузите страницу']);
            }
            $comment->delete();
            return json_encode(['message' => 'Категория успешно удалена!']);
        }
    }
}