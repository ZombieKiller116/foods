<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

class Post extends ActiveRecord
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
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getFeatured()
    {
        if ($this->is_feature) return 'Да';
        return 'Нет';
    }

    public function getSeason()
    {
        if ($this->is_season) return 'Да';
        return 'Нет';
    }

    public function deleteFile()
    {
        $file = Yii::$app->basePath . '/web/uploads/' . $this->imageFile;
        if(file_exists($file)){
            unlink($file);
        }
    }

    public function updatePost($model)
    {
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if($model->imageFile != null) {
            $slug = Yii::$app->getSecurity()->generateRandomString(20);
            if ($model->upload($slug)) {
                $this->deleteFile();
                $this->imageFile = $slug . '.' . $model->imageFile->extension;
            }
        }
        $model->is_feature = ($model->is_feature) ? $model->is_feature : false;

        $model->is_season = ($model->is_season) ? $model->is_season : false;

        $this->title = $model->title;
        $this->description = $model->description;
        $this->category_id = $model->category_id;
        $this->content = $model->content;
        $this->is_feature = $model->is_feature;
        $this->is_season = $model->is_season;

        if($this->save()) {
            return true;
        }
    }
}