<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use Yii;

class Category extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'title',
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);
    }

    public function updateCategory($model)
    {
        $this->title = $model->title;

        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if($model->imageFile != null) {
            $slug = Yii::$app->getSecurity()->generateRandomString(20);
            if ($model->upload($slug)) {
                $this->deleteFile();
                $this->imageFile = $slug . '.' . $model->imageFile->extension;
            }
        }

        if($this->save()) {
            return true;
        }
    }

    public function deleteFile()
    {
        $file = Yii::$app->basePath . '/web/uploads/' . $this->imageFile;
        if(file_exists($file)){
            unlink($file);
        }
    }
}