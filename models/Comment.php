<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Comment extends ActiveRecord
{

    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ]
        ];
    }
}